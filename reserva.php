<?php
require_once "bd/consulta.php";
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];
$r=$varsesion;

if ($varsesion == null || $varsesion = '' || $_SESSION['tipo'] != 'NORMAL') {
    header("Location:login.php");
    die();
}

//tiempo de sesion
if(isset($_SESSION['tiempo']) ) {
    $inactivo = 1200;
    $vida_session = time() - $_SESSION['tiempo'];
    if($vida_session > $inactivo)
    {
        session_unset();
        session_destroy();
        header("Location:login.php");
        exit();
    }

}
$_SESSION['tiempo'] = time();
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
                <li class="active"><a href="panelnormal.php">Home</a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="close.php"><span class="glyphicon glyphicon-log-in"></span>Salir</a></li>
            </ul>
        </div>
    </div>
</nav>
<main>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-10 col-md-offset-1 admin_tirulo">
                <h2 class="text-center">Seleccionar Tipo De Reserva</h2>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-6 bot">
                        <button type="button" class="btn btn-primary btn-lg btn-block">Dental</button>
                        <button type="button" class="btn btn-primary btn-lg btn-block">Oftalmología</button>
                        <button type="button" class="btn btn-primary btn-lg btn-block">Salud Mental</button>
                        <button type="button" class="btn btn-primary btn-lg btn-block">Pediatria</button>
                    </div>
                    <div class="col-md-6 bot">
                        <button type="button" class="btn btn-primary btn-lg btn-block">Kinesiologia</button>
                        <button type="button" class="btn btn-primary btn-lg btn-block">Medicina General</button>
                        <button type="button" class="btn btn-primary btn-lg btn-block">Maternal</button>
                        <button type="button" class="btn btn-primary btn-lg btn-block">Ginecología</button>
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