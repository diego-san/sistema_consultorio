<?php
require_once "test/creaBD.php";

$usuario = "root";
$clave = "";
$db_nombre = "sistema_consultorio";
$host = "localhost";

try {
   $conn = new PDO("mysql:host=$host;dbname=$db_nombre", $usuario, $clave);
} catch (PDOException $e) {
    $crea= new Create_database();
}

?>
