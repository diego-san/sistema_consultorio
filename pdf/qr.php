<?php

require_once"../bd/consulta.php";
session_start();
error_reporting(0);
if (isset($_GET['d']) && is_numeric($_GET['d'])) {
    $id = (int) $_GET['d'];
}else{
    header("Location:../login.php");
    die();
}



if ($_SESSION['tipo'] == 'NORMAL'  ) {
    $varsesion=$_SESSION['login'];
    $rut=$varsesion;
}elseif ( $_SESSION['tipo'] == 'ADMINISTRACION' || $_SESSION['tipo'] == 'CLINICA'){

}
else{
    header("Location:../login.php");
    die();
}
//tiempo de sesion
if(isset($_SESSION['tiempo']) ) {
    $inactivo = 1200;
    $vida_session = time() - $_SESSION['tiempo'];
    if($vida_session > $inactivo)
    {
        session_unset();
        session_destroy();
        header("Location:../login.php");
        exit();
    }

}
$_SESSION['tiempo'] = time();

$consulta= new consulta;
$row= $consulta->reservaqr($rut,$id);


if (empty($row)) {

    header("Location:../login.php");

}else{

    require_once('config/tcpdf_config.php');
    require_once('tcpdf.php');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);


    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

// set font
    $pdf->SetFont('dejavusans', '', 10);

// add a page
    $pdf->AddPage();


        $pdf->lastPage();
        $infoclinica = $consulta->info_clinia($value[1]);

        $html = '<div></div>
	<img src="../img/'.$row[0]["qr"].'" width="200" height="200" style="text-align:center"/>
	<div></div>';
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->lastPage();



    $nombrepdf=$row[0][0]."pdf";
    $pdf->Output($nombrepdf, 'I');

}

?>