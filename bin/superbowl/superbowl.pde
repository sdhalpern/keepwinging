// Modified by Worapoht K.
#include <SoftwareSerial.h>
#include <string.h>

int  val = 0; 
char code[10]; 
char *firstcode;
int bytesread = 0; 

#define rxPin 2
#define txPin 4

#define LED_WAITING 7
#define LED_READ 8


void setup() { 
    Serial.begin(2400);  // Hardware serial for Monitor 2400bps
  
    pinMode(LED_WAITING, OUTPUT);
    pinMode(LED_READ, OUTPUT);
}


void loop() {
    // Set indicator LEDs
    waitingForTag();
  
    // Read in some RFID Action
    SoftwareSerial RFID = SoftwareSerial(rxPin,txPin); 
    RFID.begin(2400);
    
    // check for header 
    if ((val = RFID.read()) == 10) {
        bytesread = 0; 
        while(bytesread<10) {  // read 10 digit code 
            val = RFID.read(); 
        
            // if header or stop bytes before the 10 digit reading 
            if ((val == 10) || (val == 13)) {   
                break; // stop reading 
            }
        
            code[bytesread] = val;         // add the digit           
            bytesread++;                   // ready to read next digit  
        } 

        // if 10 digit read is complete 
        if(bytesread == 10) {
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

void writeTag(char *mycode) {
  if (strcmp(firstcode, mycode) == 0) {
    printTag(mycode);
  }
  
  firstcode = mycode;
}

void printTag(char *code) {
    readingTag();
    Serial.print(":");
    for (int i = 0; i < 11; i++) {
      Serial.print(code[i]);
    }
    Serial.println(" ");
}

