<?php
require_once "bd/consulta.php";
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




//consultas
echo $varsesion;
$consulta = new consulta();
$datos= $consulta->panelnormal($r);
$rese=$consulta->reserva($r);
//tipo de genero
$_SESSION['GE'] =$datos[0][6];

$histo = $consulta->historial($r);

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
    <script src="js/validar.js"></script>
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
                <li><a href="modiper.php">Modificar Datos</a></li>
                <li><a href="cambiarpass.php">Cambiar contraseña</a></li>
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

                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <?php if($cantidadtipo['GENERAL']>0 || $cantidadtipo['oft'] >0 ||  $cantidadtipo['mental'] >0 ||  $cantidadtipo['ped'] >0 ||  $cantidadtipo['kine'] >0 ||  $cantidadtipo['mate'] >0 ||  $cantidadtipo['gine'] >0 ||  $cantidadtipo['DENTAL'] >0 ):?>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo_gra ">
                <div class="row">
                    <div class="col-md-12 datos_header">
                        <p class="text_datos text-center">Grafica</p>
                    </div>
                </div>
                <div class="table-responsive " >
                    <div id="piechart_3d" style="wi
                    dth: 1090px; height: 400px;"></div>
                    <div style="height:5px; width:5px; overflow-x:hidden; overflow-y: scroll; padding-bottom:10px;"></div>
                    <div style="height:5px; width:5px; overflow-x:scroll ; overflow-y: hidden; padding-bottom:10px;"></div>

                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <?php endif;?>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 datos_fondo">
                <div class="row">
                    <div class="col-md-12 datos_header">
                        <p class="text_datos text-center">Reserva</p>
                    </div>
                </div>
                <div class="row">

                       <?php if (!empty($rese)):?>
                           <?php foreach ( $rese as $key => $value):?>
                            <?php if ($value[3]=="PENDIENTE"):?>
                           <div class="col-md-8 reserva ">
                               <p class="lead"> <strong>Fecha de consulta: </strong><?php echo $value[1];?><strong>  Tipo: </strong><?php echo $value[2];?> </p>
                                <p class="lead"><strong>Estado: </strong><?php echo $value[3];?></p>
                           </div>
                           <div class="col-md-4 reserva bot ">
                               <button type="button" class="btn btn-danger btn-block " onclick="return seguro(<?php echo $value[4];?>,<?php echo $value[0];?>)">Eliminar</button>
                           </div>
                            <?php else:?>
                                   <div class="col-md-8 reserva ">
                                       <p class="lead"> <strong>Fecha de consulta: </strong><?php echo $value[1];?><strong>  Tipo: </strong><?php echo $value[2];?> </p>
                                       <p class="lead"><strong>Estado: </strong><?php echo $value[3];?></p>
                                   </div>
                                   <div class="col-md-4 reserva bot ">
                                       <!-- Small modal -->
                                       <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#<?php echo $value[4];?>">Ver Codigo QR</button>
                                       <button type="button" class="btn btn-danger btn-block" onclick="return seguro(<?php echo $value[4];?>,<?php echo $value[0];?>)">Eliminar</button>


                                       <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="<?php echo $value[4];?>">
                                           <div class="modal-dialog modal-sm" role="document">
                                               <div class="modal-content">
                                                   <div class="row">
                                                      <div class="col-md-12 text-center reserva_bt">
                                                          <img src="img/<?php echo $value[5];?>"  class="img-rounded">
                                                          <br>
                                                          <a href="pdf/qr.php?d=<?php echo $value[4];?>" type="button" target="_blank" class="btn btn-success">Descargar</a>
                                                      </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                               <?php endif;?>
                           <?php endforeach;?>
                       <?php else:?>
                           <div class="col-md-12 reserva  ">
                           <h2 class="text-cente reserva ">No hay Reserva</h2>
                           </div>
                       <?php endif;?>

                   </div>
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
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>

<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'es',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>
</body>
</html>
