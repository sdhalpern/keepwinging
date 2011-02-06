// Modified by Worapoht K.
#include <SoftwareSerial.h>

int  val = 0; 
char code[10]; 
int bytesread = 0; 

#define rxPin 2
#define txPin 4

#define LED_WAITING 7
#define LED_READ 8


void setup()
{ 
  Serial.begin(2400);  // Hardware serial for Monitor 2400bps
  
  pinMode(LED_WAITING, OUTPUT);
  pinMode(LED_READ, OUTPUT);
}


void loop()
{ 
  // Set indicator LEDs
  waitingForTag();
  
  // Read in some RFID Action
  SoftwareSerial RFID = SoftwareSerial(rxPin,txPin); 
  RFID.begin(2400);

  if((val = RFID.read()) == 10)
  {   // check for header 
    bytesread = 0; 
    while(bytesread<10)
    {  // read 10 digit code 
      val = RFID.read(); 
      if((val == 10)||(val == 13))
      {  // if header or stop bytes before the 10 digit reading 
        break;                       // stop reading 
      } 
      code[bytesread] = val;         // add the digit           
      bytesread++;                   // ready to read next digit  
    } 

    if(bytesread == 10)
    {  // if 10 digit read is complete 
      readingTag();
      writeTag(code);
    }
    bytesread = 0; 
    delay(500);                       // wait for a second
  } 
} 


void waitingForTag() {
  digitalWrite(LED_WAITING, LOW);
  digitalWrite(LED_READ, HIGH);
}

void readingTag() {
  digitalWrite(LED_WAITING, HIGH);
  digitalWrite(LED_READ, LOW);
}

void readTagReadBefore() {
  digitalWrite(LED_WAITING, HIGH);
  digitalWrite(LED_READ, HIGH);
}  

void writeTag(char *code) {
    Serial.print(":");
    Serial.print(code);
    Serial.println(";");
}
