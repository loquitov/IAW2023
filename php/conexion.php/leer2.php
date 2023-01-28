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
$query = "SELECT * from usuarios LIMIT 2";//Con el LIMIT se consige espcificar el numero de registros que se quieren mostrar
$resultado = mysqli_query($enlace,$query);
if (mysqli_num_rows($resultado) > 0) {
  // Proporciona salida de datos por cada fila
  while($fila = mysqli_fetch_assoc($resultado)) {
    echo "id: " . $fila["id"]. " - Nombre: " . $fila["username"]. " Password:" . $fila["password"]. "<br>";
  }
} else {
  echo "No se encontraron resultados";
}

mysqli_close($enlace);
?>