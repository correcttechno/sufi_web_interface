import time
import winsound
import speech_recognition as sr
import threading
import keyboard
import pygame
import serial
import os



LANG = "az-AZ"

# =================== Təyinatlar ===================
recognizer = sr.Recognizer()
stop_event = threading.Event()
is_playing_audio = threading.Event()



pygame.mixer.init()

# =================== Funksiyalar ===================
def play_wav_blocking(path):
    """pygame ilə səsləri çalır və ESC basılarsa dayandırır"""
    try:
        is_playing_audio.set()
        print(f"[Assist] Səsləndirilir: {path}")
        pygame.mixer.music.load(path)
        pygame.mixer.music.play()

        while pygame.mixer.music.get_busy():
            if stop_event.is_set():
                pygame.mixer.music.stop()
                print("[Assist] Səs dayandırıldı.")
                break
            time.sleep(0.1)
    except Exception as e:
        print(f"[Assist] Səs çalınarkən xəta: {e}")
    finally:
        is_playing_audio.clear()



def handle_command(text):
    txt = text.lower()
    print(f"[Tanındı] {txt}")

    return False

def listen_loop():
    with sr.Microphone(device_index=1) as source:
        recognizer.adjust_for_ambient_noise(source, duration=1)
        print("🎤 Mikrofon hazırdır. Danışın... (ESC ilə çıxış)")

        while not stop_event.is_set():
            if is_playing_audio.is_set():
                time.sleep(0.5)
                continue

            try:
                audio = recognizer.listen(source, timeout=8, phrase_time_limit=8)
                try:
                    text = recognizer.recognize_google(audio, language=LANG)
                    handle_command(text)
                except sr.UnknownValueError:
                    print("[X] Səs tanınmadı.")
                    #play_wav_blocking(UNKNOWN_WAV)
                except sr.RequestError as e:
                    print(f"[X] Xidmət xətası: {e}")
            except sr.WaitTimeoutError:
                print("[X] 5 saniyə ərzində danışılmadı.")
            except KeyboardInterrupt:
                break

            time.sleep(0.5)

def esc_listener():
    while not stop_event.is_set():
        if keyboard.is_pressed('esc'):
            stop_event.set()
            print("\n[Assist] ESC basıldı. Proqram dayandırılır...")
            break
        time.sleep(0.1)

# =================== Main ===================
if __name__ == "__main__":
    threading.Thread(target=esc_listener, daemon=True).start()
    listen_loop()