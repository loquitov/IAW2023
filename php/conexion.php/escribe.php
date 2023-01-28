<?php
$servername = "sdb-52.hosting.stackcp.net";
$bd = "bdpruebas-35303034dcd8";
$usuario = "loquitov";
$password = "admin123*";

// Crea la conexión con los datos de la variable que le hemos proporcionado
$enlace = mysqli_connect($servername, $usuario,$password,$bd);

//Comprueba si la conexion es valida si no hace esto 
if (!$enlace) {
  echo "Error en la conexión: " . mysqli_connect_error();

  //Si la conexión es valida entonces sigue esta instrucción
}
else {
  $query = "INSERT INTO usuarios(username,password) VALUES ('pepe', 'juanpedro')";
  mysqli_query($enlace,$query);
  echo "el usuario se ha añadido con exito";
}


mysqli_close($enlace);
?>