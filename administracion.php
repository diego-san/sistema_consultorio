<?php
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];

if ($varsesion == null || $varsesion = '') {
    echo "acceso denegado";
    die();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<H1>hola</H1>
<a href="close.php">cerrar</a>
</body>
</html>
