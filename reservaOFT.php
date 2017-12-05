<?php
require "bd/consulta.php";
//session---------------------------
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];
$r=$varsesion;

if ($varsesion == null || $varsesion = '' || $_SESSION['tipo'] != 'NORMAL') {
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

//consulta de reserva-------------


function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}


if (isset($_GET['f'])) {
    $fechaini = $_GET['f'];
    if (validateDate($fechaini)!=true){
        $fechaini = date('Y-m-d');
    }
} else{
    $fechaini = date('Y-m-d');
}
$consulta = new consulta();
$seguridadin = $consulta->reservatipo($r,'OFTAMOLOGIA');
if (!empty($seguridadin)){
    header("Location:panelnormal.php");
    die();

}
$fecha=$fechaini;
$fechaconsulta=$fechaini;
$datofecha = array();



?>
<?php
$i=0;
while ($i<5) {
    $dia=$consulta->saber_dia($fecha);
    if ( $dia != "Sabado" and $dia != "Domingo") {



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
                <li class="active"><a href="panelnormal.php">Home</a></li>
                <li><a href="reserva.php">Pedir Consulta</a></li>
                <li><a href="hisotial.php">Historial</a></li>
                <li><a href="cambiarpass.php">Cambiar contraseña</a></li>
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
                <h2 class="text-center">Reservas</h2>
            </div>
            <div class="col-md-1"></div>


        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6 reserva_bt ">
                        <button type="button" class="btn btn-success btn-block" onclick="history.back()"> Atras </button>
                    </div>
                    <div class="col-md-6 reserva_bt">
                        <?php
                        $fechasguientenew = strtotime ( '+1 day' , strtotime ( $datofecha[4] ) ) ;
                        $fechasguientebt = date ( 'Y-m-d' , $fechasguientenew );

                        ?>
                        <a href="reservaOFT.php?f=<?php echo $datofecha[4];?>" type="button" class="btn btn-success btn-block" >Siguente</a>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-center">Hora</td>
                            <td class="text-center"><?php echo $consulta->saber_dia_fecha($datofecha[0]);?></td>
                            <td class="text-center"><?php echo $consulta->saber_dia_fecha($datofecha[1]);?></td>
                            <td class="text-center"><?php echo $consulta->saber_dia_fecha($datofecha[2]);?></td>
                            <td class="text-center"><?php echo $consulta->saber_dia_fecha($datofecha[3]);?></td>
                            <td class="text-center"><?php echo $consulta->saber_dia_fecha($datofecha[4]);?></td>

                        </tr>

                        <?php
                        $fechaActual = "07:30";
                        for ($i=1; $i <=19 ; $i++) {
                            $nuevaFecha = strtotime ( '+30 minute' , strtotime ( $fechaActual ) ) ;
                            $hora = date ( 'H:i' , $nuevaFecha );
                            $fechaActual=$hora;
                            echo "<tr>";
                            echo "<td>".$hora."</td>";
                            for($d=0;$d<5;$d++){
                                $diahora = $datofecha[$d]." ".$hora.":00";
                                $rest = substr($hora,0, -3);
                                $rest2 = substr($hora,3);
                                $horanew= "1".$rest.$rest2;
                                $ano = substr($datofecha[$d],0, -6);
                                $mes = substr($datofecha[$d],5,-3);
                                $dias= substr($datofecha[$d],8);
                                $fechanew= $ano.$mes.$dias;
                                $verifica = $consulta->verificarhora($diahora,'OFTAMOLOGIA');
                                if(empty($verifica)){
                                    echo "<td class=' boton_tabla text-center' onclick='return reserva(" ;
                                    echo  $fechanew;
                                    echo ",".$horanew.",".$r.", 30";
                                    echo ")'>Libre</td>";
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
<script src="js/bootstrap.js"></script>
<script src="js/validar.js"></script>



</body>
</html>