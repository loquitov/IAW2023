<!DOCTYPE html>
<html>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >

<p>Su nombre: <input type="text" name="nombre"></p>

<p>Su apellido: <input type="text" name="apellido"></p>

<p>Opinion sobre las clases <textarea name="opinion" cols="40" rows="5"></textarea></p>

<p>Género: 
    <input type="radio" name="genero" value="masculino">Masculino
    <input type="radio" name="genero" value="femenino">Femenino
    <input type="radio" name="genero" value="otro">Otro
</p>

<select name="lenguajes">
        <option value="javascript">JavaScript</option>
        <option value="php">PHP</option>
        <option value="python">Python</option>
        <option value="C++">C++</option>
</select>

<p>Acepte los terminos. <input type="checkbox" name="casilla" value="marcada"></p>

<p><input type="submit"></p>

</form>
<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$opinion = $_POST['opinion'];
$genero = $_POST['genero'];
$lenguajes = $_POST['lenguajes'];
$casilla = $_POST['casilla'];

echo "<p>tu nombre es " . $nombre . "</p>";
echo "<p>tu apellido es " . $apellido . "</p>";
echo "<p>Has dejado la siguiente opinion: " . $opinion . "</p>";
echo "<p>Su genero es " . $genero . "</p>";
echo "<p>el lenguaje seleccionado es " . $lenguajes . "</p>";
if ($casilla == "marcada"){
  echo "<p> Los terminos han sido aceptados . </p>";
}else {
  echo "<p>Los terminos no han sido aceptados . </p>";
}
?>
</body>

</html>