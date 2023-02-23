<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Pagina principal</title>

<link rel="stylesheet" href="./estilos.css">
 
</head>
  
  <body>
    
<?php
include "conexion.php";
  include "db.php";

 if (array_key_exists("id",$_COOKIE)) {
     $_SESSION['id'] = $_COOKIE['id'];
    echo "<script>window.location.href = 'https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/main.php'</script>";
} else {

    if (!array_key_exists("id",$_COOKIE)) {
   $_SESSION['id'] = $_COOKIE['id'];
    echo "<script>window.location.href = 'https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/login.php'</script>";
  }
 }
  // Crea la conexión
  $enlace = mysqli_connect($servidor, $usuario, $password, $bd);
$query = "SELECT COUNT(fecha_alta) AS cantidad FROM incidencias;";
        $resultado = mysqli_query($enlace,$query);
        if ($resultado->num_rows > 0) {
          // Saca datos de cada linea
          while($row = $resultado->fetch_assoc()) {

            $incidencias=($row["cantidad"]);
          

          }
        }

        $query = "SELECT COUNT(fecha_sol) AS cantidad FROM incidencias WHERE fecha_sol> 0";
        $resultado = mysqli_query($enlace,$query);
        if ($resultado->num_rows > 0) {
          // Saca datos de cada linea
          while($row = $resultado->fetch_assoc()) {

            $resueltas=($row["cantidad"]);
          

          }
        }

       
          $diferencia = $incidencias - $resueltas;
        

      echo '
      <br>
    <table  id="table"
    data-toggle="table"
    data-height="460"
    data-url="json/data1.json">

    <thead>
      <tr>
       <th colspan="3" scope="rowgroup">Incidencias</th>
      </tr>
    </thead>
    <thead>
      <tr>
      <th scope="col">Faltantes</th>
      <th scope="col">Resueltas</th>
      <th scope="col">Totales</th>
      </tr>
    </thead>
  ';

  echo "<tbody><tr>
        
            <td><p>".$diferencia."</p></td>
        
            <td><p>".$resueltas."</p></td>

            <td><p>".$incidencias."</p></td>
      
          </tr>";
  // Compruebo si la conexión funciona y si hay enlace.
  if (!$enlace) {
      echo "Conexión fallida: " . mysqli_connect_error();
  }
  else {
    $query = "SELECT  usuarios.username,usuarios.id, count(fecha_sol) AS cantidad FROM incidencias, usuarios WHERE  incidencias.fecha_sol=0  AND incidencias.usuario=usuarios.id GROUP BY usuarios.username"; // Realizamos la consulta
    $resultado = mysqli_query($enlace,$query); // Guardamos la respuesta de la consulta en resultado
    echo '
    <table  id="table"
    data-toggle="table"
    data-height="460"
    data-url="json/data1.json">
    <thead>
      <tr>
            <th scope="col">Username</th>
           
      <th scope="col">Incidencias</th>
      <th scope="col" colspan="3" class="text-center">Acciones</th>
      </tr>
    </thead>
  ';
    if ($resultado->num_rows > 0) {
        
        while($fila = $resultado->fetch_assoc())
            echo "<tbody><tr>
  
           <td>".$fila["username"]."</td>

          <td>".$fila["cantidad"]."</td>
         
            <td class='text-center'>  <a href='main2.php?incidencia={$fila["id"]}' >  VER TODAS LAS INCIDENCIAS</a> </td>
            </td>
        
          </tr>";
    }

    echo "</tbody></table> <br> <p><a href='login.php?Logout=1' class='boton'>Cerrar sesión</a></p>";

  }
    mysqli_close($enlace);
  

?>



<p><a class="enlaceb" href="https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/insert.php" >INSERTAR FILAS</a></p>
<br>
<p><a class="enlaceb" href="https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/correo.php" >  ENVIAR CORREO</a></p>



</body>
</body>
</html>
</html>