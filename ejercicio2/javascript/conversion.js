function actualizar() {
  document.calcula.euro.value =
    document.calcula.total.value *
    document.calcula.moneda[document.calcula.moneda.selectedIndex].value;

  document.calcula.cambio.value =
    document.calcula.moneda[document.calcula.moneda.selectedIndex].value;
}
