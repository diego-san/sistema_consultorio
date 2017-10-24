<?php
require_once "bd/consulta.php";

if (!empty($_REQUEST['rut'] && !empty($_REQUEST['password']))) {
    $rut = $_REQUEST['rut'];
    $pass = $_REQUEST['password'];

    $consulta = new consulta();
    $valida_login = $consulta->login_validacion($rut,$pass);

    //direcciona segun el tipo de usuario
    if (!empty($valida_login)) {
        if($valida_login[0]['tipo']== 'ADMINISTRACION'){
            session_start();
            $_SESSION['login'] = $valida_login[0]['rut'];
            header("Location:administracion.php");
        }



    }else{
       header("Location:login.php?error=1");
    }

}else{
    header("Location:login.php");
}



?>