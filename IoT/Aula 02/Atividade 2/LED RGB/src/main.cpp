#include <Arduino.h>
const int redPin = 3;
const int greenPin = 5;
const int bluePin = 6;

void setup() {
  pinMode(redPin, OUTPUT);
  pinMode(greenPin, OUTPUT);
  pinMode(bluePin, OUTPUT);
}

void loop() {
  setColor(255, 0, 0);    // Vermelho
  delay(1000);
  setColor(0, 255, 0);    // Verde
  delay(1000);
  setColor(0, 0, 255);    // Azul
  delay(1000);
  setColor(255, 255, 0);  // Amarelo (vermelho + verde)
  delay(1000);
  setColor(0, 255, 255);  // Ciano (verde + azul)
  delay(1000);
  setColor(255, 0, 255);  // Magenta (vermelho + azul)
  delay(1000);
  setColor(255, 255, 255); // Branco (todos no máximo)
  delay(1000);
  setColor(0, 0, 0);      // Apagar
  delay(1000);
}

// Função que define a cor do LED
void setColor(int red, int green, int blue) {
  analogWrite(redPin, red);
  analogWrite(greenPin, green);
  analogWrite(bluePin, blue);
}
