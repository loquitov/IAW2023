<?php
    //La función time nos permite configurar cuanto quiero que me dure la coockie en el sistema en el que es aceptada.
    setcookie("lenguaje","es",time()+60*60*24*3);
    echo $_COOKIE['lenguaje']. "<br>";
    setcookie("provincia","Sevilla",time()+60*60*24*3);
    echo $_COOKIE['provincia'];

    //Unset para eliminar la cookies
    //unset($_COOKIE['idioma']);
?>