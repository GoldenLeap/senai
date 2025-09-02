#include <Arduino.h>

const int LED[] = {2, 3, 4, 5};

void setup() {
  pinMode(LED[0], OUTPUT);
  pinMode(LED[1], OUTPUT);
  pinMode(LED[2], OUTPUT);
  pinMode(LED[3], OUTPUT);
}

void loop() {
  // put your main code here, to run repeatedly:
  for (byte num=0; num <= 15; num++){
    for(int n=0; n <=3; n++){
      if(bitRead(num, n) == 1){
        digitalWrite(LED[n], HIGH);
      }else{
        digitalWrite(LED[n], LOW);
      }
    }
    delay(1000);
  }
  
}
