<!DOCTYPE html>
<html>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

<p>Su usuario: <input type="text" name="usuario"></p>

<p>Sube la imagen: <input type="file" name="imagen"></p>

<p><input type="submit" name="submit" value="Imagen Subida"></p>

<img src="" alt="">
</form>
<?php
$directorio = "var/www/html/php3/imagenes/";
$fichero = $directorio . basename($FILES["imagen"]['name']);
$subidook = 1;
$tipoimagen = strtolower(pathinfo($fichero,PATHINFO_EXTENSION));

echo "<img src=" . $fichero . ">";

?>
</body>

</html>