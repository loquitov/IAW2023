<?php 
    include "db.php";


    if (mysqli_connect_error()) {
        die("Error en la conexión");
    }
    else {
        if(isset($_POST['insertar'])){
                $query="INSERT INTO incidencias(planta, aula, descripcion, fecha_alta, fecha_rev, fecha_sol, comentario) 
                VALUES('".mysqli_real_escape_string($enlace,$_POST['cogerPlanta'])."','"
                .mysqli_real_escape_string($enlace,$_POST['cogerAula'])."','"
                .mysqli_real_escape_string($enlace,$_POST['cogerDescripcion'])."','"
                .mysqli_real_escape_string($enlace,$_POST['cogerFecha_alta'])."','"
                .mysqli_real_escape_string($enlace,$_POST['cogerFecha_rev'])."','"
                .mysqli_real_escape_string($enlace,$_POST['cogerFecha_sol'])."','"
                .mysqli_real_escape_string($enlace,$_POST['cogerComentario'])."')";
                
                $sentencia = mysqli_query($enlace,$query);

                if (!$sentencia){
                    echo "<p> No se ha insertado correctamente la fila ". mysqli_error($enlace)."</p>";  
                }

                else {
                    echo "<p>La fila ha sido insertada</p>";
                }
        }   
    }
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
<link rel="stylesheet" href="./estilos.css">
</head>

<body>

<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Planta</label>
    <input type="text" class="form-control" placeholder="Planta" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerPlanta" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Aula</label>
    <input type="text" class="form-control" placeholder="Aula" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerAula" required>  
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Descripción</label>
    <input type="text" class="form-control" placeholder="Descripción" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerDescripcion" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha de alta</label>
    <input type="date" class="form-control" placeholder="Fecha de alta" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerFecha_alta" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha de revisión</label>
    <input type="date" class="form-control" placeholder="Fecha de revisión" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerFecha_rev" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha de resolución</label>
    <input type="date" class="form-control" placeholder="Fecha de resolución" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerFecha_sol" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Comentario</label>
    <input type="text" class="form-control" placeholder="Comentario" id="exampleInputEmail1" name="cogerComentario">
  </div>
  <button type="submit" class="btn btn-primary" value="insertar" name="insertar">Insertar</button>
</form>
<div class="container text-center mt-5">
      <a href="https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/main.php" class="btn btn-warning mt-5"> Volver </a>
    <div>

</body>
</html>
