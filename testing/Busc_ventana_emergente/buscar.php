<?php
$conexion = new mysqli("localhost", "root", "", "bases");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$termino = $_GET['query'];

$sql = "SELECT * FROM articulo WHERE desc_larga LIKE '%$termino%'";
$resultado = $conexion->query($sql);

$clientes = [];
while ($fila = $resultado->fetch_assoc()) {
    $clientes[] = $fila;
}

echo json_encode($clientes);
?>
