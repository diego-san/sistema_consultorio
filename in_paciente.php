<?php
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];

if ($varsesion == null || $varsesion = '' || $_SESSION['tipo'] != 'ADMINISTRACION') {
    echo "acceso denegado";
    die();
}
if(isset($_REQUEST['rut'])){
    $nombre= $_REQUEST['nombre'];
    $apellido= $_REQUEST['apellido'];
    $rut=$_REQUEST['rut'];
}



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.css">
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datetimepicker.js"></script>
    <script src="js/moment-with-locales.js"></script>
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
                <li class="active"><a href="administracion.php">Home</a></li>

                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>Salir</a></li>
            </ul>
        </div>
    </div>
</nav>
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Registrar Persona</h2>
            </div>
        </div>
        <div class="row">
            <form action="in_paciente.php" method="get" >
                <div class="col-md-6 in_paciente_form">
                    <div class="form-group">
                    <label for="name">Nombre: </label>
                    <input type="text" name="nombre" required id="name" minlength="1" class="form-control">
                    <label for="ape">Apellido: </label>
                    <input type="text" name="apellido" required id="ape" minlength="1" class="form-control">
                    <label for="ru">Rut: </label>
                    <input type="text" name="rut" required id="ru" minlength="8" maxlength="8" class="form-control" pattern="[0-9]>
                    <label for="nro">Numero ficha: </label>
                    <input type="text" name="ficha" required id="nro" minlength="1" class="form-control" pattern="[0-9]">
                    <label for="nac">Fecha de nacimiento: </label>
                    <input type="date" name="fect" required id="nac" minlength="1" class="form-control">
                    <label for="">Genero:</label>
                    <select class="form-control" name="genero">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>

                    </select>

                </div>
                </div>
                <div class="col-md-6 in_paciente_form">
                    <div class="form-group">
                    <label for="dir">Direccion: </label>
                    <input type="text" name="direc" required id="dir" minlength="1" class="form-control">
                    <label for="ser">Servicio salub: </label>
                    <input type="text" name="servicio" required id="ser" minlength="1" class="form-control">
                    <label for="ciu">Ciudad de nacimiento: </label>
                    <input type="text" name="ciudadnac" required id="ciu" minlength="1" class="form-control">
                    <label for="tele">Numero de telefono: </label>
                    <input type="tel" name="telefono" required id="tele" minlength="8" maxlength="11" class="form-control" pattern="[0-9] title="Solo numeros">
                    <label for="sec">Sector: </label>
                    <input type="text" name="sector" required id="sec" minlength="1" class="form-control">
                    <label for="esta">Establecimiento: </label>
                    <input type="text" name="estable" required id="esta" minlength="1" class="form-control">
                    </div>

                </div>
                <div class="col-md-12">
                    <input class="btn btn-primary btn-lg" type="submit" value="Ingresar">
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class='col-sm-6'>
                <input type='text' class="form-control" id='datetimepicker4' />
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker4').datetimepicker();
                });
            </script>
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


</body>
</html>