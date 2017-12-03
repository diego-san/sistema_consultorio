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
$datos=$get->info_root($rut);
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

                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                                google.charts.load('current', {'packages':['bar']});
                                google.charts.setOnLoadCallback(drawStuff);

                                function drawStuff() {
                                    var data = new google.visualization.arrayToDataTable([
                                        ['Move', 'Percentage'],
                                        ["Dental", 44],
                                        ["Oftalmologia", 31],
                                        ["Salud Mental", 12],
                                        ["Kinesiologia", 10],
                                        ['Medicina General', 2],
                                        ['Pediatria', 1]
                                    ]);

                                    var options = {
                                        width: 1090,
                                        legend: { position: 'none' },
                                        chart: {
                                            title: 'Atenciones por dia',
                                            subtitle: '' },
                                        axes: {
                                            x: {
                                                0: { side: 'top', label: ''} // Top x-axis.
                                            }
                                        },
                                        bar: { groupWidth: "90%" }
                                    };

                                    var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                                    // Convert the Classic options to Material options.
                                    chart.draw(data, google.charts.Bar.convertOptions(options));
                                };
                            </script>
                        <div class="table-responsive" >
                            <div id="top_x_div" style="width: 1090px; height: 500px;"></div>
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