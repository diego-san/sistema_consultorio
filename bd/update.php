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

    function confreserva($rut,$id,$qr){
        require "conexion.php";
        $estado="CONFIRMADA";


        $sql ="UPDATE reserva set estado = :esta, qr = :qr WHERE rut = :rut AND  id_reserva = :id";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":id", $id);
        $smt->bindValue(":rut", $rut);
        $smt->bindValue(":esta", $estado);
        $smt->bindValue(":qr", $qr);
        $smt->execute();
        $conn=null;

    }
}


?>