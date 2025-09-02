#include <Arduino.h>

#define ANALOG_X_PIN A2

const int leds[] = {2, 3, 4, 5};

void setup() {
  for (int i = 0; i < 4; i++) {
    pinMode(leds[i], OUTPUT);
  }
  Serial.begin(9600);
}

void loop() {
  int joystickValue = analogRead(ANALOG_X_PIN) - 130; 
  Serial.println(joystickValue);                 

  
  int level = map(joystickValue , -1, 1023, 0, 5);


  for (int i = 0; i < 4; i++) {
    digitalWrite(leds[i], i < level ? HIGH : LOW);
  }

  delay(50);  
}
