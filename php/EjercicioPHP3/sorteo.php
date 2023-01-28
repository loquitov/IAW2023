<!DOCTYPE html>
<html >
<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <p>Introduce un numero <input type="number" name="numero"></p>
<p>Sortea <input type="submit" value="Sorteo"></p>

</form>
<?php
if ($_GET) {
$numero = htmlspecialchars($_GET['numero']);
if (is_numeric($numero)&& $numero > 1 && round ($numero,0)==$numero) {

echo"<p>Premio para el número" .rand(1,$numero). "</p>";
  }
else {
  echo "<p>Debe introducir un número postivo mayor que 1 </p>";
  }
}
?>

</body>
</html>