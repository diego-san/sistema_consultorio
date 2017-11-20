<?php
/**
 * User: yo
 * Date: 20-11-2017
 * Time: 20:09
 */

class delete{

    function eliminarreserva($id,$rut){
        require "conexion.php";
        $sql ="select rut from reserva WHERE rut = $rut AND id_reserva= $id ";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();

        if (!empty($resultado)){
            $sql ="DELETE FROM reserva WHERE rut =:rut AND id_reserva= :id";
            $smt=$conn->prepare($sql);
            $smt->bindParam(':rut',$rut);
            $smt->bindParam(':id',$id);
            $smt->execute();
            $conn=null;

        }

    }
}