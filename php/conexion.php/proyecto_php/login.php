<?php
session_start();
if (array_key_exists("Logout",$_GET)){
  session_unset();
  setcookie("id","",time()+60*60);
  $_COOKIE['id']="";
}else if ((array_key_exists("id",$_SESSION) AND $_SESSION['id']) OR (array_key_exists("id",$_COOKIE)AND $_COOKIE['id']))
{
  header("Location: Iniciado.php");
}
$servername = "shareddb-s.hosting.stackcp.net";
$bd = "inci_informáticas-3132355934";
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
       $contrasena = $_POST[ 'password' ];
          $cifrado= md5($contrasena);
  $query = "SELECT username, password from usuarios WHERE username  = '". mysqli_real_escape_string($enlace,$_POST['username']). "' AND password='". $cifrado. "'";
        $resultado = mysqli_query($enlace,$query) ;
        if(mysqli_num_rows($resultado)>0){
             header("Location: Iniciado.php");
        }
            $_SESSION['id']=mysqli_insert_id($enlace);
            if ($_POST['permanecerIniciada']=='1'){
              setcookie("id",mysqli_insert_id($enlace),time()+ 60*60*24*365);
            }
           
        
        else{
          
            echo "<p> El usuario y/o la contraseña no son correctos</p>";
        }
            
        }
    }

?>

<h1>Bienvenido</h1>
<form method="POST">
    <input type="text" name="username" placeholder="Introduce tu nombre de usuario">
    <input type="password" name="password" placeholder="Introduce tu contraseña">
  <input type="checkbox" name="permanecerIniciada" value=1>
    <input type="submit" value="Iniciar sesion" name="submit">

</form>