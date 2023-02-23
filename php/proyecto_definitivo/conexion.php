<?php
include "db.php";
$id=$_COOKIE["id"];
   $query = "SELECT username FROM usuarios WHERE id = {$id}";
        $resultado = mysqli_query($enlace,$query);
        if ($resultado->num_rows > 0) {
          // Saca datos de cada linea
          while($row = $resultado->fetch_assoc()) {

            $username=$row["username"];
            echo"<h2><p>Estas conectado con $username</p></h2>";
          

          }
        }




?>
