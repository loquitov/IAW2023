<?php

session_start();

if (array_key_exists("id",$_COOKIE)) {
  $_SESSION['id'] = $_COOKIE['id'];
}
if (array_key_exists("id",$_SESSION))
{ 

  $servidor = "shareddb-s.hosting.stackcp.net";
  $bd = "inci_informáticas-3132355934";
  $usuario = "loquitov";
  $password = "admin123*";

// Crea la conexión
$enlace = mysqli_connect($servidor, $usuario, $password, $bd);
}
else {
    echo "<script>window.location.href = 'https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/login.php';</script>";
  }
?>
