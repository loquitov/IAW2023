<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Pagina principal</title>

<link rel="stylesheet" href="./estilos.css">
 
  
  
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
    $query = "SELECT id, planta, aula, descripcion, fecha_alta, fecha_rev, fecha_sol, comentario FROM incidencias"; // Realizamos la consulta
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
      
            <td>".$fila["descripcion"]."</td>
      
            <td>".$fila["fecha_alta"]."</td>
      
            <td>".$fila["fecha_rev"]."</td>
      
            <td>".$fila["fecha_sol"]."</td>
      
            <td>".$fila["comentario"]."</td>
            <td class='text-center'> <a href='visualizar.php?incidencia_id={$fila["id"]}' class='btn btn-primary'> <i class='bi bi-eye'></i> VER</a> </td>
            <td class='text-center' > <a href='actualiza.php?editar&incidencia_id={$fila["id"]}' class='btn btn-secondary'><i class='bi bi-pencil'></i> EDITAR</a> </td>
            <td class='text-center'>  <a href='borrar.php?eliminar={$fila["id"]}' class='btn btn-danger'> <i class='bi bi-trash'></i> ELIMINAR</a> </td>
        
          </tr>";
    }

    echo "</tbody></table> <br> <p><a chref='login.php?Logout=1' class='boton'>Cerrar sesión</a></p>";

  }
    mysqli_close($enlace);
  

?>



<a href="https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/insert.php" >Haz click aquí para llegar al menu de insertar filas.</a>



</body>
</body>
</html>
</html>