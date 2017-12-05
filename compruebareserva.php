<?php

require "bd/consulta.php";

$rut= $_GET['rt'];
$tp=$_GET['tp'];
$consulta= new consulta();
if($tp==10){
    $tipo = "GENERAL";
    $dato= $consulta->reservatipo($rut,$tipo);
}elseif ($tp==20){
    $tipo = "DENTAL";
    $dato= $consulta->reservatipo($rut,$tipo);
}elseif ($tp==30){
    $tipo = "OFTAMOLOGIA";
    $dato= $consulta->reservatipo($rut,$tipo);
}elseif ($tp==40){
    $tipo = "MENTAL";
    $dato= $consulta->reservatipo($rut,$tipo);
}elseif ($tp==50){
    $tipo = "PEDIATRIA";
    $dato= $consulta->reservatipo($rut,$tipo);
}elseif ($tp==60){
    $tipo = "KINESIOLOGIA";
    $dato= $consulta->reservatipo($rut,$tipo);
}elseif ($tp==70){
    $tipo = "MATERNAL";
    $dato= $consulta->reservatipo($rut,$tipo);
}elseif ($tp==80){
    $tipo = "GINECOLOGIA";
    $dato= $consulta->reservatipo($rut,$tipo);
}





if (empty($dato)){
    echo "false";
}else{
    echo "true";
}









?>