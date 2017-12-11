<?php
require_once "bd/consulta.php";
require_once  "bd/delete.php";
require_once "bd/insertar.php";
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];
$rut=$varsesion;



if ($varsesion == null || $varsesion = '' || $_SESSION['tipo'] != 'CLINICA') {
    header("Location:login.php");
    die();
}
//rut ----
if (isset($_GET['r']) && is_numeric($_GET['r'])) {
    $valuesrut = $_GET['r'];
} else{
    $valuesrut="";
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

//info clinica
$get = new consulta();
$datos=$get->info_clinia($rut);
$mensaje = 0;
if(isset($_REQUEST['rut'])){
    $rutpersona = $_REQUEST['rut'];
    $verifica= $get->panelnormal($rutpersona);
    if (!empty($verifica)){
        $del = new delete();
        $del->deleteesperaconsulta($rutpersona,$datos[0][5]);
        $del->deletereservaconsulta($rutpersona,$datos[0][5]);
        $fechaini = date('Y-m-d H:i:s');
        $insert = new insertar();
        $insert->in_historial($rutpersona,$datos[0][0],$datos[0][5],$_REQUEST['histo'],$fechaini);
        header("Location:medico.php");


    }else{
        $mensaje = 1;
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
                <li class="active"><a href="medico.php">Home</a></li>
                <li><a href="in_historial.php">Ingresar Historial</a></li>
                <li><a href="buscarpe.php">Buscar Persona</a></li>
                <li><a href="datoscli.php">Mis Datos</a></li>
                <li><a href="cambiarpass.php">Cambiar Contraseña</a></li>
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
                <h2 class="text-center">Ingresar Historial</h2>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="in_historial.php" method="get">
                    <div class="form-group">
                    <label for="ru">Rut: </label>
                    <input type="text" name="rut" required id="ru" minlength="7" maxlength="8" class="form-control" pattern="[0-9]{7,8}" value="<?php echo $valuesrut;?>">
                    <label for="his">Informer</label>
                    <textarea name="histo" id="his" class="form-control" rows="3" required minlength="10" maxlength="2000"></textarea>
                    </div>
                    <input type="hidden" name="rutclinica" value="<?php echo $rut;?>">
                    <input type="hidden" name="tipo" value="<?php echo $datos[0][5]; ?>">

                    <input type="submit" class="btn btn-primary btn-lg btn-block">
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-12 persona_espacio"></div>
        </div>
        <?php if($mensaje== 1):?>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 ">
                    <div class="alert alert-danger ">
                        <strong>Error! </strong>Perona No Registrada
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12 in_historial-espacio"></div>
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