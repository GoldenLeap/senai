#include <Arduino.h>
#define DELAY 200


void sendMorse(char word[]);


const int led{3};
const char *letras[] = {
    ".-",   // A
    "-...", // B
    "-.-.", // C
    "-..",  // D
    ".",    // E
    "..-.", // F
    "--.",  // G
    "....", // H
    "..",   // I
    ".---", // J
    "-.-",  // K
    ".-..", // L
    "--",   // M
    "-.",   // N
    "---",  // O
    ".--.", // P
    "--.-", // Q
    ".-.",  // R
    "...",  // S
    "-",    // T
    "..-",  // U
    "...-", // V
    ".--",  // W
    "-..-", // X
    "-.--", // Y
    "--.."  // Z
};


void setup()
{
  pinMode(led, OUTPUT);
}

void loop()
{
  sendMorse("sos");
}

void sendMorse(char word[])
{
  for (int i = 0; i < strlen(word); i++)
  {
    char c = tolower(word[i]);
    if (c >= 'a' && c <= 'z')
    {
      const char *morse = letras[c - 'a'];
      for (int i = 0; morse[i] != '\0'; i++)
      {
        if (morse[i] == '.')
        {
          digitalWrite(led, HIGH);
          delay(DELAY);
        }
        else if (morse[i] == '-')
        {
          digitalWrite(led, HIGH);
          delay(DELAY * 3);
        }
        digitalWrite(led, LOW);
        delay(DELAY); // pausa entre sinais
      }
      delay(DELAY * 2); // pausa entre letras
    }
  }
}