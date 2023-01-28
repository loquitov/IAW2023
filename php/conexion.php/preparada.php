<?php
    $servidor = "sdb-52.hosting.stackcp.net";
    $bd = "bdpruebas-35303034dcd8";
    $usuario = "loquitov";
    $password = "admin123*";

        $enlace = mysqli_connect($servidor, $usuario, $password, $bd); 
        if (mysqli_connect_error()) {
            die("Error en la conexión");
        }
        else {
           $stmt = $enlace->prepare("INSERT INTO usuarios (username, password, fullname, email) VALUES (?, ?, ?, ?)");
           $stmt->bind_param('ssss', $username, $password, $fullname, $email);

           $username = "Manuel04";
           $password = "alsdklas";
           $fullname = "Manuel Arcos";
           $email = "manuel@iaw.as2";
           $stmt->execute();

           $username = "Daniel23";
           $password = "xzxcbas";
           $fullname = "Daniel furro";
           $email = "daniel@ia2.as2";
           $stmt->execute();

           echo "Se han creado las entradas exitosamente";
           $stmt->close();
           $enlace->close();
        }


?>

<h1>Sentencia preparada</h1>