<?php

require_once "bd/consulta.php";
if (isset($_GET['r']) && is_numeric($_GET['r'])) {
    $rut = (int) $_GET['r'];
} else{

    header("Location:login.php");

}
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];


if ($_SESSION['tipo'] == 'ADMINISTRACION' || $_SESSION['tipo'] == 'CLINICA' ) {

}else{
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

$consulta = new consulta();
$datohito = $consulta->historial($rut);
$datoshistoorden = array_reverse($datohito);



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
<?php if ($_SESSION['tipo'] == 'ADMINISTRACION'):?>
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
                    <li><a href="in_paciente.php">Ingresar Paciente</a></li>
                    <li><a href="buscarpe.php">Busqueda Paciente</a></li>
                    <li><a href="resetp.php">Restablecer Contraseña Persona</a></li>
                    <li><a href="listaespera.php">Lista Espera</a></li>
                    <li><a href="grafica.php">Grafica</a></li>
                    <li><a href="datosadmin.php"> Mis Datos</a></li>
                    <li><a href="cambiarpass.php">Cambiar Contraseña</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="close.php"><span class="glyphicon glyphicon-log-in"></span>Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>
<?php else:?>

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
                    <li class="active"><a href="medico.php">Home</a></li>
                    <li><a href="in_historial.php">Ingresar Historial</a></li>
                    <li><a href="buscarpe.php">Buscar Persona</a></li>
                    <li><a href="datoscli.php">Mis Datos</a></li>
                    <li><a href="cambiarpass.php">Cambiar Contraseña</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="close.php"><span class="glyphicon glyphicon-log-in"></span>Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>

<?php endif;?>
<main>
    <div class="container-fluid histoespacio">
        <div class="row ">
            <div class="col-md-10 col-md-offset-1 admin_tirulo">
                <h2 class="text-center">Historial</h2>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <a type="button" class="btn btn-danger btn-lg" target="_blank" href="pdf/pdf.php?r=<?php echo $rut;?>">Descargar Historial</a>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
        </div>
        <?php foreach ($datoshistoorden as $key => $value):?>
            <?php $infoclinica = $consulta->info_clinia($value[1]) ;  ?>
            <div class="row">
                <div class="col-md-10 col-md-offset-1 datos_fondo">
                    <div class="row">
                        <div class="col-md-12 datos_header">
                            <p class="text_datos text-center"><?php echo $value [3];?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 admin_dato">
                            <p class="lead"> <strong>Atendido por: </strong><?php echo $infoclinica[0][2]." ".$infoclinica[0][3];?></p>
                            <p class="lead"> <strong>Rut Especialista: </strong><?php echo $infoclinica[0][0]."-".$infoclinica[0][1];?></p>

                        </div>
                        <div class="col-md-6 admin_dato">
                            <p class="lead"> <strong>TItulo: </strong><?php echo $infoclinica[0][4];?></p>
                            <p class="lead"> <strong>Fecha de Procedimiento: </strong><?php echo $value[4];?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 reserva_bt">
                            <p class="lead"><strong>Informe: </strong><?php echo $value[2];?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-md-12 persona_espacio"></div>
            </div>


        <?php endforeach;?>
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