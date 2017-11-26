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
        $pass= crypt($password,'multimedia');

        $sql ="select rut,tipo from user WHERE rut = $rut AND password= '$pass'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;



    }
    function panelnormal($rut){
        require "conexion.php";
        $sql="select * from persona WHERE rut_persona = $rut";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;

    }
    function compruba($rut){
        require "conexion.php";
        $sql ="select * from user WHERE rut = $rut";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;


    }
    function comprubanro($rut,$nro){
        require "conexion.php";
        $sql ="select * from persona WHERE rut_persona = $rut OR nro_ficha= $nro ";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;


    }
    function comprubaPERSONA($rut){
        require "conexion.php";
        $sql ="select * from user WHERE rut =$rut AND tipo = 'NORMAL'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;


    }
    function info_root($rut){
        require "conexion.php";
        $sql="select * from administracion WHERE rut_administracion = $rut";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;

    }
    function reserva($rut){
        require "conexion.php";
        $sql="select * from reserva WHERe rut= $rut";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;

    }
    function info_clinia($rut){
        require "conexion.php";
        $sql="select * from clinica_administracion WHERE rut_clinica = $rut";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;

    }
    function reservacal($fech_in,$tipo){
        require "conexion.php";
        $sql="select * from reserva WHERE tipo_reveva= '$tipo' AND fecha BETWEEN '".$fech_in." 00:00' AND  '".$fech_in." 23:59'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;
        return $resultado;

    }

    function verificarhora($fecha,$tipo){

        require "conexion.php";
        $sql="select * from reserva WHERE tipo_reveva= '$tipo' AND fecha='$fecha' ";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;
        return $resultado;


    }

    function saber_dia($nombredia)
    {
        $dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
        $fecha = $dias[date('N', strtotime($nombredia))];

        return $fecha;
    }

    function reservatipo($rut,$tipo){
        require "conexion.php";
        $sql="select * from reserva WHERE tipo_reveva= '$tipo' AND rut = $rut ";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;
        return $resultado;


    }



    }