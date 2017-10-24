<?php
/**
 * Created by PhpStorm.
 * User: yo
 * Date: 24-10-2017
 * Time: 16:49
 */

class consulta{
    function login_validacion($rut,$password){
        require "conexion.php";
        $pass=md5(strtoupper($password));
        $sql ="select rut,tipo from user WHERE rut = $rut AND password= '$pass'";

        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;
        if(!empty($resultado)){
            return $resultado;
        }else{
            return $resultado;
        }

    }

}