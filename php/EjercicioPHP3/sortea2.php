<!DOCTYPE html>
<html >
<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<p>numero de premios <input type="number" name="premios"></p>
<p>numero de participantes <input type="number" name="participantes"></p>
<p>Sortea <input type="submit"></p>
</form>
<?php
$premios = $_POST['premios'];
$participantes = $_POST['participantes'];

if ($premios > 1 && $participantes > 1) {

  for ($x = 0; $x <= $premios; $x++) { 
    echo "EL participabte numero" .  rand(1 , $participantes) . "Ha ganado. <br>";
  }

}else {
  echo "El numero que has introducido no es válido";
}

?>
</body>
</html>