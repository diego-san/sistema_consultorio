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





}






?>