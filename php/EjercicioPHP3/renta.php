<!DOCTYPE html>
<html>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >

<p>Su nombre: <input type="text" name="nombre"></p>

<p>Su apellido: <input type="text" name="apellido"></p>

<p>Su email: <input type="text" name="email"></p>

<p>Su sueldo bruto: <input type="number" name="bruto"></p>

<p>Trabajador de una ONG. <input type="checkbox" name="casilla" value="marcada"></p>

<p><input type="submit"></p>

</form>
<?php
$bruto = $_POST['bruto'];
$casilla = $_POST['casilla'];

if ($bruto <= 0) {
  echo "El sueldo bruto que ha introducido no es valido";
}
elseif ($bruto < 10000) {
    echo "El tipo impositivo que te corresponde es del 5% <br>";
    $neto = $bruto * 0.05;
    if ($casilla=="marcada") {
      $netoreducido = $neto * 0.98; 
      echo "Debera abonar la cantidad de" . $netoreducido . "€.";
    }else {
      echo "Debera abonar la cantidad de" . $neto . "€.";
    }
}
elseif ($bruto >= 10000 && $bruto < 20000) {
    echo "El tipo impositivo que te corresponde es del 15% <br>";
    $neto = $bruto * 0.15;
    if ($casilla=="marcada") {
      $netoreducido = $neto * 0.98; 
      echo "Debera abonar la cantidad de" . $netoreducido . "€.";
    }else {
      echo "Debera abonar la cantidad de" . $neto . "€.";
    }
}
elseif ($bruto >= 20000 && $bruto < 35000) {
    echo "El tipo impositivo que te corresponde es del 20% <br>";
    $neto = $bruto * 0.20;
    if ($casilla=="marcada") {
      $netoreducido = $neto * 0.98; 
      echo "Debera abonar la cantidad de" . $netoreducido . "€.";
    }else {
      echo "Debera abonar la cantidad de" . $neto . "€.";
    }
}
elseif ($bruto >= 35000 && $bruto < 60000) {
    echo "El tipo impositivo que te corresponde es del 30% <br>";
    $neto = $bruto * 0.30;
    if ($casilla=="marcada") {
      $netoreducido = $neto * 0.98; 
      echo "Debera abonar la cantidad de" . $netoreducido . "€.";
    }else {
      echo "Debera abonar la cantidad de" . $neto . "€.";
    }
}
elseif ($bruto > 60000 ) {
    echo "El tipo impositivo que te corresponde es del 40% <br>";
    $neto = $bruto * 0.40;
    if ($casilla=="marcada") {
      $netoreducido = $neto * 0.98; 
      echo "Debera abonar la cantidad de" . $netoreducido . "€.";
    }else {
      echo "Debera abonar la cantidad de" . $neto . "€.";
    }
}
?>
</body>
</html>