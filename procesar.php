<?php
/**
 * User: yo
 * Date: 20-11-2017
 * Time: 19:34
 */
require "bd/delete.php";

$delete = new delete();
$delete->eliminarreserva($_GET['nro'],$_GET['r']);


?>