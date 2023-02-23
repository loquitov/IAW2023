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
          if(isset($_POST['inicio'])){
            $contra = $_POST['password'];
            $cifrada = md5($contra);
            $query = "SELECT id, username, password FROM usuarios WHERE username='".mysqli_real_escape_string($enlace,$_POST['username'])."' AND password='".$cifrada."'";
            $result = mysqli_query($enlace,$query);
         if ($result){
          $fila = mysqli_fetch_array($result);
          $id = $fila['id'];
         }
            if (mysqli_num_rows($result)>0) {
                setcookie("id",$id,time()+60*60*24*365);

                $query =  "SELECT username, password,roles FROM usuarios WHERE username='".mysqli_real_escape_string($enlace,$_POST['username'])."' AND password='".$cifrada."'  AND roles =5";
                $result = mysqli_query($enlace,$query);
                if(mysqli_num_rows($result)>0){
                  setcookie("admin",mysqli_insert_id($enlace),time()+60*60*24*365);
                 echo"<script>window.location.href =' https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/mainadmin.php';</script>";
                }
          
             $query =  "SELECT username, password,roles FROM usuarios WHERE username='".mysqli_real_escape_string($enlace,$_POST['username'])."' AND password='".$cifrada."'  AND roles =1";
                $result = mysqli_query($enlace,$query);
                if(mysqli_num_rows($result)>0){
                  setcookie("dir",mysqli_insert_id($enlace),time()+60*60*24*365);
                  echo"<script>window.location.href =' https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/maindir.php';</script>";
                }
                 echo"<script>window.location.href =' https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/main.php';</script>";
            
              }
            else {
                echo "<p> El usuario o contraseña que ha introducido no existe </p>";
        }
 }   }
}

//El siguiente comando sirve para en el caso de que el get devuelva un logout =1 se le quitara el tiempo de la cookie que posee actualmente de tal modo que debera acceder nuevamente a la pantalla de login
 if(!empty($_GET['Logout']==1)){
    setcookie("id",mysqli_insert_id($enlace),time()-60*60*24*365);
   setcookie("admin",mysqli_insert_id($enlace),time()-60*60*24*365);
    setcookie("dir",mysqli_insert_id($enlace),time()-60*60*24*365);
    session_destroy();
 }

?>
<html>
<link rel="stylesheet" href="./estilos.css">
    <body>
      
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<div class="formulario">
  <img src="./64041-gold-symbol-dollar-sign-currency-transparent.webp" class="dolar">
  <form class="form" method="post" >
    <input type="text" class="name" placeholder="Introduce tu nombre" name="username">
    <div>
      
    </div>
    <input type="password" class="email" placeholder="Contraseña" name="password">
     <div>
      
    </div>
    <input type="submit" class="submit" value="Iniciar Sesion" name=inicio>
    <br>
    <br>
    <a href='registrousuarios.php?' class='boton' weight="100px">Registrarse</a>
  </form>
</div>
<p class="optimize">
 Optimización de rendimiento
</p>
    </body>
</html>