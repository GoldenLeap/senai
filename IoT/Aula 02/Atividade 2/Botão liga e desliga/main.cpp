#include <Arduino.h>
#define BUTTON_PIN 9 // pino do botão
#define LED_PIN 8 // pino do led
// put function declarations here:
boolean buttonPressed{false};
void setup() {
  // put your setup code here, to run once:
  pinMode(BUTTON_PIN, INPUT_PULLUP);
  pinMode(LED_PIN, OUTPUT);
}
int buttonState{0};
void loop() {
  // put your main code here, to run repeatedly:
  // Armazena o estado do botão
   buttonState = digitalRead(BUTTON_PIN);
   // Verifica se o botão foi pressionado e se ele não foi pressionado antes
   if(buttonState == HIGH  && !buttonPressed){
    digitalRead(LED_PIN) == LOW? digitalWrite(LED_PIN, HIGH): digitalWrite(LED_PIN, LOW);
    buttonPressed = true;
    
   }
   // Quando o botão for pressionado aguarda meio segundo e muda a variavel de pressionado para false
   if(buttonPressed){
    delay(500);
    buttonPressed = false;
   }
   

}
