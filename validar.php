<?php
require_once "bd/consulta.php";

if (!empty($_REQUEST['rut'] && !empty($_REQUEST['password'])) && is_numeric($_REQUEST['rut'])) {
    $rut = $_REQUEST['rut'];
    $pass = $_REQUEST['password'];

    $consulta = new consulta();
    $valida_login = $consulta->login_validacion($rut,$pass);

    //direcciona segun el tipo de usuario
    if (!empty($valida_login)) {
        if($valida_login[0]['tipo']== 'ADMINISTRACION'){
            session_start();
            $_SESSION['login'] = $valida_login[0]['rut'];
            $_SESSION['tipo'] = $valida_login[0]['tipo'];
            header("Location:administracion.php");
        }elseif ($valida_login[0]['tipo']=='NORMAL'){
            session_start();
            $_SESSION['login'] = $valida_login[0]['rut'];
            $_SESSION['tipo'] = $valida_login[0]['tipo'];
            header("Location:panelnormal.php");

        }elseif ($valida_login[0]['tipo']=='CLINICA'){
            session_start();
            $_SESSION['login'] = $valida_login[0]['rut'];
            $_SESSION['tipo'] = $valida_login[0]['tipo'];
            header("Location:medico.php");

        }elseif ($valida_login[0]['tipo']=='ROOT'){
            session_start();
            $_SESSION['login'] = $valida_login[0]['rut'];
            $_SESSION['tipo'] = $valida_login[0]['tipo'];
            header("Location:root.php");

        }



    }else{
       header("Location:login.php?error=1");
    }

}else{
    header("Location:login.php?error=1");
}



?>