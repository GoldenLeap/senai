#include <Arduino.h>
#define G_PIN 8
#define R_PIN 9
#define Y_PIN 10

int cooldown{2000};
void setup() {
  // put your setup code here, to run once:
  pinMode(G_PIN, OUTPUT);
  pinMode(R_PIN, OUTPUT);
  pinMode(Y_PIN, OUTPUT);
}

void loop() {
  digitalWrite(R_PIN, LOW);
  digitalWrite(G_PIN, HIGH);
  delay(cooldown);
  digitalWrite(G_PIN, LOW);
  digitalWrite(Y_PIN, HIGH);
  delay(ceil(cooldown / 2));
  digitalWrite(Y_PIN, LOW);
  digitalWrite(R_PIN, HIGH);
  delay(cooldown);
}
