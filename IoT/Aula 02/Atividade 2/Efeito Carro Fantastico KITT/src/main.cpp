#include <Arduino.h>

const int leds[] = {2, 3, 4, 5};
int currLed{0};
int way{1};

void setup() {
  for(int i=0; i <= sizeof(leds)-1;i++){
    pinMode(leds[i], OUTPUT);
  }
}


void loop() {
  digitalWrite(leds[currLed], HIGH);
  delay(200);
  digitalWrite(leds[currLed], LOW);
  delay(200);
  currLed += way;
  if(currLed == 0 || currLed == 3){
    way *= -1;
  }

}
