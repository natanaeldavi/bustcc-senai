#include <VirtualWire.h> // Biblioteca necessário para comunicação
void setup() {
// Initializa o IO e ISR
  vw_set_tx_pin(11);
  vw_setup(2000); // Bits por segundo
}
void loop() {
  // Mensagem a ser enviada para o receptor
  send("2");
  delay(2000);
}
void send (char *message) {
  vw_send((uint8_t *)message, strlen(message));
  vw_wait_tx(); // Aguarde até que toda a mensagem seja enviada
}
