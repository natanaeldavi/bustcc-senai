#include <ArduinoJson.h>
#include <SoftwareSerial.h>

SoftwareSerial s(5, 6);
#include <VirtualWire.h> // Biblioteca necessário para comunicação
// Um buffer para guardar as mensagens recebidas
byte message[VW_MAX_MESSAGE_LEN];
byte messageLength = VW_MAX_MESSAGE_LEN; // Tamanho da mensagem

String codigoString;
int codigo;
void setup() {
  Serial.begin(9600);
  s.begin(9600);
  // Se comunicação entre o receptor e transmissor estiver correta irá...
  //aparecer essa mensagem de confirmação no serial monitor
  Serial.println("Dispositivo pronto! Recebendo dados: ");
  // Inicializa o IO e ISR
  vw_set_rx_pin(12);
  vw_setup(2000); // Bits por segundo
  vw_rx_start(); // Inicializa o receptor
}
void loop()
{
if (vw_get_message(message, &messageLength)) // Sem bloqueio
{
  Serial.print("Código do ponto: ");
  for (int i = 0; i < messageLength; i++) {
    codigoString = message[i];
    Serial.write(message[i]);
    if (codigoString == "49") {
      codigo = 1;
    }
    if (codigoString == "50") {
      codigo = 2;
    }
    if (codigoString == "51") {
      codigo = 3;
    }
    enviarNode();
  }
  Serial.println(); // Irá mostrar a menssagem "Dados enviados com sucesso!"
  }
}

void enviarNode(){
  StaticJsonBuffer<1000> jsonBuffer;
  JsonObject& AN = jsonBuffer.createObject();

  AN["CODIGO"] = codigo;
  AN.printTo(s);

  codigo = 0;
  
}
