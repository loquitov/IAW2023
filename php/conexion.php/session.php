<?php
session_start();
$_SESSION["idusuario"]="davidcalvooliva";
if($_SESSION["idusuario"]){
echo "<p>El usuario: " . $_SESSION["idusuario"] . " ha iniciado sesión</p>"; 

}else {
    echo "<p>No se ha iniciado sesión </p>";
}

?>