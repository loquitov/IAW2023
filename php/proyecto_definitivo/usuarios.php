 <?php
 include "db.php";
if (array_key_exists("admin",$_COOKIE)) {
  $_SESSION['admin'] = $_COOKIE['admin'];
}
 if (!array_key_exists("admin",$_SESSION)){

echo "<script>window.location.href = 'https://iawdavidcalvo-com.stackstaging.com/proyecto_definitivo/main.php'</script>";
 }

  


  // Crea la conexión
  $enlace = mysqli_connect($servidor, $usuario, $password, $bd);

if (!$enlace) {
      echo "Conexión fallida: " . mysqli_connect_error();
  }
else {
    $query = "SELECT * FROM usuarios "; // Realizamos la consulta
    $resultado = mysqli_query($enlace,$query);
echo '
    <table  id="table"
    data-toggle="table"
    data-height="460"
    data-url="json/data1.json">
    <thead>
      <tr>
      <th scope="col">ID</th>
      <th scope="col">USUARIO</th>
      <th scope="col">CONTRASENA</th>
      <th scope="col">EMAIL</th>
      <th scope="col">ROLES</th>
      <th scope="col" colspan="3" class="text-center">Acciones</th>
      </tr>
    </thead>
  ';
}
  if ($resultado->num_rows > 0) {
        
        while($fila = $resultado->fetch_assoc())
            echo "<tbody><tr>
  
            <th scope='row'>".$fila["id"]."</th>
        
        
            <td>".$fila["username"]."</td>
      
            <td>".$fila["password"]."</td>
      
            <td>".$fila["email"]."</td>
      
            <td>".$fila["roles"]."</td>
      
             <td class='text-center'>  <a href='borrar_usu.php?eliminar={$fila["id"]}' class='btn btn-danger'> <i class='bi bi-trash'></i> ELIMINAR</a> 
          </tr>";
    }
     echo "</tbody></table> <br> <p><a href='mainadmin.php?' class='boton'>Volver</a></p>";
  ?>
  <!DOCTYPE html>
  <html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar usuarios</title>
    <link rel="stylesheet" href="./estilos.css">
  </head>
  <body>
    <button></button>
  </body>
  </html>