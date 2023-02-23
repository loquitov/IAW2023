<?php 
    include "db.php";
include "conexion.php";

    if (mysqli_connect_error()) {
        die("Error en la conexión");
    }
    else {
        if(isset($_POST['insertar'])){
   
        $planta = htmlspecialchars($_POST['cogerPlanta']);
                $aula = htmlspecialchars($_POST['cogerAula']);
                $id = $_COOKIE['id'];
                $descripcion = htmlspecialchars($_POST['cogerDescripcion']);
                $comentario = htmlspecialchars($_POST['cogerComentario']);
                $fecha_de_alta = htmlspecialchars($_POST['cogerFecha_alta']);
                $fecha_de_revision = htmlspecialchars($_POST['cogerFecha_rev']);
                $fecha_de_solucion = htmlspecialchars($_POST['cogerFecha_sol']);
                $plantamayus =  strtoupper($planta);
                $aulamayus =  strtoupper($aula);
      
//Al no saber como se encuentran los campos en la base de datos lo ponemos todos en mayusculas para asegurar el exito de la consulta

                $query=" INSERT INTO incidencias (planta, aula,usuario, descripcion, fecha_alta, fecha_rev, fecha_sol, comentario) values ((SELECT planta.id from planta WHERE UPPER(planta)='{$plantamayus}'), (SELECT aula.id from aula where UPPER(aula)='{$aulamayus}'), (SELECT usuarios.id from usuarios where usuarios.id='{$id}'), '{$descripcion}', '{$fecha_de_alta}', '{$fecha_de_revision}', '{$fecha_de_solucion}', '{$comentario}');";
                
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

<form method="post" class="form">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Planta</label>
    <select class="name" placeholder="Planta" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerPlanta" required>
<option value="Primera">Primera</option>
<option value="Primera">Segunda</option>
    </select>
  </div>
  <br>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Aula</label>
    <select class="name"  id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerAula" required>
<option value="1A">1A</option>
<option value="2A">2A</option>
    </select>  
  </div>
  <br>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="name">Descripción</label>
    <input type="text" class="name" placeholder="Descripción" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerDescripcion" required>
  </div>
  <br>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="name">Fecha de alta</label>
    <input type="date" class="name" placeholder="Fecha de alta" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerFecha_alta" required>
  </div>
  <br>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="name">Fecha de revisión</label>
    <input type="date" class="name" placeholder="Fecha de revisión" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerFecha_rev" required>
  </div>
  <br>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="name">Fecha de resolución</label>
    <input type="date" class="name" placeholder="Fecha de resolución" id="exampleInputEmail1" aria-describedby="emailHelp" name="cogerFecha_sol" >
  </div>
  <br>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="name">Comentario</label>
    <input type="text" class="name" placeholder="Comentario" id="exampleInputEmail1" name="cogerComentario">
  </div>
  <button type="submit" class="submit" value="insertar" name="insertar">Insertar</button>
</form>
<div class="container text-center mt-5">
  </br>
     <a href="https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/mainadmin.php" class="boton "> Volver </a>
    <div>

</body>
</html>
