#include <Arduino.h>
#include <DHT.h>

#define SENSOR_PIN 10

const int LED_PINS[] = {4,3,2};

DHT dht(SENSOR_PIN, DHT11);
void setLeds(const int leds[], int tempLed);
int temp{};
int tempLed{};
void setup() {
  // put your setup code here, to run once:
  for(int i = 0; i < 3; i++){
    pinMode(LED_PINS[i], OUTPUT);
  }
  dht.begin();
  Serial.begin(9600);
 
}

void loop() {
  temp = dht.readTemperature();
  Serial.println(temp);
  if(temp <= 22){
    tempLed = 0;
  }else if(temp <= 27){
    tempLed = 1;
  }else{
    tempLed = 2;
  }
  setLeds(LED_PINS, tempLed);


}

void setLeds(const int leds[], int tempLed){
    for (int i = 0; i < 3; i++)
    {
      digitalWrite(leds[i], i == tempLed? HIGH: LOW);
    }
}