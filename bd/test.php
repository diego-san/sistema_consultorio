

<?php

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

$dia =  date('Y-m-d');
echo saber_dia_fecha($dia);


    ?>