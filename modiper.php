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

$consulta = new consulta();
$datos= $consulta->panelnormal($r);


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>CESFAM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">



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
    <div class="container-fluid in_fondo">
        <div class="row ">
            <div class="col-md-10 col-md-offset-1 admin_tirulo">
                <h2 class="text-center">Modificar</h2>
            </div>
            <div class="col-md-1"></div>


        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row ">
                    <form action="procemodi.php" method="get" >
                        <div class="col-md-6 in_paciente_form">
                            <div class="form-group">
                                <label for="name">Nombre: </label>
                                <input type="text" name="nombre" required id="name" minlength="1" class="form-control" value="<?php echo $datos[0][3];?>">
                                <label for="ape">Apellido: </label>
                                <input type="text" name="apellido" required id="ape" minlength="1" class="form-control" value="<?php echo $datos[0][4];?>">
                                <label for="fechanac" class=" control-label">Fehca de Nacimiento:</label>
                                <div class="input-group date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" >
                                    <input class="form-control" size="16" type="text" value="<?php echo $datos[0][5];?>" readonly name="fecha_nac" >
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <input type="hidden" id="fechanac" value="" />



                                <label for="mo">Movilizacion:</label>
                                <select class="form-control" name="movi" id="mo">
                                    <option value="NO">NO</option>
                                    <option value="SI">SI</option>
                                </select>


                            </div>
                        </div>
                        <div class="col-md-6 in_paciente_form">
                            <div class="form-group">
                                <label for="dir">Direccion: </label>
                                <input type="text" name="direc" required id="dir" minlength="1" class="form-control" value="<?php echo $datos[0][7];?>">
                                <label for="ser">Servicio salub: </label>
                                <input type="text" name="servicio" required id="ser" minlength="1" class="form-control" value="<?php echo $datos[0][8];?>">
                                <label for="ciu">Ciudad de nacimiento: </label>
                                <input type="text" name="ciudadnac" required id="ciu" minlength="1" class="form-control" value="<?php echo $datos[0][9];?>">
                                <label for="tele">Numero de telefono: </label>
                                <input type="tel" name="telefono" required id="tele" minlength="8" maxlength="11" class="form-control" pattern="[0-9]{8,11}"title="Solo numeros" value="<?php echo $datos[0][10];?>">

                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 in_mensaje">
                <?php if ($mensaje== 1):?>
                    <div class="alert alert-success" role="alert">
                        Persona ingresada correctamente.
                    </div>
                <?php elseif ($mensaje== 2):?>
                    <div class="alert alert-danger" role="alert">
                        Persona ya esta ingresada.
                    </div>
                <?php elseif ($mensaje== 3):?>
                    <div class="alert alert-danger" role="alert">
                        Rut Invalido.
                    </div>
                <?php endif;?>
            </div>
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