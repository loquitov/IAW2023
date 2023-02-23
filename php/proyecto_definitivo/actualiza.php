<?php 
include "conexion.php";
include("db.php");

if (array_key_exists("admin",$_COOKIE)) {
                $_SESSION['admin'] = $_COOKIE['admin'];
            }
            else {
              
   
            if (array_key_exists("dir",$_COOKIE)) {
                $_SESSION['dir'] = $_COOKIE['dir'];
            }else {
              
              
           

            if (!array_key_exists("dir",$_SESSION)){

              echo "<script>window.location.href = 'https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/main.php'</script>";
              } 
              }
          }
if(isset($_GET['incidencia_id']))
    {
      $incidenciaid = htmlspecialchars($_GET['incidencia_id']); 
    }
      
     $query="SELECT incidencias.id, planta.planta, aula.aula, incidencias.descripcion, incidencias.fecha_alta, 
      incidencias.fecha_rev, incidencias.fecha_sol, incidencias.comentario, usuarios.email
      FROM incidencias, planta, aula, usuarios
      WHERE incidencias.id={$incidenciaid}
      AND incidencias.planta=planta.id
      AND incidencias.aula=aula.id
      AND incidencias.usuario = usuarios.id";
      $result= mysqli_query($enlace,$query);

      while($fila = mysqli_fetch_assoc($result))
        {
          $id = $fila['id'];                
          $planta = $fila['planta'];        
          $aula = $fila['aula'];       
          $descripcion = $fila['descripcion'];        
          $fecha_de_alta = $fila['fecha_alta'];        
          $fecha_de_revision = $fila['fecha_rev'];        
          $fecha_de_resolucion = $fila['fecha_sol'];        
          $comentario = $fila['comentario'];
          $email = $fila['email'];
        }

  if ($fecha_de_resolucion > 0) {
          $correo = true;
        }
        else {
          $correo = false;
        }
 
    if(isset($_POST['editar'])) 
    {
     
      $planta = htmlspecialchars($_POST['planta']);
      $aula = htmlspecialchars($_POST['aula']);
      $descripcion = htmlspecialchars($_POST['descripcion']);
      $fecha_de_alta = htmlspecialchars($_POST['fecha_alta']);
      $fecha_de_revision = htmlspecialchars($_POST['fecha_rev']);
      $fecha_de_resolucion = htmlspecialchars($_POST['fecha_sol']);
      $comentario = htmlspecialchars($_POST['comentario']);
      $plantamayus = strtoupper($planta);
      $aulamayus = strtoupper($aula);

      $query = "UPDATE incidencias, aula ,planta 
      SET incidencias.planta = planta.id,
       incidencias.aula = aula.id , 
        incidencias.descripcion = '{$descripcion}', 
        incidencias.fecha_alta = '{$fecha_de_alta}', 
        incidencias.fecha_rev = '{$fecha_de_revision}', 
        incidencias.fecha_sol = '{$fecha_de_resolucion}', incidencias.comentario = '{$comentario}'
         WHERE incidencias.id = '{$id}'
         AND UPPER(aula.aula) = '{$aulamayus}' 
      AND UPPER(planta.planta) = '{$plantamayus}';";

      $sentencia = mysqli_query($enlace, $query);

      if (!$sentencia)
        echo "Se ha producido un error al actualizar la incidencia.";
         else
        if ($correo==false) {
         $from = "davidcalvo00@iesamachado.org";
        $to = "{$email}";
        $subject = "Incidencia";
        $message ="La incidencia {$id} ha sido resuelta " ;
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
        echo "El email se ha enviado satifactorio";

          
        }
      else
        echo "La incidencia se ha actualizado correctamente";
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos.css">

</head>

<body>

<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Planta</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="planta" value="<?php echo $planta  ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Aula</label>
    <input type="text" class="form-control" name="aula" value="<?php echo $aula  ?>" id="exampleInputEmail1" aria-describedby="emailHelp">  
  </div>
 
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Descripción</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="descripcion" value="<?php echo $descripcion  ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha de alta</label>
    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fecha_alta" value="<?php echo $fecha_de_alta  ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha de revisión</label>
    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fecha_rev" value="<?php echo $fecha_de_revision  ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha de resolución</label>
    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fecha_sol" value="<?php echo $fecha_de_resolucion  ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Comentario</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="comentario" value="<?php echo $comentario  ?>">
  </div>
  <button type="submit" class="btn btn-primary" value="editar" name="editar">Actualizar</button>
</form>
<div class="container text-center mt-5">
      <a href="https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/mainadmin.php" class="btn btn-warning mt-5"> Volver </a>
    <div>

</body>
</html>