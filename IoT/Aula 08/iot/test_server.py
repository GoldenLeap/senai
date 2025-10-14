from flask import Flask, render_template
import serial 
import time 


try:
    arduino = serial.Serial('COM3', 9600, timeout=1)
    time.sleep(2)
except serial.SerialException as e:
    print(f'ERRO: {e}')
    arduino = None
app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')


@app.route('/control/<led_num>/<action>')
def control(led_num, action):
    if arduino:
        command = ''
        if led_num == '1':
            command = 'A' if action == 'on' else 'a'
        elif led_num == '2':
            command = 'B' if action == 'on' else 'b'
        if command:
            arduino.write(command.encode())
            return f"Comando '{command}' enviado para o LED {led_num}."
        else:
            return 'Comando invalido.'
    else:
        return 'Arduino não conectado'
    
if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=8000, use_reloader=False)
    