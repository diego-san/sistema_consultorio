<?php
require "bd/update.php";
session_start();
error_reporting(0);
$varsesion=$_SESSION['login'];
$r=$varsesion;

if ($varsesion == null || $varsesion = '' || $_SESSION['tipo'] != 'NORMAL') {
    header("Location:login.php");
    die();
}

$nombre = strtoupper($_REQUEST['nombre']);
$apellido =strtoupper($_REQUEST['apellido']);
$fecha= $_REQUEST['fecha_nac'];
$movi =$_REQUEST['movi'];
$direc=$_REQUEST['direc'];
$ser=$_REQUEST['servicio'];
$ciudad=$_REQUEST['ciudadnac'];
$tele=$_REQUEST['telefono'];


$update = new update();
$update->modiper($r,$nombre,$apellido,$fecha,$movi,$direc,$ser,$ciudad,$tele);

header("Location:panelnormal.php");


?>