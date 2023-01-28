<?php
session_start();

$query="SELECT * FROM incidencias";               
          $incidencias= mysqli_query($enlace,$query);
echo "<table>";
 echo "<tr >";
              echo " <th >{$id}</th>";
              echo " <td > {$planta}</td>";
              echo " <td > {$aula}</td>";
              echo " <td >{$descripcion} </td>";
              echo " <td >{$fecha_alta} </td>";
              echo " <td >{$fecha_revision} </td>";
              echo " <td >{$fecha_resolucion} </td>";
              echo " <td >{$comentario} </td>";

echo "</tr>";

echo "</table>";

if(array_key_exists("id",$_COOKIE)){
  $_SESSION['id'] = $_COOKIE['id'];//Esto lo  que hace es que si tenias una cookies activada te la vuelva a asignar nuevamente en este valor
}
if(array_key_exists("id",$_SESSION)){
  echo "<p>Sesión iniciada. <a href='login.php? Logout=1'>Cerrar Sesión</a></p>";
}
else {
  header("Location: login.php");
}
?>