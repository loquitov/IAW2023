<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Emoticono php</title>

</head>
<body>
  <div>
  </div>
<?php
$r = rand( 0, 255 );
$g = rand( 0, 255 );
$b = rand( 0, 255 );

echo $bgcolor = 'rgba('.$r.','.$g.','.$b.')';
?>

</body>
</html>