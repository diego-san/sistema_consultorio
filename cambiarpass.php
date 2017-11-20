<?php
require_once "bd/update.php";
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];
$rut = $varsesion;
$tipo = $_SESSION['tipo'];

$error =0;
if ($varsesion == null || $varsesion = '' ) {
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

if (!empty($_REQUEST['pass1']) && !empty($_REQUEST['pass2'])){
    $pass1=$_REQUEST['pass1'];
    $pass2=$_REQUEST['pass2'];
    if ($pass1== $pass2){
        $up= new update();
        $up->password_update($rut,$pass1);
        header("Location:close.php");
    }else{
        $error =1;    }

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
    <script src="js/validar.js"></script>
    <?php if ($error== 1):?>
        <script language="JavaScript" type="text/javascript">
            alert("Contraseña distintas");
        </script>

    <?php endif;?>


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
                <?php if ($tipo== 'ADMINISTRACION'):?>
                    <li class="active"><a href="administracion.php">Home</a></li>
                <?php elseif ($tipo== 'ROOT'):?>
                    <li class="active"><a href="root.php">Home</a></li>
                <?php elseif ($tipo== 'NORMAL'):?>
                    <li class="active"><a href="panelnormal.php">Home</a></li>
                <?php elseif ($error== 'CLINICA'):?>
                    <li class="active"><a href="medico.php">Home</a></li>
                <?php endif;?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="close.php"><span class="glyphicon glyphicon-log-in"></span>Salir</a></li>
            </ul>
        </div>
    </div>
</nav>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 .col-md-offset-4 pass_fondo">
                <form action="cambiarpass.php" onsubmit="return validar()">
                    <div class="form-group">
                    <label for="pass1">Contraseña:</label>
                    <input type="password" name="pass1" id="pass1" required minlength="4" class="form-control">
                    <label for="pass2">Repita Contraseña:</label>
                    <input type="password" name="pass2" id="pass2" required minlength="4" class="form-control"><br>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Cambiar</button>
                    </div>
                </form>
            </div>
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