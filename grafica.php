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
$ano = $consulta->consultaano($fecha);


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
                ['Tipo', 'Cantidad de Reserva'],
                <?php
                foreach ($mes as $key => $value){
                    if ($value[1]=="KINESIOLOGIA"){
                        echo " ['KINESIOLOGIA',".$value[0]."  ],";
                    }
                }
                ?>
                <?php
                foreach ($mes as $key => $value){
                    if ($value[1]=="OFTAMOLOGIA"){
                        echo " ['OFTAMOLOGIA',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($mes as $key => $value){
                    if ($value[1]=="PEDIATRIA"){
                        echo " ['PEDIATRIA',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($mes as $key => $value){
                    if ($value[1]=="MATERNAL"){
                        echo " ['MATERNAL',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($mes as $key => $value){
                    if ($value[1]=="GINECOLOGIA"){
                        echo " ['GINECOLOGIA',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($mes as $key => $value){
                    if ($value[1]=="DENTAL"){
                        echo " ['DENTAL',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($mes as $key => $value){
                    if ($value[1]=="GENERAL"){
                        echo " ['GENERAL',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($mes as $key => $value){
                    if ($value[1]=="MENTAL"){
                        echo " ['MENTAL',".$value[0]."  ],";
                    }
                }
                ?>







            ]);

            var options = {
                chart: {
                    title: 'Grafica De reservas por Mes',

                }
            };

            var chart = new google.charts.Bar(document.getElementById('mes'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Tipo', 'Cantidad de Reserva'],
                <?php
                foreach ($dia as $key => $value){
                    if ($value[1]=="KINESIOLOGIA"){
                        echo " ['KINESIOLOGIA',".$value[0]."  ],";
                    }
                }
                ?>
                <?php
                foreach ($dia as $key => $value){
                    if ($value[1]=="OFTAMOLOGIA"){
                        echo " ['OFTAMOLOGIA',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($dia as $key => $value){
                    if ($value[1]=="PEDIATRIA"){
                        echo " ['PEDIATRIA',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($dia as $key => $value){
                    if ($value[1]=="MATERNAL"){
                        echo " ['MATERNAL',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($dia as $key => $value){
                    if ($value[1]=="GINECOLOGIA"){
                        echo " ['GINECOLOGIA',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($dia as $key => $value){
                    if ($value[1]=="DENTAL"){
                        echo " ['DENTAL',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($dia as $key => $value){
                    if ($value[1]=="GENERAL"){
                        echo " ['GENERAL',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($dia as $key => $value){
                    if ($value[1]=="MENTAL"){
                        echo " ['MENTAL',".$value[0]."  ],";
                    }
                }
                ?>







            ]);

            var options = {
                chart: {
                    title: 'Grafica De reservas DIA',

                }
            };

            var chart = new google.charts.Bar(document.getElementById('dia'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Tipo', 'Cantidad de Reserva'],
                <?php
                foreach ($ano as $key => $value){
                    if ($value[1]=="KINESIOLOGIA"){
                        echo " ['KINESIOLOGIA',".$value[0]."  ],";
                    }
                }
                ?>
                <?php
                foreach ($ano as $key => $value){
                    if ($value[1]=="OFTAMOLOGIA"){
                        echo " ['OFTAMOLOGIA',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($ano as $key => $value){
                    if ($value[1]=="PEDIATRIA"){
                        echo " ['PEDIATRIA',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($ano as $key => $value){
                    if ($value[1]=="MATERNAL"){
                        echo " ['MATERNAL',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($ano as $key => $value){
                    if ($value[1]=="GINECOLOGIA"){
                        echo " ['GINECOLOGIA',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($ano as $key => $value){
                    if ($value[1]=="DENTAL"){
                        echo " ['DENTAL',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($ano as $key => $value){
                    if ($value[1]=="GENERAL"){
                        echo " ['GENERAL',".$value[0]."  ],";
                    }
                }
                ?>

                <?php
                foreach ($ano as $key => $value){
                    if ($value[1]=="MENTAL"){
                        echo " ['MENTAL',".$value[0]."  ],";
                    }
                }
                ?>







            ]);

            var options = {
                chart: {
                    title: 'Grafica De reservas Por Año',

                }
            };

            var chart = new google.charts.Bar(document.getElementById('ano'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

</head>
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
                <li><a href="modiadmin.php">Modificar Mis Datos</a></li>
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
                <h2 class="text-center">Grafica</h2>
            </div>
            <div class="col-md-1"></div>


        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo">

                <div class="row">
                    <div class="col-md-12 admin_dato">


                        <div class="table-responsive" >
                            <div id="dia" style="width: 1000px; height: 500px;"></div>
                            <div style="height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;"></div>
                            <div style="height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;"></div>
                                
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-12 admin_dato">


                        <div class="table-responsive" >
                            <div id="mes" style="width: 1000px; height: 500px;"></div>
                            <div style="height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;"></div>
                            <div style="height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;"></div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 admin_dato">


                        <div class="table-responsive" >
                            <div id="ano" style="width: 1000px; height: 500px;"></div>
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