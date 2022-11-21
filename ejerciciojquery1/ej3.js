/* Rellena este fichero */
$(document).ready(function () {
    $("#btn-aumentar").click(function (e) { 

        $("#encabezado").css({"font-size" : "300%", "background-color" : "red" });
        $(".pares").css({"font-size" : "200%", "background-color" : "green"});
    });

    $("#btn-disminuir").click(function (e) { 
        $("#encabezado").css({"font-size" : "50%", "background-color" : "red"});
        $(".pares").css({"font-size" : "100%", "background-color" : "blue"});
    });


});