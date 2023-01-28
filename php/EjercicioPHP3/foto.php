<!DOCTYPE html>
<html>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">



<p>Sube la imagen: <input type="file" name="imagen"></p>

<p><input type="submit" name="submit" value="Subir foto"></p>

<img src="" alt="">
</form>
<?php
if (isset($_POST['submit'])) {
  $directorio = "uploads/";
  $fichero = $directorio . basename($_FILES["imagen"]["name"]); //Con esto nos referimos a que dentro de $_files seleccionamos el item que tenga como 
  $subidoOk = 1;
$tipoArchivo = strtolower(pathinfo($fichero,PATHINFO_EXTENSION));
$check = getimagesize($_FILES["imagen"]["tmp_name"]);
if($check!==false) {
echo"Archivo es una imagen " . $check["mime"].".";
$uploadOK = 1;
move_uploaded_file($_FILES["imagen"]["tmp_name"],$fichero);
echo "<img width='20%' src='$fichero'>";
}else {
  echo "El archivo no es una imagen";
  $uploadOK = 0;
}

}

?>
</body>

</html>