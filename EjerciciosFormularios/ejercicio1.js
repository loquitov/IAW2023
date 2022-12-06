document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("formulario").addEventListener("submit", Enviar);
});

function Enviar(evento) {
  evento.preventDefault();
  let requeridos = document.getElementsByTagName("input");
  let faltarellenar = false;
  let formulario = document.getElementById("formulario");

  let reloj2 = 0;
  while (reloj2 < formulario.length - 4) {
    let info2 = "info" + reloj2;
    document.getElementById(info2).innerHTML = "";
    reloj2++;
  }

  let reloj = 0;
  while (reloj < formulario.length - 4) {
    let contenido = requeridos[reloj].value;

    if (contenido == "") {
      let info = "info" + reloj;
      document.getElementById(info).innerHTML =
        "Falta el campo " + requeridos[reloj].name;
      reloj++;
      faltarellenar = true;
    } else {
      reloj++;
    }
  }
  if (!faltarellenar) {
    let dni = document.getElementById("DNI").value;
    let numerosDNI = dni.substr(0, 8);
    let dniLongitud = dni.length;

    let letra;
    let letraCorrecta = numerosDNI % 23;
    let letras = [
      "T",
      "R",
      "W",
      "A",
      "G",
      "M",
      "Y",
      "F",
      "P",
      "D",
      "X",
      "B",
      "N",
      "J",
      "Z",
      "S",
      "Q",
      "V",
      "H",
      "L",
      "C",
      "K",
      "E",
    ];

    letra = letras[letraCorrecta];
    let dniCorrecto = numerosDNI.concat(letra);

    if (dniLongitud != 9 || dniCorrecto != dni) {
      alert("El DNI que ha introducido no es correcto");
      return;
    } else {
      email = document.getElementById("email").value;
      if (email.includes("@") == false || email.includes(".") == false) {
        alert("El email que ha introducido no es correcto");
        return;
      } else {
        let password = document.getElementById("password").value;
        let password2 = document.getElementById("password2").value;
        let passwordLongitud = password.length;

        if (password != password2 || passwordLongitud != 8) {
          alert(
            "Las contraseñas que ha introducido no son correctas, deben ser iguales y tener 8 carácteres"
          );
        }
        let checkbox = document.getElementById("terminos");

        if (checkbox.checked == false) {
          alert("Los términos no han sido aceptados");
          return;
        }
        if (faltarellenar == false) {
          let nombre = requeridos[0].value;
          let letraNombre = nombre.substr(0, 1);

          let apellido = requeridos[1].value;
          let letrasApellido = apellido.substr(0, 3);

          let tresNumeros = numerosDNI.substr(5, 8);
          let usuario = letraNombre + letrasApellido + tresNumeros;

          document.getElementById("usuario").innerHTML =
            "Te corresponde el usuario " + usuario;
        }
      }
    }
  }
}
