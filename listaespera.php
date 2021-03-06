<?php
require "bd/consulta.php";
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];
$rut=$varsesion;

if ($varsesion == null || $varsesion = '' || $_SESSION['tipo'] != 'ADMINISTRACION') {
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

$get = new consulta();

$lista= $get->esperalist();

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
<main>
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-10 col-md-offset-1 admin_tirulo">
                <h2 class="text-center">Lista De Espera</h2>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row espaciolista">
            <div class="col-md-10 col-md-offset-1 admin_tirulo">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr  class="info">
                            <th>ID</th>
                            <th>Rut</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th>Ficha</th>
                        </tr>
                        
                        <?php foreach ($lista as $key => $value):?>
                            <tr>
                                <td><?php echo $value[3];?></td>
                                <td><?php echo $value[0];?></td>
                                <td><?php echo $value[1];?></td>
                                <td><?php echo $value[2];?></td>
                                <td class="text-center"><a type="button" class="btn btn-primary" href="personainfo.php?r=<?php echo $value[0];?>">Ficha</a></td>
                            </tr>
                            
                        <?php endforeach;?>
                    </table>

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