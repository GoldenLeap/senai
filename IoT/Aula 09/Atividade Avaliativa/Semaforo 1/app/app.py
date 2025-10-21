from flask import Flask, render_template, jsonify
import serial
import time
import threading

app = Flask(__name__)

try:
    arduino = serial.Serial('COM4', 9600, timeout=1)
    time.sleep(1)
except serial.SerialException as e:
    print(f"Erro ao abrir porta serial: {e}")
    arduino = None

data = {
    'r': False,  
    'y': False,  
    'g': False   
}
data_lock = threading.Lock()

def serialRead():
    global arduino, data, stop_thread
    while not stop_thread:
        if arduino is None:
            time.sleep(0.5)
            continue
        
        try:
            val = arduino.readline().decode(errors='ignore').strip()
            if not val:
                time.sleep(0.05)
                continue
            
            estado_led = {'r': False, 'y': False, 'g': False}
            if val == 'G':
                estado_led['g'] = True
            elif val == 'Y':
                estado_led['y'] = True
            elif val == 'R':
                estado_led['r'] = True

            with data_lock:
                data.update(estado_led)

        except Exception as e:
            print(f"Erro na leitura serial: {e}")
            time.sleep(0.5)

stop_thread = False
reader_thread = threading.Thread(target=serialRead, daemon=True)
reader_thread.start()

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/data')
def get_data():
    with data_lock:
        return jsonify(data)

if __name__ == '__main__':
    try:
        app.run(debug=True, host='0.0.0.0', port=8000, threaded=True)
    finally:
        stop_thread = True
        if arduino is not None:
            arduino.close()
