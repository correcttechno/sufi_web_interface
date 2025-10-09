import threading
from flask import Flask, request
from flask_cors import CORS
import serial
import time
import text_to_speech

app = Flask(__name__)
CORS(app)

# Seri port ve ayarlar
PORT = "COM11"
BAUDRATE = 115200
TIMEOUT = 10

try:
    ser = serial.Serial(PORT, BAUDRATE, timeout=TIMEOUT)
    print(f"{PORT} portuna bağlandı.")
except serial.SerialException as e:
    print(f"Port açılamadı: {e}")
    exit()

def sendSerialData(data):
    ser.write((data + "\n").encode())
    time.sleep(1) 
@app.route('/send', methods=['GET'])
def send_to_serial():
    # GET parametresinden veri al
    data = request.args.get('data')
    if not data:
        return "data parametresi eksik!", 400

    # Veriyi seri porta gönder
    try:
        threading.Thread(target=sendSerialData, args=(data,)).start()
        #received = ""
        #if ser.in_waiting > 0:
        #    received = ser.read(ser.in_waiting).decode()
        
        return {"sent": data, "received": ""}, 200
    except Exception as e:
        return f"Hata: {e}", 500
    

    
@app.route('/generate_sound', methods=['POST'])
def generate_sound():
    # POST parametresinden veri al
    data = request.form.get('data')
    if not data:
        return {"filename": '',"status":False}, 400
    try:
        res=text_to_speech.generate(data)
        return {"filename": res,"status":True}, 200
    except Exception as e:
        return {"filename": '',"status":False}, 200

if __name__ == '__main__':
    # Flask serverini 321 portunda başlat
    app.run(host='0.0.0.0', port=321)
