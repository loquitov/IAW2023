<!DOCTYPE html>
<html>
<body>

<form action="saludo.php" method="post" >

<p>Su nombre: <input type="text" name="nombre"></p>

<p><input type="submit"></p>

</form>

</body>

<?php 
if ($_POST) {
echo "Hola " . htmlspecialchars($_POST['nombre']) . " hoy es " . date("d/m/Y") . "."; 
}
?>

</html>