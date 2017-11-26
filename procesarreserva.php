<?php

require "bd/insertar.php";

    $insertar = new insertar();


if($_GET['ti']==10) {
    $rest = substr($_GET['hor'], 1, -2);
    $rest2 = substr($_GET['hor'], 3);
    //genera hora
    $r = $rest . ":" . $rest2;
    //tipo
    $tipo = "GENERAL";
    //genera fecha
    $ano = substr($_GET['day'],0, -4);
    $mes = substr($_GET['day'],4,-2);
    $dias= substr($_GET['day'],6);
    $fechanew= $ano."-".$mes."-".$dias;

    $fecha= $fechanew." ".$r;
    $rut = $_GET['rt'];

   $insertar->in_reserva($rut,$fecha,$tipo);


}elseif ($_GET['ti']==20){
    $rest = substr($_GET['hor'], 1, -2);
    $rest2 = substr($_GET['hor'], 3);
    //genera hora
    $r = $rest . ":" . $rest2;
    //tipo
    $tipo = "DENTAL";
    //genera fecha
    $ano = substr($_GET['day'],0, -4);
    $mes = substr($_GET['day'],4,-2);
    $dias= substr($_GET['day'],6);
    $fechanew= $ano."-".$mes."-".$dias;

    $fecha= $fechanew." ".$r;
    $rut = $_GET['rt'];

    $insertar->in_reserva($rut,$fecha,$tipo);

}elseif ($_GET['ti']==30){
    $rest = substr($_GET['hor'], 1, -2);
    $rest2 = substr($_GET['hor'], 3);
    //genera hora
    $r = $rest . ":" . $rest2;
    //tipo
    $tipo = "OFTAMOLOGIA";
    //genera fecha
    $ano = substr($_GET['day'],0, -4);
    $mes = substr($_GET['day'],4,-2);
    $dias= substr($_GET['day'],6);
    $fechanew= $ano."-".$mes."-".$dias;

    $fecha= $fechanew." ".$r;
    $rut = $_GET['rt'];

    $insertar->in_reserva($rut,$fecha,$tipo);

}elseif ($_GET['ti']==40){
    $rest = substr($_GET['hor'], 1, -2);
    $rest2 = substr($_GET['hor'], 3);
    //genera hora
    $r = $rest . ":" . $rest2;
    //tipo
    $tipo = "MENTAL";
    //genera fecha
    $ano = substr($_GET['day'],0, -4);
    $mes = substr($_GET['day'],4,-2);
    $dias= substr($_GET['day'],6);
    $fechanew= $ano."-".$mes."-".$dias;

    $fecha= $fechanew." ".$r;
    $rut = $_GET['rt'];

    $insertar->in_reserva($rut,$fecha,$tipo);

}elseif ($_GET['ti']==50){
    $rest = substr($_GET['hor'], 1, -2);
    $rest2 = substr($_GET['hor'], 3);
    //genera hora
    $r = $rest . ":" . $rest2;
    //tipo
    $tipo = "PEDIATRIA";
    //genera fecha
    $ano = substr($_GET['day'],0, -4);
    $mes = substr($_GET['day'],4,-2);
    $dias= substr($_GET['day'],6);
    $fechanew= $ano."-".$mes."-".$dias;

    $fecha= $fechanew." ".$r;
    $rut = $_GET['rt'];

    $insertar->in_reserva($rut,$fecha,$tipo);

}elseif ($_GET['ti']==60){
    $rest = substr($_GET['hor'], 1, -2);
    $rest2 = substr($_GET['hor'], 3);
    //genera hora
    $r = $rest . ":" . $rest2;
    //tipo
    $tipo = "KINESIOLOGIA";
    //genera fecha
    $ano = substr($_GET['day'],0, -4);
    $mes = substr($_GET['day'],4,-2);
    $dias= substr($_GET['day'],6);
    $fechanew= $ano."-".$mes."-".$dias;

    $fecha= $fechanew." ".$r;
    $rut = $_GET['rt'];

    $insertar->in_reserva($rut,$fecha,$tipo);

}elseif ($_GET['ti']==70){
    $rest = substr($_GET['hor'], 1, -2);
    $rest2 = substr($_GET['hor'], 3);
    //genera hora
    $r = $rest . ":" . $rest2;
    //tipo
    $tipo = "MATERNAL";
    //genera fecha
    $ano = substr($_GET['day'],0, -4);
    $mes = substr($_GET['day'],4,-2);
    $dias= substr($_GET['day'],6);
    $fechanew= $ano."-".$mes."-".$dias;

    $fecha= $fechanew." ".$r;
    $rut = $_GET['rt'];

    $insertar->in_reserva($rut,$fecha,$tipo);


}elseif ($_GET['ti']==80){
    $rest = substr($_GET['hor'], 1, -2);
    $rest2 = substr($_GET['hor'], 3);
    //genera hora
    $r = $rest . ":" . $rest2;
    //tipo
    $tipo = "GINECOLOGIA";
    //genera fecha
    $ano = substr($_GET['day'],0, -4);
    $mes = substr($_GET['day'],4,-2);
    $dias= substr($_GET['day'],6);
    $fechanew= $ano."-".$mes."-".$dias;

    $fecha= $fechanew." ".$r;
    $rut = $_GET['rt'];

    $insertar->in_reserva($rut,$fecha,$tipo);

}





?>