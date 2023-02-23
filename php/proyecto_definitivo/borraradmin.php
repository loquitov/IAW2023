<?php 
include "conexion.php";
    include "db.php";


    if (array_key_exists("admin",$_COOKIE)) {
  $_SESSION['admin'] = $_COOKIE['admin'];
}
 if (!array_key_exists("admin",$_SESSION)){

echo "<script>window.location.href = 'https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/main.php'</script>";
 }

 
 if (mysqli_connect_error()) {
        die("Error en la conexión");
    }
    else {

    if(isset($_GET['eliminar']))
     {
      
         $id= htmlspecialchars($_GET['eliminar']);
         $query = "DELETE FROM incidencias WHERE incidencias.id = {$id}"; 
         $resultado= mysqli_query($enlace, $query);
         echo "<script>window.location.href = 'https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/mainadmin.php';</script>";
     }
    }
?>