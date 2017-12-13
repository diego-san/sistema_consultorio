<?php
/**
 * User: yo
 * Date: 20-11-2017
 * Time: 20:09
 */

class delete{

    function eliminarreserva($id,$rut){
        require "conexion.php";
        $sql ="select rut from reserva WHERE rut = '$rut' AND id_reserva= $id ";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();

        if (!empty($resultado)){

            $sql2 ="DELETE FROM reserva WHERE rut =:rut AND id_reserva= :id";
            $smt=$conn->prepare($sql2);
            $smt->bindParam(':rut',$rut);
            $smt->bindParam(':id',$id);
            $smt->execute();
            $conn=null;
            echo $id;

        }

    }

    function deletereservaconsulta($rut,$tipo){
        require "conexion.php";

        $sql ="DELETE FROM reserva WHERE rut =:rut AND tipo_reveva = :tipo ";

        $smt=$conn->prepare($sql);
        $smt->bindParam(':rut',$rut);
        $smt->bindParam(':tipo',$tipo);
        $smt->execute();
        $conn=null;
    }

    function deleteesperaconsulta($rut,$tipo){
        require "conexion.php";

        $sql ="DELETE FROM espera WHERE rut_es =:rut AND tipo_es = :tipo ";

        $smt=$conn->prepare($sql);
        $smt->bindParam(':rut',$rut);
        $smt->bindParam(':tipo',$tipo);
        $smt->execute();
        $conn=null;
    }

    function deladminuser($rut){
        require "conexion.php";

        $sql ="DELETE FROM user WHERE rut =:rut ";

        $smt=$conn->prepare($sql);
        $smt->bindParam(':rut',$rut);

        $smt->execute();
        $conn=null;
    }
    function deladminadmin($rut){
        require "conexion.php";

        $sql ="DELETE FROM administracion WHERE rut_administracion =:rut ";

        $smt=$conn->prepare($sql);
        $smt->bindParam(':rut',$rut);

        $smt->execute();
        $conn=null;
    }

}