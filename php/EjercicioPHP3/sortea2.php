<!DOCTYPE html>
<html >
<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<p>numero de premios <input type="number" name="premios"></p>
<p>numero de participantes <input type="number" name="participantes"></p>
<p>Sortea <input type="submit"></p>
</form>
<?php
if ($_POST) {
  $participantes = htmlspecialchars($_POST['participantes']);
  $numeropremios = htmlspecialchars($_POST['numeropremios']);
  if (is_numeric($numeropremios)&& $numeropremios>=1 && round($numeropremios,0)==$numeropremios)
   {
    $agraciados = explode("\n",$participantes);//coje una cadena string o lo que sea y lo convierte en un array
    if($numeropremios<sizeof($agraciados)){
      $premios = array_rand($agraciados,$numeropremios);//Array rand un objeto aleatorio del array y coloca en la variable
      if (is_array($premios)) {
        for($indice=0;$indice<sizeof($premios);$indice++){
            $premio = $premios[$indice];
            echo "<p> $agraciados[$premio] ha sido premiado/a</p>";
        }//Con este if sacamos del array de premios todos los ganadores posibles utilizando un bucle para sacar tantos ganadores como premios halla
      }
    else {
        $premiado = rand(0,sizeof($agraciados)-1);
        echo "<p>$agraciados[$premiado]ha sido premiado/a</p>";

     }
   }else {
    echo "<p> Hay más más premios que participantes</p>";
   }


  }else {
    echo "<p> Debe introducir un número positivo mayor que 1</p>";
  }
}
?>
</body>
</html>