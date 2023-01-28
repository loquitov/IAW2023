<html>
<head>
<title>HTML email</title>
</head>
<?php
    
    $from = "davidcalvo00@iesamachado.org";
    $to = " joseluisnunez@iesamachado.org";
    $subject = "Email david";
    $message = "Mail de David Calvo Oliva";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "El email se ha enviado satifactorio";
?>
</body>
</html>