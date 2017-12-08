<?php

require_once "bd/consulta.php";
if (isset($_GET['r']) && is_numeric($_GET['r'])) {
    $rut = (int) $_GET['r'];
} else{



}
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];


if ($_SESSION['tipo'] == 'NORMAL' || $_SESSION['tipo'] == 'ADMINISTRACION' || $_SESSION['tipo'] == 'CLINICA' ) {

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

//consultas

$consulta = new consulta();
$datos= $consulta->panelnormal($rut);
$histo = $consulta->historial($rut);

$cantidadtipo = array("GENERAL"=>0,"DENTAL"=>0,"oft"=>0,"mental"=>0,"ped"=>0,"kine"=>0,"mate"=>0,"gine"=>0);

foreach ($histo as $key => $value){

    if($value[3]=="GENERAL"){
        $cantidadtipo['GENERAL']++;
    }elseif ($value[3]=="OFTAMOLOGIA"){
        $cantidadtipo['oft']++;
    }elseif ($value[3]=="MENTAL"){
        $cantidadtipo['mental']++;
    }elseif ($value[3]=="PEDIATRIA"){
        $cantidadtipo['ped']++;
    }elseif ($value[3]=="KINESIOLOGIA"){
        $cantidadtipo['kine']++;
    }elseif ($value[3]=="MATERNAL"){
        $cantidadtipo['mate']++;
    }elseif ($value[3]=="GINECOLOGIA"){
        $cantidadtipo['gine']++;
    }elseif ($value[3]=="DENTAL"){
        $cantidadtipo['DENTAL']++;
    }

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
    <script type="text/javascript" src="js/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Consultas', 'Cantidad'],
                ['Dental',      <?php echo $cantidadtipo['DENTAL'];?>],
                ['Oftalmologia',       <?php echo $cantidadtipo['oft'];?>],
                ['Salud Mental',   <?php echo $cantidadtipo['mental'];?>],
                ['Pediatria',  <?php echo $cantidadtipo['ped'];?>],
                ['Kinesiologia',     <?php echo $cantidadtipo['kine'];?>],
                ['Medicina General',  <?php echo $cantidadtipo['GENERAL'];?>],
                ['Maternal',   <?php echo $cantidadtipo['mate'];?>],
                ['Ginecologia',   <?php echo $cantidadtipo['gine'];?>]
            ]);

            var options = {
                title: 'Cantidad de consultas',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
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
                    <li><a href="#">Busqueda Paciente</a></li>
                    <li><a href="resetp.php">Restablecer Contraseña Persona</a></li>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
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
                        <p class="lead"> <strong>Nombre: </strong><?php echo $datos[0][3]." ".$datos[0][4];?></p>
                        <p class="lead"> <strong>Rut: </strong><?php echo $datos[0][0]."-".$datos[0][1];?></p>
                        <p class="lead"> <strong>Numero de Ficha: </strong><?php echo $datos[0][2];?></p>
                        <p class="lead"> <strong>Fecha de nacimiento: </strong><?php echo $datos[0][5];?></p>
                        <p class="lead"> <strong>Numero de telefono: </strong><?php echo $datos[0][10];?></p>
                    </div>
                    <div class="col-md-6 admin_dato">
                        <?php if ($datos[0][6]=='M'):?>
                            <p class="lead"> <strong>Genero: </strong>Masculino</p>
                        <?php else:?>
                            <p class="lead"> <strong>Genero: </strong>Femenino</p>
                        <?php endif;?>
                        <p class="lead"> <strong>Servicio de Salud: </strong><?php echo $datos[0][8];?></p>
                        <p class="lead"> <strong>Ciudad de nacimiento: </strong><?php echo $datos[0][9];?></p>
                        <p class="lead"> <strong>Direccion: </strong><?php echo $datos[0][7];?></p>
                        <p class="lead"> <strong>Movilizacion: </strong><?php echo $datos[0][13];?></p>
                        <p><a type="button" class="btn btn-primary btn-lg" href="histoperonaca.php?r=<?php echo$datos[0][0];?> ">Ver Historial</a>
                            <?php if($_SESSION['tipo'] == 'CLINICA'):?>
                            <a type="button" class="btn btn-primary btn-lg" href="in_historial.php?r=<?php echo$datos[0][0];?> ">Ingresar Consulta</a>
                            <?php endif;?>
                        </p>


                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo ">

                <div class="table-responsive " >
                    <div id="piechart_3d" style="width: 1090px; height: 500px;"></div>
                    <div style="height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;"></div>
                    <div style="height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;"></div>

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