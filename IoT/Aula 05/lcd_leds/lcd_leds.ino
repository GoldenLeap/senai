#include <LiquidCrystal.h>
#define LED_VERDE 6
#define LED_AMARELO 7
#define LED_VERMELHO 8
// initialize the library by associating any needed LCD interface pin
// with the arduino pin number it is connected to
const int leds[] = {LED_VERDE, LED_AMARELO, LED_VERMELHO};

const int rs = 12, en = 11, d4 = 5, d5 = 4, d6 = 3, d7 = 2;
LiquidCrystal lcd(rs, en, d4, d5, d6, d7);

int currLed = 0;


void setup() {
  // set up the LCD's number of columns and rows:
  lcd.begin(16, 2);
  // Print a message to the LCD.
  lcd.print("hello, world!");
  for (int i =0; i<2; i++){
    pinMode(leds[i], OUTPUT);
    digitalWrite(leds[i], LOW);
  }
  lcd.clear();
}

void loop() {
  // set the cursor to column 0, line 1
  const char* nomesLed[] = {"Verde", "Amarelo", "Vermelho"};

  // (note: line 1 is the second row, since counting begins with 0):
  lcd.setCursor(0,0);
  lcd.print("LED ");
  lcd.print(nomesLed[currLed]);
  lcd.print("                       ");
  digitalWrite(leds[currLed], HIGH);
  lcd.setCursor(0,1);
  lcd.print("LIGADO    ");
  delay(1000);
  digitalWrite(leds[currLed], LOW);
  lcd.setCursor(0, 1);
  lcd.print("DESLIGADO    ");
  delay(1000);
  currLed = (currLed+1) % 3;
  // print the number of seconds since reset:
}