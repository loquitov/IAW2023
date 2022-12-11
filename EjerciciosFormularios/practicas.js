document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("formulario").addEventListener("submit", Enviar);
});

function Enviar(evento) {
  evento.preventDefault();
let requerido = document.getElementsByTagName("input");
let faltarellenar = false;
let formulario = document.getElementById("formulario");

let contador=0;
while (contador < formulario.length - 4) {
  let info = "info" + contador;
  document.getElementById(info).innerHTML="";
  contador++;
}

let contador1=0;
while (contador1 < formulario.length - 4) {
  let contenido = requerido[contador1].value;
  if (contenido=="") {
let info2= "info" + contador1;
document.getElementById(info2).innerHTML="Falta el campo" + requerido[contador1].name;
contador1++;
faltarellenar=true;

}else{
  contador1++;
}
}  

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
}

let email=document.getElementById("email").value;
if (email.includes("@")==false||email.includes(".")==false) {
alert("El email que no has introducido no es valido");
  return;
}
let password=document.getElementById("password").value;
let password2=document.getElementById("password2").value;
let passwordlongitud=password.length;
if (password!= password2 || passwordlongitud !=8) {
  alert("Las contraseñas deben tener al menos 8 caracteres y deben ser iguales");
return;
}
let checkbox = document.getElementById("terminos");
if (checkbox.checked==false) {
  alert("Las politicas se deben aceptar los terminos para poder continuar");
  return;
}
if (faltarellenar==false) {
  let nombre=document.getElementById("nombre").value;
  let letraInicial=nombre.substr(0,1);
   let apellidos=document.getElementById("apellidos").value;
   let tresLetras=apellidos.substr(0,3);
  let tresNumeros = numerosDNI.substr(5,8);

  let usuario = letraInicial + tresLetras + tresNumeros;
  
  document.getElementById("usuario").innerHTML="Tu usuario es :" + usuario;
}

}

