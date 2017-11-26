<?php
require "bd/consulta.php";

if (isset($_GET['f'])) {
    $fechaini = $_GET['f'];
} else{
    $fechaini = date('Y-m-d');
}
$consulta = new consulta();
$fecha=$fechaini;
$fechaconsulta=$fechaini;

$datofecha = array();



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
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="close.php"><span class="glyphicon glyphicon-log-in"></span>Salir</a></li>
            </ul>
        </div>
    </div>
</nav>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td>Hora</td>

                        <?php
                        $i=0;
                        while ($i<5) {
                                $dia=$consulta->saber_dia($fecha);
                            if ( $dia != "Sabado" and $dia != "Domingo") {
                                $date = $consulta->reservacal($fecha,'GENERAL');

                                echo "<th>".$fecha."</th>";
                                $datofecha[]= $fecha;
                                //avanza al siguiente dia
                                $nuevaFecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
                                $unoDiasMas = date ( 'Y-m-d' , $nuevaFecha );
                                $fecha=$unoDiasMas;


                                $i++;
                            } else {
                                $nuevaFecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
                                $unoDiasMas = date ( 'Y-m-d' , $nuevaFecha );
                                $fecha=$unoDiasMas;


                            }
                        }


                        ?>
                        </tr>

                        <?php
                        $fechaActual = "08:00";
                        for ($i=0; $i <35 ; $i++) {
                            $nuevaFecha = strtotime ( '+15 minute' , strtotime ( $fechaActual ) ) ;
                            $hora = date ( 'H:i' , $nuevaFecha );
                            $fechaActual=$hora;
                            echo "<tr>";
                                    echo "<td>".$hora."</td>";
                            for($d=0;$d<5;$d++){
                                $diahora = $datofecha[$d]." ".$hora.":00";
                                $verifica = $consulta->verificarhora($diahora,'GENERAL');
                                if(empty($verifica)){
                                    echo "<td class=' boton_tabla text-center'>Libre</td>" ;
                                }else{
                                    echo "<td class='warning text-center'>Resevado</td>" ;

                                }

                            }
                            echo "</tr>";
                        }

                        ?>
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