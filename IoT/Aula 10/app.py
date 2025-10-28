from flask import Flask, jsonify, render_template
import serial
import time

try:
    arduino = serial.Serial('COM4', 9600, timeout=1)
    time.sleep(2)
    print('Arduino conectado com sucesso')
except serial.SerialException as e:
    print(f'Erro ao conectar - {e}')
    arduino = None
    
app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/get_data')
def get_data():
    if arduino:
        try:
            arduino.write(b'D')
            time.sleep(.2)
            data_line = arduino.readline().decode().strip()
            
            if data_line and data_line.lower() != "erro":
                dist = data_line
                return jsonify(distancia=float(dist))
            else:
                return jsonify(error="Falha ao ler sensor")
        except Exception as e:
                print(f"Erro na leitura de serial: {e}")
                return jsonify(error=f"Erro Serial: {e}"), 500
        return jsonify(error="Arduino não conectado"), 500

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=5000)