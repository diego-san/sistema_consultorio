<?php 
require_once "../bd/consulta.php";
require_once "../bd/insertar.php";
if (isset($_POST['send'])) {
    $id= $_POST['credential'];

    $consulta = new consulta();
    $verifica=$consulta->reservaporid($id);

    if (empty($verifica)){
        $arr['d']="Reserva No Encontrada Para Dia De HOY";
        echo json_encode($arr);
    }else{
        $rut=$verifica[0][0];
        $fecha=$verifica[0][1];
        $tipo=$verifica[0][2];
        $verespera = $consulta->espera($rut,$tipo);
        if (empty($verespera)){
            $insertar = new insertar();
            $insertar->in_espera($rut,$fecha,$tipo,$id);
            $arr['d']="Fue Puesta En Lista De Espera";
            echo json_encode($arr);



        }else{

            $arr['d']="Ya Esta En Lista De Espera";
            echo json_encode($arr);

        }


    }






}



 ?>