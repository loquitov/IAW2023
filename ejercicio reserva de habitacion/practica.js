   $.datepicker.regional['es'] = {
      closeText: 'Cerrar',
      prevText: '<Ant',
      nextText: 'Sig>',
      currentText: 'Hoy',
      monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
      dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
      dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
      weekHeader: 'Sm',
      dateFormat: 'dd/mm/yy',
      firstDay: 1,
      isRTL: false,
      showMonthAfterYear: false,
      yearSuffix: ''
    };

  $.datepicker.setDefaults($.datepicker.regional['es']);
$(document).ready(function () {
  $("#f_inicial").datapicker({minDate:1,MaxDate:"+1Y"});
  $("#f_final").datapicker({minDate:2, MaxDate:"+ 1Y +1D"});
  $("#calculo").click(function (e) {
    e.preventDefault();
    let i = $("#individuales").val();
    let d=$("#dobles").val();
    let t =$("#triples").val();
    let desde = $ ("#f_inicial").datapicker("getDate");
    let hasta = $("#f_final").datapicker("getDate");
    let diff = new Date (hasta -desde);
    let dias = diff /1000/60/60/24;
    let pdias = dias * i *25 + dias *d * 45+dias * t*80;
    if (pdias < 0 || diff < 0) {
      $("#totalDias").html("Total dias: 0")
      $("#totalPrecio").html("Total Precio"+ pdias + "€")
      
    }else{
      $("#totalDias").html("Total dias: "+
      dias)
      $("#totalPrecio").html("Total Precio"+ pdias + "€")
    };
    
  });
});

    
