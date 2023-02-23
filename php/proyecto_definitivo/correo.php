<?php
include "db.php";
include "conexion.php";

if (array_key_exists("id",$_COOKIE)) {
     $_SESSION['id'] = $_COOKIE['id'];
    echo "<script>window.location.href = 'https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/main.php'</script>";
} else {

    if (!array_key_exists("id",$_COOKIE)) {
   $_SESSION['id'] = $_COOKIE['id'];
    echo "<script>window.location.href = 'https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/login.php'</script>";
  }
 }
if (isset($_POST['Enviar'])) {
  $usuarioconn=$_COOKIE['id'];
 $query = "SELECT  username ,email FROM  usuarios where id={$usuarioconn};"; // Realizamos la consulta
    $resultado = mysqli_query($enlace,$query); // Guardamos la respuesta de la consulta en resultado
   if ($resultado) {    
    while($fila = $resultado->fetch_assoc()) {
        $usuariocorreo=$fila['username'];
        $correousuario=$fila['email'];
}


$asuntocorreo=htmlspecialchars($_POST['asunto']);
$destinocorreo=htmlspecialchars($_POST['destino']);
$mensajecorreo=htmlspecialchars($_POST['contenido']);


    $from = "{$correousuario}";
    $to = "{$destinocorreo}";
    $subject = "{$asuntocorreo}";
    $message = "{$mensajecorreo}";
    $headers = "From: <". $correousuario . ">";
    mail($to,$subject,$message, $headers);
    echo "<p>El email se ha enviado con exito</p>";

 }else {
  echo "<p>El correo no se ha enviado correctamente</p>";
 }
}
   
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Correo</title>
<link rel="stylesheet" href="./estilos.css">
</head>
<body>
  <form method="post">
 <label >Para:</label>
    <input type="email" placeholder="Escriba a quien va dirigido" name="destino" required>
    <br>
      <label >Asunto</label>
    <input type="text" placeholder="Escriba el asunto" name="asunto">
    <br>
    <textarea name="contenido"  cols="100" rows="20" placeholder="Escriba el contenido de su correo"></textarea>
    <input type="submit" value="Enviar" name="Enviar">
    <br>
    <br>
    <br>
     <a href='mainadmin.php?' class='boton'>Volver</a>
  </form>
</body>
</html>