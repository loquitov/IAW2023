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

  include "db.php";
if (array_key_exists("dir",$_COOKIE)) {
  $_SESSION['dir'] = $_COOKIE['dir'];
}
 if (!array_key_exists("dir",$_SESSION)){

echo "<script>window.location.href = 'https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/main.php'</script>";
 }

  


  // Crea la conexión
  $enlace = mysqli_connect($servidor, $usuario, $password, $bd);
$query = "SELECT COUNT(fecha_alta) AS cantidad FROM incidencias;";
        $resultado = mysqli_query($enlace,$query);
        if ($resultado->num_rows > 0) {
          // Saca datos de cada linea
          while($row = $resultado->fetch_assoc()) {

            $info=($row["cantidad"]);
            echo "<p>Todas las incidencias: $info</p>";

          }
        }

        $query = "SELECT COUNT(fecha_sol) AS cantidad FROM incidencias WHERE fecha_sol> 0";
        $resultado = mysqli_query($enlace,$query);
        if ($resultado->num_rows > 0) {
          // Saca datos de cada linea
          while($row = $resultado->fetch_assoc()) {

            $info2=($row["cantidad"]);
            echo "<p>Incidencias resueltas: $info2</p>";

          }
        }

        $diferencia = $info - $info2;
        echo "<p>Incidencias faltantes: $diferencia</p>";
  // Compruebo si la conexión funciona y si hay enlace.
  if (!$enlace) {
      echo "Conexión fallida: " . mysqli_connect_error();
  }
  
  else {
    $query = "SELECT incidencias.id, planta.planta, aula.aula, incidencias.usuario,incidencias.descripcion, incidencias.fecha_alta, incidencias.fecha_rev, incidencias.fecha_sol, incidencias.comentario FROM incidencias, planta, aula, usuarios WHERE incidencias.planta=planta.id    AND incidencias.fecha_sol=0 AND incidencias.aula=aula.id AND incidencias.usuario=usuarios.id;"; // Realizamos la consulta
    $resultado = mysqli_query($enlace,$query); // Guardamos la respuesta de la consulta en resultado
    echo '
    <table  id="table"
    data-toggle="table"
    data-height="460"
    data-url="json/data1.json">
    <thead>
      <tr>
      <th scope="col">ID</th>
      <th scope="col">Planta</th>
      <th scope="col">Aula</th>
      <th scope="col">USUARIO</th>
      <th scope="col">Descripción</th>
      <th scope="col">Fecha de alta</th>
      <th scope="col">Fecha de revisión</th>
      <th scope="col">Fecha de resolución</th>
      <th scope="col">Comentario</th>
      <th scope="col" colspan="3" class="text-center">Acciones</th>
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
            <td class='text-center'> <a href='visualizar.php?incidencia_id={$fila["id"]}' class='btn btn-primary'> <i class='bi bi-eye'></i> VER</a> </td>
            <td class='text-center' > <a href='actualiza.php?editar&incidencia_id={$fila["id"]}' class='btn btn-secondary'><i class='bi bi-pencil'></i> EDITAR</a> </td>
            <td class='text-center'>  <a href='borrardir.php?eliminar={$fila["id"]}' class='btn btn-danger'> <i class='bi bi-trash'></i> ELIMINAR</a> </td>
        
          </tr>";
    }

    echo "</tbody></table> <br> <p><a href='login.php?Logout=1' class='boton'>Cerrar sesión</a></p>";

  }
    mysqli_close($enlace);
  

?>



<p><a class="enlaceb" href="https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/insert.php" >INSERTAR FILAS</a></p>




</body>
</body>
</html>
</html>