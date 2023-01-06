<!DOCTYPE html>
<html>
<body>

<?php
$palabras = array("car"=>"coche", "bike"=>"bicicleta", "plane"=>"avión","sun"=>"sol","moon"=>"luna");

foreach($palabras as $x => $x_value) {
  echo "Inglés=" . $x . ", Español=" . $x_value;
  echo "<br>";
}
?>

</body>
</html>