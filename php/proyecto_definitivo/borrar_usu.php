<?php 
include "conexion.php";
    include "db.php";

      if (mysqli_connect_error()) {
        die("Error en la conexión");
    }else {
         if(isset($_GET['eliminar'])) {
if (array_key_exists("admin",$_COOKIE)) {
  $_SESSION['admin'] = $_COOKIE['admin'];
}
 if (!array_key_exists("admin",$_SESSION)){

echo "<script>window.location.href = 'https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/main.php'</script>";
 }
 if (array_key_exists("dir",$_COOKIE)) {
  $_SESSION['dir'] = $_COOKIE['dir'];
}
 if (!array_key_exists("dir",$_SESSION)){

echo "<script>window.location.href = 'https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/main.php'</script>";
 }
    else {
 $id= htmlspecialchars($_GET['eliminar']);
         $query = "DELETE FROM incidencias WHERE usuario = {$id}"; 
          $resultado= mysqli_query($enlace, $query);
     
     
         $query = "DELETE FROM usuarios WHERE id = {$id}"; 
         $resultado= mysqli_query($enlace, $query);
         echo "<script>window.location.href = 'https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/usuarios.php';</script>";
    }
  }
} 
?>