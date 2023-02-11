<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Ver </title>
  
  <body>
    
<?php

  include "db.php";

  // Crea la conexión
  $enlace = mysqli_connect($servidor, $usuario, $password, $bd);

  // Compruebo si la conexión funciona y si hay enlace.
  if (!$enlace) {
      echo "Conexión fallida: " . mysqli_connect_error();
  }
  else {

    if ((isset($_GET['incidencia_id'])) ){
    $idincidencia = htmlspecialchars($_GET['incidencia_id']);
    $query = "SELECT incidencias.id, planta.planta, aula.aula, usuarios.id,incidencias.descripcion, incidencias.fecha_alta, incidencias.fecha_rev, incidencias.fecha_sol, incidencias.comentario FROM incidencias, planta, aula, usuarios WHERE incidencias.planta=planta.id AND incidencias.aula=aula.id AND incidencias.id={$idincidencia} AND incidencias.usuario=usuarios.id LIMIT 1"; // Realizamos la consulta
    $resultado = mysqli_query($enlace,$query); // Guardamos la respuesta de la consulta en resultado
    echo '
    <table class="table table-dark" id="table"
    data-toggle="table"
    data-height="460"
    data-url="json/data1.json">
    <thead>
      <tr>
      <th scope="col">ID</th>
      <th scope="col">Planta</th>
      <th scope="col">Aula</th>
      <th scope="col">Descripción</th>
      <th scope="col">Fecha de alta</th>
      <th scope="col">Fecha de revisión</th>
      <th scope="col">Fecha de resolución</th>
      <th scope="col">Comentario</th>
      </tr>
    </thead>
  ';
    if ($resultado->num_rows > 0) {
        
        while($fila = $resultado->fetch_assoc())
            echo "<tbody><tr>
  
            <th scope='row'>".$fila["id"]."</th>
        
            <td>".$fila["planta"]."</td>
        
            <td>".$fila["aula"]."</td>

            <td>".$fila["usuario"]."</td>
      
            <td>".$fila["descripcion"]."</td>
      
            <td>".$fila["fecha_alta"]."</td>
      
            <td>".$fila["fecha_rev"]."</td>
      
            <td>".$fila["fecha_sol"]."</td>
      
            <td>".$fila["comentario"]."</td>
            </tr>";

        }

        echo "</tbody></table> <br> <p><a href='login.php?Logout=1'>Cerrar sesión</a></p>";

    }
}
    mysqli_close($enlace);

?>
<div class="container text-center mt-5">
      <a href="https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/mainadmin.php" class="btn btn-warning mt-5"> Volver </a>
    <div>