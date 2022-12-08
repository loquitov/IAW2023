/* Ponemos los selectores de fecha en español */

$.datepicker.regional["es"] = {
  closeText: "Cerrar",
  prevText: "<Ant",
  nextText: "Sig>",
  currentText: "Hoy",
  monthNames: [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre",
  ],
  monthNamesShort: [
    "Ene",
    "Feb",
    "Mar",
    "Abr",
    "May",
    "Jun",
    "Jul",
    "Ago",
    "Sep",
    "Oct",
    "Nov",
    "Dic",
  ],
  dayNames: [
    "Domingo",
    "Lunes",
    "Martes",
    "Miércoles",
    "Jueves",
    "Viernes",
    "Sábado",
  ],
  dayNamesShort: ["Dom", "Lun", "Mar", "Mié", "Juv", "Vie", "Sáb"],
  dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sá"],
  weekHeader: "Sm",
  dateFormat: "dd/mm/yy",
  firstDay: 1,
  isRTL: false,
  showMonthAfterYear: false,
  yearSuffix: "",
};
$.datepicker.setDefaults($.datepicker.regional["es"]);
$(document).ready(function () {
  $("#f_inicial").datepicker({
    minDate: 1,
    maxDate: "+1Y",
  });
  $("#f_final").datepicker({
    minDate: 2,
    maxDate: "+1Y + 1D",
  });

  $("#calculo").click(function (e) {
    e.preventDefault();
    let i = $("#individuales").val();
    let d = $("#dobles").val();
    let t = $("#triples").val();
    let desde = $("#f_inicial").datepicker("getDate");
    let hasta = $("#f_final").datepicker("getDate");
    let diff = new Date(hasta - desde);
    let dias = diff / 1000 / 60 / 60 / 24;
    let pdias = dias * i * 25 + dias * d * 45 + dias * t * 80;
    if (pdias < 0 || diff < 0) {
      $("#totalDias").html("Total días: 0");
      $("#totalPrecio").html("Precio: 0 €");
    } else {
      $("#totalDias").html("Total días: " + dias);
      $("#totalPrecio").html("Precio: " + pdias + " €");
    }
  });
});
