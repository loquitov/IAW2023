function letra() {
  cadena = "TRWAGMYFPDXBNJZSQVHLCKET";
  posicion = formulario.dni.value % 23;
  letra = cadena.substring(posicion, posicion + 1);
  document.formulario.dni.value = formulario.dni.value + " - " + letra;
}
