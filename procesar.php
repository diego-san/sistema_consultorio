<?php
/**
 * User: yo
 * Date: 20-11-2017
 * Time: 19:34
 */
require "bd/delete.php";
require "bd/update.php";

if($_GET['tipo']==1) {
    $delete = new delete();
    $delete->eliminarreserva($_GET['nro'], $_GET['r']);
}elseif ($_GET['tipo']==2){
        echo "<div class='alert alert-success' role='alert'>
                        Persona ingresada correctamente. </div>";
}else{

}

?>