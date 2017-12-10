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

$consulta = new consulta();


$fecha = date('Y-m-d');

$mes = $consulta->consultames($fecha);

$dia = $consulta->consultadia($fecha);

$semana = $consulta->consultasemana($fecha);

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
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script type="text/javascript" src="js/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Especialidades', 'Dia', 'Semana', 'Mes'],
                ['DENTAL', <?php echo $dia,$cantidadtipo['DENTAL'];?>, <?php echo $semana,$cantidadtipo['DENTAL'];?>, <?php echo $mes,$cantidadtipo['DENTAL'];?>],
                ['OFTALMOLOGIA', <?php echo $dia,$cantidadtipo['oft'];?>, <?php echo $semana,$cantidadtipo['oft'];?>, <?php echo $mes,$cantidadtipo['oft'];?>],
                ['SALUD MENTAL', <?php echo $dia,$cantidadtipo['mental'];?>, <?php echo $semana,$cantidadtipo['mental'];?>, <?php echo $mes,$cantidadtipo['mental'];?>],
                ['KINESIOLOGIA', <?php echo $dia,$cantidadtipo['kine'];?>, <?php echo $semana,$cantidadtipo['kine'];?>, <?php echo $mes,$cantidadtipo['kine'];?>],
                ['MEDICINA GENERAL', <?php echo $dia,$cantidadtipo['GENERAL'];?>, <?php echo $semana,$cantidadtipo['GENERAL'];?>, <?php echo $mes,$cantidadtipo['GENERAL'];?>],
                ['PEDIATRIA', <?php echo $dia,$cantidadtipo['ped'];?>, <?php echo $semana,$cantidadtipo['ped'];?>, <?php echo $mes,$cantidadtipo['ped'];?>],
                ['MATERNAL', <?php echo $dia,$cantidadtipo['mate'];?>, <?php echo $semana,$cantidadtipo['mate'];?>, <?php echo $mes,$cantidadtipo['mate'];?>],
                ['GINECOLOGIA', <?php echo $dia,$cantidadtipo['PEDIATRIA'];?>, <?php echo $semana,$cantidadtipo['PEDIATRIA'];?>, <?php echo $mes,$cantidadtipo['PEDIATRIA'];?>]
            ]);

            var options = {
                chart: {
                    title: 'Atenciones',
                    subtitle: '',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
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
                <h2 class="text-center">Grafica</h2>
            </div>
            <div class="col-md-1"></div>


        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo">
                <div class="row">
                    <div class="col-md-12 datos_header">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 admin_dato">


                        <div class="table-responsive" >
                            <div id="columnchart_material" style="width: 1110px; height: 800px;"></div>
                            <div style="height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;"></div>
                            <div style="height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;"></div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
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
<script src="js/bootstrap.js"></script>

</body>
</html>