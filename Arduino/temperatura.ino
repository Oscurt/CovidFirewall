#include<LiquidCrystal.h>
LiquidCrystal lcd(12,11,5,4,3,2); // instanciar pantalla
float value; // valores para la medicion
int tmp = A1; 
int led_red = 10;
int led_green = 9;
int contador_personas = 0;
int aforo_max = 3;

int pir = 13;
int pir_value;

void setup(){
    pinMode(tmp,INPUT);
      pinMode(pir,INPUT);
}

void loop(){ // loop para actualizar temperatura

      pir_value = digitalRead(pir);

      if(pir_value == HIGH && contador_personas > 0){
          contador_personas--;
    }


    digitalWrite(led_red, LOW);
      digitalWrite(led_green, LOW);
      value = analogRead(tmp)* (5000/1024); // la medicion del voltaje debemos multiplicarla por el numero que sigue, para obtener un formato en miliVoltios
      value = (value - 500) /10.0; // una vez tenemos en minivolt, bastara con restar 500 y dividir en 10 para obtener la temperatura en grados celsius
      lcd.begin(16,2);
      lcd.setCursor(0,0);


      if(contador_personas < aforo_max){
      if (value > 40){
          lcd.print("MUY ALTA: ");
          lcd.print(value);
          digitalWrite(led_red, HIGH);
          lcd.setCursor(0,1);
          lcd.print(contador_personas);
          lcd.print(" PERSONAS");


      }
        else if (value >= 36){
          lcd.print("PERMITIDO: ");
          lcd.print(value);
          digitalWrite(led_green, HIGH);
          lcd.setCursor(0,1);
          lcd.print(contador_personas);
          lcd.print(" PERSONAS");
        contador_personas = contador_personas + 1;
      }
      else{

        lcd.print("MUY BAJA: ");
        lcd.print(value);
        digitalWrite(led_red, HIGH);
        lcd.setCursor(0,1);
        lcd.print(contador_personas);
        lcd.print(" PERSONAS");
      }
    }
      else{
      lcd.print("RECINTO LLENO");
      digitalWrite(led_red, HIGH);
      }
      delay(1000);
      lcd.clear();
}