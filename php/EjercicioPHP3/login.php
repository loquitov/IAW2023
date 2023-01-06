<!DOCTYPE html>
<html >
<body>
  
<form action="login.php" method="post">
<label >Usuario:
  <input type="text" name="usuario">
</label>
<label >Password:
  <input type="password" name="password">
</label>

</form>
</body>

<?php

$usuario = $_POST['usuario'];
$password = $_POST['password'];

if ($usuario == "admin" && $password=="H4CK3R4$1R") {
  echo "<p>Acceso concedido</p>";
}else {
echo "<p>Acceso denegado</p>";
}

?>
</html>