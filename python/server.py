from flask import Flask, request
import serial
import time
import text_to_speech

app = Flask(__name__)

# Seri port ve ayarlar
PORT = "COM3"
BAUDRATE = 115200
TIMEOUT = 10

try:
    ser = serial.Serial(PORT, BAUDRATE, timeout=TIMEOUT)
    print(f"{PORT} portuna bağlandı.")
except serial.SerialException as e:
    print(f"Port açılamadı: {e}")
    exit()

@app.route('/send', methods=['GET'])
def send_to_serial():
    # GET parametresinden veri al
    data = request.args.get('data')
    if not data:
        return "data parametresi eksik!", 400

    # Veriyi seri porta gönder
    try:
        ser.write((data + "\n").encode())
        time.sleep(0.5)  # Cihazın yanıt vermesi için kısa bekleme

        received = ""
        if ser.in_waiting > 0:
            received = ser.read(ser.in_waiting).decode()
        
        return {"sent": data, "received": received}, 200
    except Exception as e:
        return f"Hata: {e}", 500
    
@app.route('/generate_sound', methods=['GET'])
def generate_sound():
    # GET parametresinden veri al
    data = request.args.get('data')
    if not data:
        return "data parametresi eksik!", 400
    try:
        res=text_to_speech.generate(data)
        return {"sent": res}, 200
    except Exception as e:
        return f"Hata: {e}", 500

if __name__ == '__main__':
    # Flask serverini 321 portunda başlat
    app.run(host='0.0.0.0', port=321)
