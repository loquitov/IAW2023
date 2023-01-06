<!DOCTYPE html>
<html>
<body>

<?php
$palabras = array("Jesucristo", "Pikachu", "Doraemon" ,"Macarrones");
sort($palabras);

$clength = count($palabras);
for($x = 0; $x < $clength; $x++) {
  echo $palabras[$x];
  echo "<br>";
}
?>

</body>
</html>