int leds[] = {5, 6, 7};
int cd{2000};
int currLed{0};
bool running{false};

void setup(){
  Serial.begin(9600);
  for(int i = 0; i < 3; i++){
    pinMode(leds[i], OUTPUT);
  }
}

int byteRecebido;
void loop(){
  byteRecebido = Serial.read();
  if(byteRecebido == char('r')){
    running = true;
  }else if(byteRecebido == char('p')){
    running = false;
  }
  if(running){
    digitalWrite(leds[currLed], HIGH);
    delay(cd);
    if(currLed >= 2){
      currLed = 0;
      digitalWrite(leds[2], LOW);
    }else{
    currLed++;
    }

    digitalWrite(leds[currLed -1], LOW);
  }


}