int leds[] = {5, 6, 7};
char ledsCol[] = {'G', 'Y', 'R'};
int cd{2000};
int currLed{0};
void setup(){
  Serial.begin(9600);
  for(int i = 0; i < 3; i++){
    pinMode(leds[i], OUTPUT);
  }
}

void loop(){
  digitalWrite(leds[currLed], HIGH);
  Serial.write(ledsCol[currLed]);
  delay(cd);
  if(currLed >= 2){
    currLed = 0;
    digitalWrite(leds[2], LOW);
  }else{
   currLed++;
  }

  digitalWrite(leds[currLed -1], LOW);

}