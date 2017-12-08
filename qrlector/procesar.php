<?php 

if (isset($_POST['send'])) {


	$arr['d'] = $_POST['credential'];
	echo json_encode($arr);

}



 ?>