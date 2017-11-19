<?php
require_once "bd/insertar.php";
require_once "bd/consulta.php";
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];
$mensaje = 0;
if ($varsesion == null || $varsesion = '' || $_SESSION['tipo'] != 'ADMINISTRACION') {
    header("Location:login.php");
    die();
}
if(isset($_REQUEST['rut'])){
    $rut=$_REQUEST['rut'];

    $busca= new consulta();

   if (empty($busca->compruba($rut))) {
       $nombre = $_REQUEST['nombre'];
       $apellido = $_REQUEST['apellido'];
       $nroficha = $_REQUEST['ficha'];
       $fecha_nac = $_REQUEST['fecha_nac'];
       $genero = $_REQUEST['genero'];
       $direcc = $_REQUEST['direc'];
       $servicio = $_REQUEST['servicio'];
       $ciudadnac = $_REQUEST['ciudadnac'];
       $telefono = $_REQUEST['telefono'];
       $sector = $_REQUEST['sector'];
       $esta = $_REQUEST['estable'];
       $movi = $_REQUEST['movi'];

       $ingreso = new insertar();
       $ingreso->ingresaruser($rut,'NORMAL');
       $ingreso->insertar_persona($nombre, $apellido, $rut, $nroficha, $fecha_nac, $genero, $direcc, $servicio, $ciudadnac, $telefono, $sector, $esta, $movi);
       $mensaje = 1;
   }else{
        $mensaje = 2;
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
                <li class="active"><a href="administracion.php">Home</a></li>
                <li><a href="in_paciente.php">Ingresar Pasiente</a></li>
                <li><a href="#">busqueda Paciente</a></li>
                <li><a href="#">Grafica</a></li>
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
                <h2 class="text-center">Registrar persona</h2>
            </div>
            <div class="col-md-1"></div>


        </div>
       <div class="row">
           <div class="col-md-10 col-md-offset-1">
               <div class="row ">
                   <form action="in_paciente.php" method="get" >
                       <div class="col-md-6 in_paciente_form">
                           <div class="form-group">
                               <label for="name">Nombre: </label>
                               <input type="text" name="nombre" required id="name" minlength="1" class="form-control">
                               <label for="ape">Apellido: </label>
                               <input type="text" name="apellido" required id="ape" minlength="1" class="form-control">
                               <label for="ru">Rut: </label>
                               <input type="text" name="rut" required id="ru" minlength="7" maxlength="8" class="form-control" pattern="[0-9]{7,8}">
                               <label for="nro">Numero ficha: </label>
                               <input type="text" name="ficha" required id="nro" minlength="1" class="form-control" pattern="[0-9]{1,11}"title="Solo numeros">

                               <label for="fechanac" class=" control-label">Fehca de Nacimiento:</label>
                               <div class="input-group date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                   <input class="form-control" size="16" type="text" value="" readonly name="fecha_nac">
                                   <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                   <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                               </div>
                               <input type="hidden" id="fechanac" value="" />

                               <label for="gene">Genero:</label>
                               <select class="form-control" name="genero" id="gene">
                                   <option value="M">Masculino</option>
                                   <option value="F">Femenino</option>

                               </select>

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
                               <input type="text" name="direc" required id="dir" minlength="1" class="form-control">
                               <label for="ser">Servicio salub: </label>
                               <input type="text" name="servicio" required id="ser" minlength="1" class="form-control">
                               <label for="ciu">Ciudad de nacimiento: </label>
                               <input type="text" name="ciudadnac" required id="ciu" minlength="1" class="form-control">
                               <label for="tele">Numero de telefono: </label>
                               <input type="tel" name="telefono" required id="tele" minlength="8" maxlength="11" class="form-control" pattern="[0-9]{8,11}"title="Solo numeros">
                               <label for="sec">Sector: </label>
                               <input type="text" name="sector" required id="sec" minlength="1" class="form-control">
                               <label for="esta">Establecimiento: </label>
                               <input type="text" name="estable" required id="esta" minlength="1" class="form-control">
                           </div>
                           <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
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