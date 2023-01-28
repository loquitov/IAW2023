<?php
header("Content-type:application/pdf");

// It will be called downloaded.pdf
header("Content-Disposition:attachment;filename=T1-CONCEPTOS SOBRE SEGURIDAD INFORMÁTICA.pdf");

// The PDF source is in original.pdf
readfile("descargapdf.pdf");
?>

