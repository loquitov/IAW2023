document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("formulario").addEventListener("submit", Enviar);
});

function Enviar(evento) {
  evento.preventDefault();
  let requerido = document.getElementsByTagName("input");
  let faltarellenar = false;
  let formulario = document.getElementById("formulario");

  let contador = 0;
  while (contador < formulario.length - 4) {
    let campo = "campo" + contador;
    document.getElementById(campo).innerHTML = "";
    contador++;
  }

  let contador2 = 0;
  while (contador2 < formulario.length - 4) {
    let contenido = requerido[contador2].value;

    if (contenido == "") {
      let campo2 = "campo" + contador2;
      document.getElementById(campo2).innerHTML =
        "Falta el campo" + [contador2].name;
    
      faltarellenar = true;
    }  
    contador2++;
    
    if (!faltarellenar) {
      let password = document.getElementById("password").value;
      let password2 = document.getElementById("password2").value;

      let passwordlongitud = password.length;

      if (password != password2 || passwordlongitud != 8) {
        alert("Las contraseñas es invalida y ademas deben tener 8 caracteres");
      } else {
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
        } else {
          email = document.getElementById("email").value;
          if (email.includes("@") == false || email.includes(".") == false) {
            alert("El email que has introducido no es correcto");
          } else {
            let checkbox = document.getElementById("terminos");
            if (checkbox.checked == false) {
              alert("Los terminos no han sido aceptado");
            } 
if(faltarellenar==false){
              let usuario;
              let nombre2 = requerido[0].value;
              let letraNombre = nombre2.substr(0, 1);

              let apellidos = requerido[1].value;
              let letrasApellido = apellidos.substr(0, 3);

              let tresNumeros = numerosDNI.substr(5, 8);

              let usuario1 = letraNombre;
              let usuario2 = usuario1.concat(letrasApellido);
              usuario = usuario2.concat(tresNumeros);

              console.log(usuario);
              document.getElementById("usuario").innerHTML =
                "Su usuario es" + usuario;
            }
          }
        }
      }
    }
  }
}
