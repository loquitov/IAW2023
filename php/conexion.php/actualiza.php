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
  $query = "UPDATE usuarios SET username = 'juan' WHERE id=3 LIMIT 1";
  mysqli_query($enlace,$query);
  echo "Se han realizado los cambios con exito";
}


mysqli_close($enlace);
?>