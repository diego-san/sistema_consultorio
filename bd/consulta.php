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


        $sql="select * from espera WHERE tipo_es= '$tipo' ";
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

    function verifica_rut_real($rut){
        $r=substr($rut, 0, -1);
        $s=1;
        for($m=0;$r!=0;$r/=10)
            $s=($s+$r%10*(9-$m++%6))%11;
        $digito=chr($s?$s+47:75);

        return $digito;

    }
    function consultames($fecha,$tipo){
        require "conexion.php";
        $mes = strtotime('+1 month',strtotime($fecha));
        $nuevafecha = date ('Y-m-d', $mes);

        $sql="select COUNT(id_reserva), tipo_reveva, DATE(fecha)  from reserva WHERE tipo_reveva='".$tipo."' AND date(fecha) BETWEEN '".$fecha." ' AND '" .$nuevafecha."' group by date(fecha)";

        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;
        return $resultado;
    }

    function consultaano($fecha,$tipo){
        require "conexion.php";
        $mes = strtotime('+1 year',strtotime($fecha));
        $nuevafecha = date ('Y-m-d', $mes);

        $sql="select COUNT(id_reserva),YEAR(fecha),MONTH(Fecha) from reserva WHERE tipo_reveva='".$tipo."' and fecha BETWEEN '".$fecha." 08:00:00' AND '" .$nuevafecha." 23:59:00' group by MONTH(Fecha)";

        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;
        return $resultado;
    }

    function consultadia($fecha){
        require "conexion.php";


        $sql="select COUNT(id_reserva), tipo_reveva from reserva WHERE fecha BETWEEN '".$fecha." 08:00:00' AND '" .$fecha." 23:59:00' group by tipo_reveva";

        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;
        return $resultado;
    }

    function pendiente(){
        require "conexion.php";
        $sql="select * from reserva WHERe estado= 'PENDIENTE'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;

    }

    function reservaqr($rut,$id){
        require "conexion.php";
        $sql="select * from reserva WHERe rut= $rut and id_reserva= $id";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;

    }

    function reservaporid($id){
        require "conexion.php";
        $dia=date ('Y-m-d');
        $sql="select * from reserva WHERe id_reserva=$id AND fecha BETWEEN '".$dia." 08:00:00' AND '".$dia." 23:59:00'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;

    }

    function espera($rut,$tipo){
        require "conexion.php";

        $sql="select * from espera WHERe rut_es = '$rut' and tipo_es= '$tipo'" ;
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;

    }

    function buscaapellido($ap){
        require "conexion.php";
        $sql ="select * from persona WHERE apellido_persona= '$ap'";
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;


    }

    function esperalist (){
        require "conexion.php";

        $sql="select * from espera " ;
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;

    }
    function listaad (){
        require "conexion.php";

        $sql="select * from administracion " ;
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;

    }
    function listame (){
        require "conexion.php";

        $sql="select * from clinica_administracion " ;
        $smt=$conn->prepare($sql);
        $smt->execute();
        $resultado= $smt->fetchall();
        $conn=null;

        return $resultado;

    }

    }