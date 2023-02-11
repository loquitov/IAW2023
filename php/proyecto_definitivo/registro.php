<?php

    include "db.php";

if (array_key_exists("admin",$_COOKIE)) {
  $_SESSION['admin'] = $_COOKIE['admin'];
}
 if (!array_key_exists("admin",$_SESSION)){

echo "<script>window.location.href = 'https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/main.php';</script>";
 }


if(array_key_exists('username', $_POST) OR array_key_exists('password',$_POST))
{
    $enlace = mysqli_connect($servidor, $usuario,$password,$bd);
    if (mysqli_connect_error()){
        die ("hubo un error intentelo de nuevo más tarde");
    }else {
if(isset($_POST['Registrar'])){

   if ($_POST['username']==''){
        echo "<p> Se debe proporcionar un nombre de usuario </p>";
    }
    else if($_POST['password']==''){
        echo "<p> Se debe proporcionar una contraseña </p>";
    }
      
    else{


    //LLegados a este punto ambos campos han sido rellenardo por el usuario
        $query = "SELECT username from usuarios WHERE username = '". mysqli_real_escape_string($enlace,$_POST['username']). "'";
        $result = mysqli_query($enlace,$query);
 if(mysqli_num_rows($result)>0){
            echo "<p> Ese nombre de usuario ya esta registrado. Intenta con otro nuevamente </p>";
  }else {
$rol = htmlspecialchars($_POST['cogerRol']);
$username = htmlspecialchars($_POST['username']);
$contrasena = htmlspecialchars($_POST['password']);
$email = htmlspecialchars($_POST['email']);
$cifrado= md5($contrasena);
$query = "INSERT INTO usuarios (username,password,email,roles) VALUES ('{$username}','{$cifrado}','{$email}', (SELECT roles.id FROM roles WHERE roles = '{$rol}'))";

 if(mysqli_query($enlace,$query)){
 echo "<p>Hemos registrado al usuario sin problema</p>";
             
    
        $from = "davidcalvo00@iesamachado.org";
        $to = $_POST['email'];
        $subject = "Email de confirmacion";
        $message = "Tus datos son ". " Usuario: ".$_POST['username']." Contraseña: ".$_POST['password'];
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
        echo "El email se ha enviado satifactorio";

         
             }
             else {
             echo "<p> Hubo algún problema al registrar al usuario </p>";
             }
        }
    }
}}
  }
?>
<head>
  <link rel="stylesheet" href="./estilos.css">
</head>
<div class="formulario">
<h1>Formulario de Registro</h1>
<form method="POST" >
    <input type="text" name="username" placeholder="Introduce tu nombre de usuario" >
    <input type="password" name="password" placeholder="Introduce tu contraseña">
    <input type="email"  name="email" placeholder="Escriba su email" >
    <select name="cogerRol" > 
  <option value="administracion">administracion</option>
  <option value="profesores">profesores</option>
  <option value="direccion">direccion</option>
    </select>
    <input type="submit" value="Registrar" name="Registrar">
</div>
<div class="Volver"><a href="./login.php">Volver al inicio</a></div>
</form>