function Muestra_todo() {
  let contador=0;
  while (contador < 32) {
$.get("https://gutendex.com/books/" + contador ,function (data) {
  let libro = data;
  let titulo = $("<p></p>").text(libro.title);
  let  autor = $("<p></p>").text(libro.authors[0].name);
  let enlace1 = libro.formats["text/html"];
  let enlace =  $("<a></a>").text("enlace descarga").attr("href", enlace1);
let imagen1= libro.formats["image/jpeg"];
let imagen = $("<img></img>").text("").attr("src", imagen1);
let descargas = $("<p></p>").text("numero de descarga:" + libro.download_count);
$("body").append(titulo, autor , imagen, enlace, descargas);  
    });
    contador++;
  }
}


function Muestra_libro() {
let id = document.getElementById("numero_libro").value;
if (id < 0 || id > 32) {
alert("El numero introducidono corresponde a ningun libro por favor introduzca un nuemro entre 0-32")  
}else{
  $.get("https://gutendex.com/books/" + id, function (data) {
     let libro = data;
  let titulo = $("<p></p>").text(libro.title);
  let  autor = $("<p></p>").text(libro.authors[0].name);
  let enlace1 = libro.formats["text/html"];
  let enlace =  $("<a></a>").text("enlace descarga").attr("href", enlace1);
let imagen1= libro.formats["image/jpeg"];
let imagen = $("<img></img>").text("").attr("src", imagen1);
let descargas = $("<p></p>").text("numero de descarga" + libro.download_count);
$("body").append(titulo, autor , imagen, enlace, descargas);  
    
  });
}

  
}