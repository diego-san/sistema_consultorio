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

    function saber_dia_fecha($nombredia)
    {
        $dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
        $fecha = $dias[date('N', strtotime($nombredia))];
        $fe = date('d',strtotime ( $nombredia));
        $mes=date('m',strtotime ( $nombredia));

        if($mes==1){
            $dia= $fecha." ".$fe." de Enero";
            return $dia;
        }elseif ($mes == 2){
            $dia= $fecha." ".$fe." de Febrero";
            return $dia;
        }elseif ($mes == 3){
            $dia= $fecha." ".$fe." de Marzo";
            return $dia;
        }elseif ($mes == 4){
            $dia= $fecha." ".$fe." de Abril";
            return $dia;
        }elseif ($mes == 5){
            $dia= $fecha." ".$fe." de Mayo";
            return $dia;
        }elseif ($mes == 6){
            $dia= $fecha." ".$fe." de Junio";
            return $dia;
        }elseif ($mes == 7){
            $dia= $fecha." ".$fe." de Julio";
            return $dia;
        }elseif ($mes == 8){
            $dia= $fecha." ".$fe." de Agosto";
            return $dia;
        }elseif ($mes == 9){
            $dia= $fecha." ".$fe." de Septiembre";
            return $dia;
        }elseif ($mes == 10){
            $dia= $fecha." ".$fe." de Octubre";
            return $dia;
        }elseif ($mes == 11){
            $dia= $fecha." ".$fe." de Noviembre";
            return $dia;
        }elseif ($mes == 12){
            $dia= $fecha." ".$fe." de Diciembre";
            return $dia;
        }

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

    function pacientedia($tipo){
        require "conexion.php";
        $fechaini = date('Y-m-d');

        $sql="select * from reserva WHERE tipo_reveva= '$tipo' AND fecha BETWEEN '".$fechaini." 08:00:00' AND '".$fechaini." 23:59:00'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;
        return $resultado;
    }

    function historial($rut){
        require "conexion.php";
        $sql="select * from historial WHERE rut_histo = $rut";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;
        return $resultado;


    }



    }