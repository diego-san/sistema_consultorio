<?php
require_once "bd/insertar.php";
require_once "bd/consulta.php";
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];
$mensaje = 0;

if ($varsesion == null || $varsesion = '' || $_SESSION['tipo'] != 'ROOT') {
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
if (isset($_REQUEST['rut'])){
    $rut= $_REQUEST['rut'];
    $busca= new consulta();
    if (strtoupper(substr($rut,-1))== $busca->verifica_rut_real($rut)){
    if(empty($busca->compruba(substr($rut, 0, -1)))){
        $nombre = strtoupper( trim($_REQUEST['nombre']));
        $apellido = strtoupper( trim($_REQUEST['apellido']));
        $cargo=$_REQUEST['cargo'];
        $fecha=$_REQUEST['fecha_nac'];
        $titulo=$_REQUEST['titulo'];
        $telefono=$_REQUEST['telefono'];
        $correo=$_REQUEST['correo'];
        $direc=$_REQUEST['direc'];
        $per= $_REQUEST['per'];
        $in = new insertar();
        $rt=substr($rut, 0, -1);
        $in->ingresaruser(substr($rut, 0, -1),$per);
        $in->in_admin($rt,$nombre,$apellido,$cargo,$fecha,$titulo,$telefono,$correo,$direc);

        $mensaje = 1;
    }else{
        $mensaje = 2;
    }}else{
        $mensaje = 3;
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
                <li class="active"><a href="root.php">Home</a></li>
                <li><a href="in_administracion.php">Ingresar administracion</a></li>
                <li><a href="in_clinica.php">Ingresar Clinica</a></li>
                <li><a href="lista.php">Lista</a></li>
                <li><a href="modiadmin.php">Modificar Mis Datos</a></li>
                <li><a href="resetroot.php">Restablecer  Contraseña</a></li>
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
                <h2 class="text-center">Registrar Adminsitracion</h2>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1" >
                <form action="in_administracion.php " method="get">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="name">Nombre: </label>
                            <input type="text" name="nombre" required id="name" minlength="1" class="form-control">
                            <label for="ap">Apellido: </label>
                            <input type="text" name="apellido" required id="ap" minlength="1" class="form-control">
                            <label for="ru">Rut: </label>
                            <input type="text" name="rut" required id="ru" minlength="8" maxlength="9" class="form-control" >
                            <label for="ca">Cargo: </label>
                            <input type="text" name="cargo" required id="ca" minlength="1" class="form-control">
                            <label for="fechanac" class=" control-label">Fecha de Nacimiento:</label>
                            <div class="input-group date form_date " data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" type="text" value="" readonly name="fecha_nac">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            <input type="hidden" id="fechanac" value="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="ti">Titulo: </label>
                            <input type="text" name="titulo" required id="ti" minlength="1" class="form-control">
                            <label for="tele">Numero de telefono: </label>
                            <input type="tel" name="telefono" required id="tele" minlength="8" maxlength="11" class="form-control" pattern="[0-9]{8,11}"title="Solo numeros">
                            <label for="mail">Email</label>
                            <input type="email" class="form-control" id="mail" name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            <label for="dir">Direccion: </label>
                            <input type="text" name="direc" required id="dir" minlength="1" class="form-control">
                                <label for="mo">Permiso:</label>
                                <select class="form-control" name="per" id="mo">
                                    <option value="ADMINISTRACION">ADMINISTRACION</option>
                                    <option value="ROOT">ROOT</option>


                                </select><br>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
                            </div>
                        </div>
                    </div>
                </form>
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