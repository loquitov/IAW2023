<?php

$servername = "sdb-52.hosting.stackcp.net";
$bd = "bdpruebas-35303034dcd8";
$usuario = "loquitov";
$password = "admin123*";
header("Content-type:text/html;charset=utf-8");
if(array_key_exists('username', $_POST) OR array_key_exists('password',$_POST) OR array_key_exists('password',$_POST) OR array_key_exists('password',$_POST))
{
    $enlace = mysqli_connect($servername, $usuario,$password,$bd);
    if (mysqli_connect_error()){
        die ("hubo un error intentelo de nuevo más tarde");
    }
    if($_POST['username']==''){
        echo "<p> Se debe proporcionar un nombre de usuario </p>";
    }
    else if($_POST['password']==''){
        echo "<p> Se debe proporcionar una contraseña </p>";
    }
       else if($_POST['email']==''){
        echo "<p> Se debe proporcionar un email </p>";
    }
      else if($_POST['fullname']==''){
        echo "<p> Se debe proporcionar un email </p>";
    }


    //LLegados a este punto ambos campos han sido rellenardo por el usuario
    else{
        $query = "SELECT username from usuarios WHERE username = '". mysqli_real_escape_string($enlace,$_POST['username']). "'";
        $resultado = mysqli_query($enlace,$query);
        if(mysqli_num_rows($result)>0){
            echo "<p> Ese nombre de usuario ya esta registrado. Intenta con otro nuevamente </p>";
        }
        else{
          $contrasena = $_POST[ 'password' ];
          $cifrado= md5($contrasena);
            $query = "INSERT INTO usuarios (username,password,email,fullname) VALUES ('" . mysqli_real_escape_string($enlace,$_POST['username'])."','". $cifrado."','" .mysqli_real_escape_string($enlace,$_POST['email'])."','" .mysqli_real_escape_string($enlace,$_POST['fullname'])."')";
             if(mysqli_query($enlace,$query)){
              echo "<p>Hemos registrado al usuario sin problema</p>";
             
    
    $from = "davidcalvo00@iesamachado.org";
    $to = $_POST['email'];
    $subject = "Email de confirmacion";
    $message = "Tus datos son ". " Usuario: ".$_POST['username']." Contraseña: ".$_POST['password']." Nombre completo:  ".$_POST['fullname'];
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "El email se ha enviado satifactorio";

             }
             else {
             echo "<p> Hubo algún problema al registrar al usuario </p>";
             }
        }
    }
}
?>

<h1>Formulario de Registro</h1>
<form method="POST">
    <input type="text" name="username" placeholder="Introduce tu nombre de usuario">
    <input type="password" name="password" placeholder="Introduce tu contraseña">
    <input type="email"  name="email" placeholder="Escriba su email">
    <input type="fullname" name="fullname">
    <input type="submit" value="Registrar">

</form>