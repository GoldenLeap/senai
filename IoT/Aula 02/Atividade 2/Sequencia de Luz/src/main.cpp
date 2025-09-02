#include <Arduino.h>

const int leds[] = {2, 3, 4, 5};
int currLed{0};
  
void setup() {
  for(int i=0; i <= 3;i++){
    pinMode(leds[i], OUTPUT);
  }
}


void loop() {
  digitalWrite(leds[currLed], HIGH);
  delay(200);
  digitalWrite(leds[currLed], LOW);
  delay(200);
  currLed += 1;
  if(currLed > 3){
    currLed = 0;
  }

} 
