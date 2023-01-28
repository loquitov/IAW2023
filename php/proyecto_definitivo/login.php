<?php
    if (array_key_exists('username',$_POST) OR
    array_key_exists('password',$_POST)) {

        $servidor = "shareddb-s.hosting.stackcp.net";
        $bd = "inci_informáticas-3132355934";
        $usuario = "loquitov";
        $password = "admin123*";

        $enlace = mysqli_connect($servidor, $usuario, $password, $bd); 
        if (mysqli_connect_error()) {
            die("Error en la conexión");
        }
        if ($_POST['username']=='') {
            echo "<p> El campo usuario es obligatorio </p>";
        }
        else if ($_POST['password']=='') {
            echo "<p> El campo password es obligatorio </p>";
        }
        else {
            $contra = $_POST['password'];
            $cifrada = md5($contra);
            $query = "SELECT username, password FROM usuarios WHERE username='".mysqli_real_escape_string($enlace,$_POST['username'])."' AND password='".$cifrada."'";
            $result = mysqli_query($enlace,$query);
            if (mysqli_num_rows($result)>0) {
                setcookie("id",mysqli_insert_id($enlace),time()+60*60*24*365);
                header('Location: https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/main.php');
                
            }
            else {
                echo "<p> El usuario o contraseña que ha introducido no existe </p>";
        }
    }
}

?>
<html>
<link rel="stylesheet" href="./estilos.css">
    <body>
      
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<div class="wrapper">
  <h1>Inicia Sesion</h1>
  <form class="form" method="post" >
    <input type="text" class="name" placeholder="Introduce tu nombre" name="username">
    <div>
      
    </div>
    <input type="password" class="email" placeholder="Contraseña" name="password">
     <div>
      
    </div>
    <input type="submit" class="submit" value="Registro">
  </form>
</div>
<p class="optimize">
 Optimización de rendimiento
</p>
    </body>
</html>