<?php
/**
 * User: yo
 * Date: 20-11-2017
 * Time: 19:34
 */
require "bd/delete.php";
require "bd/update.php";
require "bd/consulta.php";
if($_GET['tipo']==1) {
    $delete = new delete();
    $delete->eliminarreserva($_GET['nro'], $_GET['r']);

}elseif ($_GET['tipo']==2){

        $rut = $_GET['nro'];
        $consulta= new consulta();
        $consu= $consulta->comprubaPERSONA($rut);


        if(!empty($consu)){

            $r=$rut;
            $s=1;
            for($m=0;$r!=0;$r/=10)
                $s=($s+$r%10*(9-$m++%6))%11;
            $digito=chr($s?$s+47:75);
            $rest = substr($rut, -4);
            $password=$rest.$digito;
            $actu= new update();
            $actu->password_update($rut,$password);
            echo "<br><div class='alert alert-success' role='alert'>
                       Contraseña Restablecida </div>";

        }else{
            echo "<br><div class='alert alert-danger' role='alert'>
                        Persona no Registrada </div>";
        }


}elseif ($_GET['tipo']==3){

    $rut = $_GET['nro'];
    $consulta= new consulta();
    $consu= $consulta->compruba($rut);


    if(!empty($consu)){

        $r=$rut;
        $s=1;
        for($m=0;$r!=0;$r/=10)
            $s=($s+$r%10*(9-$m++%6))%11;
        $digito=chr($s?$s+47:75);
        $rest = substr($rut, -4);
        $password=$rest.$digito;
        $actu= new update();
        $actu->password_update($rut,$password);
        echo "<br><div class='alert alert-success' role='alert'>
                       Contraseña Restablecida </div>";

    }else{
        echo "<br><div class='alert alert-danger' role='alert'>
                        Persona no Registrada </div>";
    }


}elseif ($_GET['tipo']==4){

    $rut = $_GET['nro'];
    $consulta= new consulta();
    $consu= $consulta->compruba($rut);


    if(!empty($consu)){

       echo "true";

    }else{
        echo "<br><div class='alert alert-danger' role='alert'>
                        Persona no Registrada </div>";
    }


}elseif ($_GET['tipo']==5){
    require_once "phpqrcode/qrlib.php";
    $directorio ="img/";
    $rut = $_GET['nro'];
    $errorCorrectionLevel="H";
    $matrixPointSize= 7;
    $filename = $directorio.$rut.md5($rut.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
    $link = $_GET['nro'];
    QRcode::png($link, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
    $actu= new update();

    $actu->confreserva($_GET['r'],$rut,basename($filename));

}elseif ($_GET['tipo']==6){

    $ap = $_GET['apellido'];
    $consulta= new consulta();
    $consu= $consulta->buscaapellido($ap);


    if(!empty($consu)){
        $can=count($consu);
        $arr['v']="true";








        echo json_encode($arr);

    }else{
        $arr['v']="false";
        $arr['m']="<br><div class='alert alert-danger' role='alert'>
                        Persona no Registrada </div>";
        echo json_encode($arr);
    }


}else{

}

?>