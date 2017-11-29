<?php
require_once "bd/consulta.php";
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];
$rut=$varsesion;

if ($varsesion == null || $varsesion = '' || $_SESSION['tipo'] != 'CLINICA') {
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
$datos=$get->info_clinia($rut);
$tipo=$datos[0]['5'];
$pacientedia=$get->pacientedia($tipo);
$nrop = count($pacientedia);




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
                <li class="active"><a href="medico.php">Home</a></li>
                <li><a href="in_historial.php">Ingresar Historial</a></li>
                <li><a href="cambiarpass.php">Cambiar Contraseña</a></li>
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
                <h2 class="text-center">Informacion</h2>
            </div>
            <div class="col-md-1"></div>


        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo">
                <div class="row">
                    <div class="col-md-12 datos_header">
                        <p class="text_datos text-center">Informacion personal</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 admin_dato">
                        <p class="lead"> <strong>Nombre: </strong><?php echo $datos[0]['2']." ".$datos[0]['4'];?></p>
                        <p class="lead"> <strong>Rut: </strong><?php echo $datos[0]['0']."-".$datos[0]['1'];?></p>
                        <p class="lead"> <strong>Correo: </strong><?php echo $datos[0]['7']?></p>
                        <p class="lead"> <strong>Fecha de nacimiento: </strong><?php echo $datos[0]['9'];?></p>
                    </div>
                    <div class="col-md-6 admin_dato">
                        <p class="lead"> <strong>Tipo: </strong><?php echo $datos[0]['5'];?></p>
                        <p class="lead"> <strong>Titulo: </strong><?php echo $datos[0]['3'];?></p>
                        <p class="lead"> <strong>Telefono: </strong><?php echo $datos[0]['6'];?></p>
                        <p class="lead"> <strong>Direccion: </strong><?php echo $datos[0]['8'];?> </p>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo">
                <div class="row">
                    <div class="col-md-12 datos_header">
                        <p class="text_datos text-center">Pacientes del Dia</p>
                    </div>
                </div>

                    <?php
                    for ($i=0;$i < $nrop ; $i++){
                        $datospacientedia = $get->panelnormal($pacientedia[$i][0]);
                        echo "<div class='row'>";
                        echo "<div class='col-md-8 admin_dato'>";
                       echo " <p class='lead text'> <strong>Nombre: </strong>".$datospacientedia[0]['nombre_persona']." "
                           .$datospacientedia[0]['apellido_persona']."<strong> Rut: </strong>".$datospacientedia[0]['0']."-".$datospacientedia[0]['1']
                          ."<strong>Fecha: </strong>".$pacientedia[$i]['fecha']."</p>";

                        echo "</div>";

                        echo "<div class='col-md-4 admin_dato'>";
                        echo "<a type='button' class='btn btn-primary btn-lg btn-block' href='in_historial.php?r=".$datospacientedia[0]['0']."'>Ingresar Consulta</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>


            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
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