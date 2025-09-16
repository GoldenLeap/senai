#include <Arduino.h>

#define ECHO_PIN 5 
#define TRIG_PIN 6
#define BUZZ_PIN 2
void setup() {
  pinMode(BUZZ_PIN, OUTPUT);
  pinMode(TRIG_PIN, OUTPUT);
  pinMode(ECHO_PIN, INPUT);
  Serial.begin(9600);
}
float duracao, distancia;
void loop() {

  digitalWrite(TRIG_PIN, LOW);
  delayMicroseconds(2);
  digitalWrite(TRIG_PIN, HIGH);
  delayMicroseconds(10);
  digitalWrite(TRIG_PIN, LOW);
  duracao = pulseIn(ECHO_PIN, HIGH);
  distancia = (duracao * .0343)/2;
  Serial.println("Distancia: ");
  Serial.println(distancia);
  delay(100);
  if(distancia < 20){
    digitalWrite(BUZZ_PIN, HIGH);
  }else{
    digitalWrite(BUZZ_PIN, LOW);
  }
 

}
