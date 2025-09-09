#include <Arduino.h>
#include <DHT.h>
#include "DHT.h"
#define SENSOR_PIN 3

DHT dht(SENSOR_PIN, DHT11);


float temperatura{};

void setup() {
  // put your setup code here, to run once:
  Serial.begin(9600);
  dht.begin();
}

void loop() {
  delay(2000);
  temperatura = dht.readTemperature();
  if(isnan(temperatura)){Serial.println("Erro ao ler o sensor");}
  else{Serial.println(temperatura);}

}
