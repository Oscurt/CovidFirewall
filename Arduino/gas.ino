int gas;
int zumbador = 0;

void setup()
{
  pinMode(zumbador, OUTPUT);
  pinMode(A5,INPUT);
}

void loop()
{
  gas = analogRead(A5);

  if(gas > 100){
      tone(zumbador, 520, 200);
  }

  delay(500);
}