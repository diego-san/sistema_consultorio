<?php

class insertar {

    function insertar_persona($nombre,$apellido,$rut,$nroficha,$fecha_nac,$genero,$direcc,$servicio,$ciudadnac,$telefono,$sector,$esta,$movi){
        include "conexion.php";
        $r=$rut;
        $s=1;
        for($m=0;$r!=0;$r/=10)
            $s=($s+$r%10*(9-$m++%6))%11;
        $digito=chr($s?$s+47:75);




        $sql ="INSERT INTO persona (rut_persona,digito_persona,nro_ficha,nombre_persona,apellido_persona,fech_nac_persona,genero_persona,direccion_persona,servicio_salub,ciudad_nacimiento,numero_telefono,sector,establecimiento,tipo_persona) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $smt=$conn->prepare($sql);
        $smt->bindparam(1,$rut);
        $smt->bindparam(2,$digito);
        $smt->bindparam(3,$nroficha);
        $smt->bindparam(4,$nombre);
        $smt->bindparam(5,$apellido);
        $smt->bindparam(6,$fecha_nac);
        $smt->bindparam(7,$genero);
        $smt->bindparam(8,$direcc);
        $smt->bindparam(9,$servicio);
        $smt->bindparam(10,$ciudadnac);
        $smt->bindparam(11,$telefono);
        $smt->bindparam(12,$sector);
        $smt->bindparam(13,$esta);
        $smt->bindparam(14,$movi);


        $smt->execute();
        $conn=null;


    }

    function ingresaruser($rut,$tipo){
        include "conexion.php";
        $r=$rut;
        $s=1;
        for($m=0;$r!=0;$r/=10)
            $s=($s+$r%10*(9-$m++%6))%11;
        $digito=chr($s?$s+47:75);
        $rest = substr($rut, -4);
        $password=$rest.$digito;
        $pass= crypt($password,'multimedia');
        $sql="insert into user(rut,password,tipo) VALUES (?,?,?)";
        $smt=$conn->prepare($sql);
        $smt->bindparam(1,$rut);
        $smt->bindparam(2,$pass);
        $smt->bindparam(3,$tipo);
        $smt->execute();
        $conn=null;

    }
    function in_admin($rut,$nombre,$apellido,$cargo,$fecha,$titulo,$telefono,$correo,$direc){
        require "conexion.php";
        $r=$rut;
        $s=1;
        for($m=0;$r!=0;$r/=10)
            $s=($s+$r%10*(9-$m++%6))%11;
        $digito=chr($s?$s+47:75);

        $sql="insert into administracion (rut_administracion, digito_admin, nombre_administracion, cargo_admin, apellido_administracion, titulo_admin, numero_admin, correo_admin, direcc_admin, fech_nac_admin) 
              VALUES (?,?,?,?,?,?,?,?,?,?)";
        $smt=$conn->prepare($sql);
        $smt->bindparam(1,$rut);
        $smt->bindparam(2,$digito);
        $smt->bindparam(3,$nombre);
        $smt->bindparam(6,$cargo);
        $smt->bindparam(4,$apellido);
        $smt->bindparam(5,$titulo);
        $smt->bindparam(7,$telefono);
        $smt->bindparam(8,$correo);
        $smt->bindparam(9,$direc);
        $smt->bindparam(10,$fecha);
        $smt->execute();
        $conn=null;


    }

    function in_clini($rut,$nombre,$apellido,$cargo,$fecha,$titulo,$telefono,$correo,$direc){
        require "conexion.php";
        $r=$rut;
        $s=1;
        for($m=0;$r!=0;$r/=10)
            $s=($s+$r%10*(9-$m++%6))%11;
        $digito=chr($s?$s+47:75);
        $sql="insert into clinica_administracion (rut_clinica, digito_clin, nombre_clinica, apellido_clinica, titulo_clinica, cargo_clinica, numero_clinica, correo_clinica, direcc_clinica, fech_nac_clinica) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $smt=$conn->prepare($sql);
        $smt->bindparam(1,$rut);
        $smt->bindparam(2,$digito);
        $smt->bindparam(3,$nombre);
        $smt->bindparam(6,$cargo);
        $smt->bindparam(4,$apellido);
        $smt->bindparam(5,$titulo);
        $smt->bindparam(7,$telefono);
        $smt->bindparam(8,$correo);
        $smt->bindparam(9,$direc);
        $smt->bindparam(10,$fecha);
        $smt->execute();
        $conn=null;
    }

    function in_reserva($rut,$fecha,$tipo){
        require "conexion.php";
        $sql= "INSERT INTO reserva(rut, fecha, tipo_reveva) VALUES (?,?,?)";
        $smt=$conn->prepare($sql);
        $smt->bindparam(1,$rut);
        $smt->bindparam(2,$fecha);
        $smt->bindparam(3,$tipo);
        $smt->execute();
        $conn=null;


    }

    function in_historial($rutpe,$rues,$tipo,$info,$fechaini){
        require "conexion.php";


        $sql ="INSERT INTO historial ( rut_histo,rut_especialista, informe_ante, tipo_atencion, fecha) VALUES (?,?,?,?,?)";
        $smt=$conn->prepare($sql);
        $smt->bindparam(1,$rutpe);
        $smt->bindparam(2,$rues);
        $smt->bindparam(3,$info);
        $smt->bindparam(4,$tipo);
        $smt->bindparam(5,$fechaini);
        $smt->execute();
        $conn=null;


    }

}






?>