<!DOCTYPE html>
<html >
<body>
  
<form action="login.php" method="post">
<label >Usuario:
  <input type="text" name="usuario">
</label>
<label >Password:
  <input type="password" name="password">
  <input type="submit" value="login">
</label>

</form>

//En este ejercicio le solicitamos un usuario y contraseña al usuario y validamos si se cumplen los requisitos de validacion

<?php
if ($_POST) {
$usuario = htmlspecialchars( $_POST['usuario']);
$password =htmlspecialchars( $_POST['password']);

if ($usuario == "admin" && $password=="H4CK3R4$1R") {
  echo "<p>Acceso concedido</p>";
}else {
echo strcmp($_POST["usuario"],"")==0 ? "<p>Debe introducir un nombre de usuario </p>": "<p>Usuario y/o contraseña invalido</p>";//Esta linea lo que hace es comprobar si se ha introducido algun valor en la variable usuario y si es o no válido
echo "<p>Acceso denegado</p>";
  }
}

?>
</body>
</html>