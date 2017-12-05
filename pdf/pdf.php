<?php 

require_once"../bd/consulta.php";
session_start();
error_reporting(0);
if (isset($_GET['r']) && is_numeric($_GET['r'])) {
    $rut = (int) $_GET['r'];
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
        header("Location:login.php");
        exit();
    }

}
$_SESSION['tiempo'] = time();

	$consulta= new consulta;
	$row= $consulta->historial($rut);
    $roworden = array_reverse($row);

if (empty($row)) {

    header("Location:login.php");

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

foreach ($roworden as $key =>$value) {
	$pdf->lastPage();
    $infoclinica = $consulta->info_clinia($value[1]);

    $html = '<table  cellspacing="3" cellpadding="4">
		<tr>
			<th bgcolor="#968f7e" color="#ffffff" align="center">Rut Especialista</th>
			<th bgcolor="#968f7e" color="#ffffff" align="center">Nombre Especialista</th>
			<th bgcolor="#968f7e" color="#ffffff" align="center">Titulo</th>
			<th bgcolor="#968f7e" color="#ffffff" align="center">Fecha</th>
		</tr>
		<tr>
			<td bgcolor="#F2F2F2" color="#000000" align="center" >' . $infoclinica[0][0] . ' ' . $infoclinica[0][1] . '</td>
			<td bgcolor="#F2F2F2" color="#000000" align="center" >' . $infoclinica[0][2] . ' ' . $infoclinica[0][3] . '</td>
			<td bgcolor="#F2F2F2" color="#000000" align="center" >' . $value[3] . '</td>
			<td bgcolor="#F2F2F2" color="#000000" align="center" >' . $value[4] . '</td>
		</tr>
         <tr nobr="true">
           <th colspan="5"  bgcolor="#968f7e" color="#ffffff" align="center">Informe</th>
            </tr>
            <tr>
			<td bgcolor="#F2F2F2" color="#000000" align="center" colspan="5" >' . $value[2]. ' </td>
		</tr>
		
	</table>
	

	
	
	';
    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->lastPage();

}

$nombrepdf=$row[0][0]."pdf";
$pdf->Output($nombrepdf, 'I');

}

 ?>