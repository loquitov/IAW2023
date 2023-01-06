<!DOCTYPE html>
<html >
<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <p>Introduce un numero <input type="number" name="numero"></p>
<p>Sortea <input type="submit"></p>

</form>
<?php
$numero = $_POST['numero'];

if ($numero < 1) {
  echo "el numero introducido no es válido";
}else {
  echo "El ganador es :" . $numero . (rand(1, $numero)) . ".";
}
?>

</body>
</html>