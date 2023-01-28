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
  $query = "ALTER TABLE usuarios ADD (email   TEXT, fullname TEXT ) ";//Este script se utiliza para añadir varias columnas a la vez en una tabla
  
  mysqli_query($enlace,$query,);
  echo "Se han realizado los cambios correctamente";
}


mysqli_close($enlace);
?>