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
    <div class="container-fluid admin-fondo">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center reserva_bt">
                <button type="button" class="btn btn-warning" onclick="return grafica(0)">Dia De Hoy</button>

                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        GENERAL <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a onclick="return grafica(1)">Mes</a></li>
                        <li><a onclick="return grafica(2)">Año</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        KINESIOLOGIA <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a onclick="return grafica(3)">Mes</a></li>
                        <li><a onclick="return grafica(4)">Año</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        OFTAMOLOGIA <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a onclick="return grafica(5)">Mes</a></li>
                        <li><a onclick="return grafica(6)">Año</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        PEDIATRIA <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a onclick="return grafica(7)">Mes</a></li>
                        <li><a onclick="return grafica(8)">Año</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        MATERNAL <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a onclick="return grafica(9)">Mes</a></li>
                        <li><a onclick="return grafica(10)">Año</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        GINECOLOGIA<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a onclick="return grafica(11)">Mes</a></li>
                        <li><a onclick="return grafica(12)">Año</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        DENTAL<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a onclick="return grafica(13)">Mes</a></li>
                        <li><a onclick="return grafica(14)">Año</a></li>
                    </ul>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        MENTAL<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a onclick="return grafica(15)">Mes</a></li>
                        <li><a onclick="return grafica(16)">Año</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row " ">
            <div class="col-md-10 col-md-offset-1 reserva_bt datos_fondo_gra" id="grafica" >
                <?php
                $consulta = new consulta();
                $fecha = date('Y-m-d');
                $ano = $consulta->consultadia($fecha);
                $ki=0;
                foreach ($ano as $key => $value){if ($value[1]=="KINESIOLOGIA"){
                    $ki++;
                }
                }

                $of=0;
                foreach ($ano as $key => $value){
                    if ($value[1]=="OFTAMOLOGIA"){
                        $of++;
                    }
                }


                $pe=0;
                foreach ($ano as $key => $value){
                    if ($value[1]=="PEDIATRIA"){
                        $pe++;
                    }
                }


                $ma=0;
                foreach ($ano as $key => $value){
                    if ($value[1]=="MATERNAL"){
                        $ma++;
                    }
                }


                $gi=0;
                foreach ($ano as $key => $value){
                    if ($value[1]=="GINECOLOGIA"){
                        $gi++;
                    }
                }

                $den=0;
                foreach ($ano as $key => $value){
                    if ($value[1]=="DENTAL"){
                        $den++;
                    }
                }


                $ge=0;
                foreach ($ano as $key => $value){
                    if ($value[1]=="GENERAL"){
                        $ge++;
                    }
                }


                $me=0;
                foreach ($ano as $key => $value){
                    if ($value[1]=="MENTAL"){
                        $me++;
                    }
                }




                echo " <div class='table-responsive ' >
<script type='text/javascript'>
    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

          var data = google.visualization.arrayToDataTable([
                  ['Tipo', 'Cantidad'],
                  ['KINESIOLOGIA', ".$ki."],
                  ['OFTAMOLOGIA',  ".$of."],
                  ['PEDIATRIA',  ".$pe."],
                  ['MATERNAL', ".$ma."],
                  ['DENTAL', ".$den."],
                  ['GENERAL', ".$ge."],
                  ['MENTAL', ".$me."],
                  ['GINECOLOGIA',    ".$gi."]
              ]);

          var options = {
              title: 'cantidad de consultas para hoy'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
 
    <div id='piechart' style='width: 1000px; height: 500px;'></div>
    <div style='height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;'></div>
                    <div style='height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;'></div></div>";



                ?>


            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
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
<script src="js/validar.js"></script>

</body>
</html>