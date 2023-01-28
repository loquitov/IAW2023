<?php
$servername = "sdb-52.hosting.stackcp.net";
$bd = "bdpruebas-35303034dcd8";
$usuario = "loquitov";
$password = "admin123*";

// Create connection
$conn = mysqli_connect($servername, $usuario,$password,$bd);

// Check connection
if (!$conn) {
  echo "Error en la conexión: " . mysqli_connect_error();
}else {
echo "Conectado  con exito";
myslqi_close($conn);
}
?>