#include <Arduino.h>
#define BTN_PIN 3

const int LED_PINS[] = {8, 9, 10, 11};
unsigned long currTime{};
unsigned long pastTime{};

void setLed(int led);

void setup() {
  // put your setup code here, to run once:
  for(int i = 0; i < 4; i++){
    pinMode(LED_PINS[i], OUTPUT);
  }
  pinMode(BTN_PIN, INPUT_PULLUP);
  Serial.begin(9600);

}
int btnVal{};
int currLed = 3;

void loop() {
  currTime = millis();
  btnVal = digitalRead(BTN_PIN);
  setLed(currLed);
  if(currTime - pastTime > 3000){

    currLed--;
    if (currLed < 0){
      currLed = 3;
    }
    pastTime = currTime;
  }
  if(btnVal != 0){

    digitalWrite(LED_PINS[3], HIGH);
    setLed(3);
    delay(450);
    digitalWrite(LED_PINS[3], LOW);
    delay(100);
    currLed = 0;
    pastTime = currTime;

    
  }


}

void setLed(int led){
  for (int i = 0; i < 3; i++){
    digitalWrite(LED_PINS[i], i == led?HIGH: LOW);
  }
}