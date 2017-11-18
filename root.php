<?php
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];

if ($varsesion == null || $varsesion = '' || $_SESSION['tipo'] != 'ROOT') {
    header("Location:login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>CESFAM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
<header>
    <div class="container">
        <h1 class="text-center">| Sistema Consultorio |</h1>
    </div>
</header>

<nav class="navbar navbar-default" >
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="root.php">Home</a></li>
                <li><a href="in_administracion.php">Ingresar administracion</a></li>
                <li><a href="in_clinica.php">Ingresar Clinica</a></li>
                <li><a href="#">lista</a></li>
                <li><a href="#">Cambiar contraseña</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="close.php"><span class="glyphicon glyphicon-log-in"></span>Salir</a></li>
            </ul>
        </div>
    </div>
</nav>
<main>
<div class="container-fluid admin-fondo">
    <div class="row ">
        <div class="col-md-10 col-md-offset-1 admin_tirulo">
            <h2 class="text-center">Datos personales</h2>
        </div>
        <div class="col-md-1"></div>


    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-6 admin_dato">
                    <p class="lead"> <strong>Nombre:</strong>pedro jorquera</p>
                    <p class="lead"> <strong>Rut:</strong>18.915.384-8</p>
                    <p class="lead"> <strong>Correo:</strong>asdfas@gmail.com</p>
                    <p class="lead"> <strong>Fecha de nacimiento:</strong>asdfas@gmail.com</p>
                </div>
                <div class="col-md-6 admin_dato">
                    <p class="lead"> <strong>Cargo:</strong>pedro jorquera</p>
                    <p class="lead"> <strong>Titulo:</strong>18.915.384-8</p>
                    <p class="lead"> <strong>Telefono:</strong>asdfas@gmail.com</p>
                    <p class="lead"> <strong>Direccion:</strong>asdfas@gmail.com adasfasasfaf</p>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
</main>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="footer-text">Hospital Dr. Gustavo Fricke - Dirección: Alvarez 1532 - Viña del Mar - Teléfono: (32) 2577602-2577603</div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</footer>
<script src="js/jquery-3.2.1.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>