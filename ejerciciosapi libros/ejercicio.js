function Muestra_todo() {
  let contador = 0;
  while (contador < 32) {
    $.get("https://gutendex.com/books/" + contador, function (data) {
      let libro = data;

      let autor = $("<p></p>").text(libro.authors[0].name);
      let titulo = $("<p></p>").append(libro.title);
      let enlace1 = libro.formats["text/html"];
      let enlace = $("<a></a>").text("enlace descarga").attr("href", enlace1);
      let imagen1 = libro.formats["image/jpeg"];
      let imagen = $("<img></img>").text("").attr("src", imagen1);
      let descargas = $("<p></p>").text(
        "Numero de descargas: " + libro.download_count
      );
      $("body").append(titulo, autor, imagen, enlace, descargas);
    });
    contador++;
  }
}

function Muestra_libro() {
  let id = document.getElementById("numero_libro").value;
  if (id < 0 || id > 32) {
    alert("El id que has introducido no corresponde a ningun libro (1-32)");
    return;
  } else {
    $.get("https://gutendex.com/books/" + id, function (data) {
      let libro = data;

      let autor = $("<p></p>").text(libro.authors[0].name);
      let titulo = $("<p></p>").text(libro.title);
      let enlace1 = libro.formats["text/html"];
      let enlace = $("<a></a>").text("enlace descarga").attr("href", enlace1);
      let imagen1 = libro.formats["image/jpeg"];
      let imagen = $("<img></img>").text("").attr("src", imagen1);
      let descargas = $("<p>Numero de Descargas</p>").text(
        "Numero de descargas: " + libro.download_count
      );
      $("body").append(titulo, autor, imagen, enlace, descargas);
    });
  }
}
