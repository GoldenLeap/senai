from flask import Flask, render_template
import time
import serial 

porta_arduino = 'COM4'

try:
    arduino = serial.Serial(porta_arduino, 9600, timeout=1)
    time.sleep(1)
except serial.SerialException as e:
    print(f'Erro ao abrir porta: {e}')
    arduino = None
    

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/control/semaforo/<action>')
def control(action):
    if arduino:
        if action == 'on':
            command = 'r'
        else:
            command = 'p'
        arduino.write(command.encode())
        return f'Comando {command} enviado'
if __name__ == "__main__":
    app.run(debug=True, host='0.0.0.0', port=8000, threaded=True)
