<?php

$servername = "sdb-52.hosting.stackcp.net";
$bd = "bdpruebas-35303034dcd8";
$usuario = "loquitov";
$password = "admin123*";

header("Content-type:text/html;charset=utf-8");
if(array_key_exists('username', $_POST) OR array_key_exists('password',$_POST))
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
    //LLegados a este punto ambos campos han sido rellenardo por el usuario
    else{
  $query = "SELECT username, password from usuarios WHERE username  = '". mysqli_real_escape_string($enlace,$_POST['username']). "' AND password='". mysqli_real_escape_string($enlace,$_POST['password']). "'";
        $resultado = mysqli_query($enlace,$query);
        if(mysqli_num_rows($resultado)>0){
            echo "<p> Autenticacion confirmada </p>";
        }
        else{
          
            echo "<p> El usuario y/o la contraseña no son correctos</p>";
        }
            
        }
    }

?>

<h1>Formulario de Autenticación</h1>
<form method="POST">
    <input type="text" name="username" placeholder="Introduce tu nombre de usuario">
    <input type="password" name="password" placeholder="Introduce tu contraseña">
  
    <input type="submit" value="Registrar">

</form>