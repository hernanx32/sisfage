<?php
global $EstCon, $conn;

$conn= new mysqli("127.0.0.1", "root", "LauLukLulu477!", "bases");
$conn->set_charset("utf8");


if($conn->connect_error){
	die('Error de Conexion '.$conn->connect_error);
	$EstCon = 'Error';
}else{
	$EstCon = 'OK';
	
}


?>