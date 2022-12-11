$(document).ready(function () {
  $("#Muestra_todo").click(function (r) {
    r.preventDefault();
$("https://gutendex.com/books/" ).done(function (e) {
  let num_libros = e.results.length;
  $("#contenido").empty();
  for (let i = 0; i < num_libros; i++) {
    let libro = new object (e.results[i]);
    let titulo = libro.title;
    let autor = libro.authors.length == 0 ? "Anonimo" : libro.authors[0].name;
   let enlace = libro.formats["text/plain; charset=us-ascii"];
   let imagen = libro.formats["text/jpeg"];
    let numerodescargas = libro.download_count;
    $("#contenido").append(
 '<p>' + '<img width="120" src="' + imagen + '"></p>' +
              '<p>Título: ' + titulo + '</p>' +
              '<p>Autor: ' + autor + '</p>' +
              '<p><a href="' + enlace + '" target="_blank">Descarga aquí</a></p>' +
              '<p>Nº descargas: ' + numerodescargas + '</p>');
  }
  
})
    
  })
  
$("#Muestra_libro").click(function () {
   let codigo = ("#numero_libro").val();
$("https://gutendex.com/books/" + codigo).done(function (respuesta) {
  
  $("#contenido").empty();

    
    let titulo = respuesta.title;
    let autor = respuesta.authors.length == 0 ? "Anonimo" : respuesta.authors[0].name;
   let enlace = respuesta.formats["text/plain; charset=us-ascii"];
   let imagen = respuesta.formats["text/jpeg"];
    let numerodescargas = respuesta.download_count;
    $("#contenido").append(
 '<p>' + '<img width="120" src="' + imagen + '"></p>' +
              '<p>Título: ' + titulo + '</p>' +
              '<p>Autor: ' + autor + '</p>' +
              '<p><a href="' + enlace + '" target="_blank">Descarga aquí</a></p>' +
              '<p>Nº descargas: ' + numerodescargas + '</p>');  
}).fail(function () {
          alert("Error en este libro");
        });
    
  })




})