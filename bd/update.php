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

    function modiper($r,$nombre,$apellido,$fecha,$movi,$direc,$ser,$ciudad,$tele){
        require "conexion.php";

        $sql ="UPDATE persona set nombre_persona= :nom,apellido_persona=:ap,fech_nac_persona=:fecha,tipo_persona=:movi, direccion_persona=:direc,servicio_salub=:ser,ciudad_nacimiento=:ciudad,numero_telefono=:tele   WHERE rut_persona = :rut";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":rut", $r);
        $smt->bindValue(":nom", $nombre);
        $smt->bindValue(":ap", $apellido);
        $smt->bindValue(":fecha", $fecha);
        $smt->bindValue(":movi", $movi);
        $smt->bindValue(":direc", $direc);
        $smt->bindValue(":ser", $ser);
        $smt->bindValue(":ciudad", $ciudad);
        $smt->bindValue(":tele", $tele);
        $smt->execute();
        $conn=null;

    }
    function modiadmin($rut,$nombre,$apellido,$cargo,$fecha,$tirulo,$tele,$email,$direcc){
        require "conexion.php";

        $sql ="UPDATE administracion set nombre_administracion=:nombre,apellido_administracion=:ape, cargo_admin=:cargo, fech_nac_admin=:fecha, titulo_admin=:titulo, numero_admin=:tele, correo_admin=:email, direcc_admin=:direcc  WHERE rut_administracion = :rut ";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":rut", $rut);
        $smt->bindValue(":nombre", $nombre);
        $smt->bindValue(":ape", $apellido);
        $smt->bindValue(":cargo", $cargo);
        $smt->bindValue(":fecha", $fecha);
        $smt->bindValue(":titulo", $tirulo);
        $smt->bindValue(":tele", $tele);
        $smt->bindValue(":email", $email);
        $smt->bindValue(":direcc", $direcc);
        $smt->execute();
        $conn=null;

    }

    function modimedi($rut,$nombre,$apellido,$tirulo,$fecha,$tele,$correo,$direcc){
        require "conexion.php";

        $sql ="UPDATE clinica_administracion set nombre_clinica=:nombre,apellido_clinica=:ape,fech_nac_clinica=:fecha, titulo_clinica=:titulo,numero_clinica=:tele,correo_clinica=:email, direcc_clinica=:direcc WHERE rut_clinica = :rut ";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":rut", $rut);
        $smt->bindValue(":nombre", $nombre);
        $smt->bindValue(":ape", $apellido);
        $smt->bindValue(":fecha", $fecha);
        $smt->bindValue(":titulo", $tirulo);
        $smt->bindValue(":tele", $tele);
        $smt->bindValue(":email", $correo);
        $smt->bindValue(":direcc", $direcc);
        $smt->execute();
        $conn=null;

    }
    function estadocli($rut,$estado){
        require "conexion.php";

        if($estado=="ACTIVO"){
            $tipo="CLINICA";
        }else{
            $tipo=$estado;
        }


        $sql ="UPDATE user set tipo=:esta WHERE rut = :rut";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":esta", $tipo);
        $smt->bindValue(":rut", $rut);
        $smt->execute();


        $sql ="UPDATE clinica_administracion set estado=:esta WHERE rut_clinica = :rut";
        $smt=$conn->prepare($sql);
        $smt->bindValue(":esta", $estado);
        $smt->bindValue(":rut", $rut);
        $smt->execute();



        $conn=null;




    }

}


?>