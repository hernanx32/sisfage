<?php
$conexion = new mysqli("127.0.0.1", "root", "LauLukLulu477!", "bases");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>