<?php
require "bd/update.php";
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];
$rut=$varsesion;

if ($varsesion == null || $varsesion = '') {
    header("Location:login.php");
    die();
}elseif ( $_SESSION['tipo'] == 'ADMINISTRACION'){
    $D="Location:administracion.php";
}elseif ( $_SESSION['tipo'] == 'ROOT'){
    $D ="Location:ROOT.PHP";
}else{
    header("Location:login.php");
    die();
}

$nombre =  strtoupper($_REQUEST['nombre']);
$apellido =  strtoupper($_REQUEST['apellido']);
$cargo =  $_REQUEST['cargo'];
$fecha=  $_REQUEST['fecha_nac'];
$tirulo =  $_REQUEST['titulo'];
$tele= $_REQUEST['telefono'];
$email= $_REQUEST['correo'];
$direcc= $_REQUEST['direc'];

$update = new update();

$update->modiadmin($rut,$nombre,$apellido,$cargo,$fecha,$tirulo,$tele,$email,$direcc);

header($D);
?>