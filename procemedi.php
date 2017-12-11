<?php
require_once "bd/update.php";
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];
$rut=$varsesion;

if ($varsesion == null || $varsesion = '' || $_SESSION['tipo'] != 'CLINICA') {
    header("Location:login.php");
    die();
}

$nombre = strtoupper($_REQUEST['nombre']);
$apellido=strtoupper($_REQUEST['apellido']);
$tirulo =$_REQUEST['titulo'];
$fecha=$_REQUEST['fecha_nac'];
$tele=$_REQUEST['telefono'];
$correo=$_REQUEST['correo'];
$direcc=$_REQUEST['direc'];

$update= new update();
$update->modimedi($rut,$nombre,$apellido,$tirulo,$fecha,$tele,$correo,$direcc);

header("Location:medico.php");
?>