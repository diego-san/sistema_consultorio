<?php
/**
 *
 * User: yo
 * Date: 18-11-2017
 * Time: 16:58
 */
class update {

    function password_update($rut,$pass){
        require "conexion.php";
        echo $rut;
        $password= crypt($pass,'multimedia');
        echo $password;
        $sql ="UPDATE user set password = :password WHERE rut = :rut";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":password", $password);
        $smt->bindValue(":rut", $rut);
        $smt->execute();
        $conn=null;

    }
}


?>