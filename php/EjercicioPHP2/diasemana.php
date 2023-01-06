<!DOCTYPE html>
<html>
<body>

<?php


$day = date("l");
switch ($day) {
    case "Sunday":
           echo "Hoy es domingo";
    break;
    case "Monday":
           echo "Hoy es lunes";
    break;
    case "Tuesday":
           echo "Hoy es martes";
    break;
    case "Wednesday":
           echo "Hoy es miércoles";
    break;
    case "Thursday":
           echo "Hoy es jueves";
    break;
    case "Friday":
           echo "Hoy es viernes";
    break;
    case "Saturday":
           echo "Hoy es sábado";
    break;
}
?>

</body>
</html>