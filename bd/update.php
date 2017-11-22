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

        $password= crypt($pass,'multimedia');

        $sql ="UPDATE user set password = :password WHERE rut = :rut";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":password", $password);
        $smt->bindValue(":rut", $rut);
        $smt->execute();
        $conn=null;

    }
}


?>