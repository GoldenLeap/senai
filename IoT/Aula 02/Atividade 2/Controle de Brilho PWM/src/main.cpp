#include <Arduino.h>

// put function declarations here:
int val{0};
int sum{1};
const int led{3};
void setup() {
  // put your setup code here, to run once:
  pinMode(led, OUTPUT);
}

void loop() {
  analogWrite(led, val);
  val+= sum;
  delay(50);
  if(val > 255){
    sum*=1;
  }
}