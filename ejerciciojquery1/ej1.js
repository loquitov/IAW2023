/* Rellena este fichero */
$(document).ready(function () {
    $("#btn-ocultar").click (function(e){
    $("h1,p").hide();
    });


    
    $("#btn-mostrar").click (function(e){
    $("h1,p").show();
    });

});
