<?php
$conexion = new mysqli('localhost', 'root', '', 'bases');

if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

$query = $_POST['query'] ?? '';
$sql = "SELECT id_proveedor, nombre FROM proveedor WHERE nombre LIKE ? LIMIT 10";
$stmt = $conexion->prepare($sql);
$param = "%$query%";
$stmt->bind_param('s', $param);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['id_proveedor']) . '</td>';
    echo '<td>' . htmlspecialchars($row['nombre']) . '</td>';
    echo '<td><button class="btn btn-sm btn-success seleccionar" data-id="' . htmlspecialchars($row['id_proveedor']) . '" data-nombre="' . htmlspecialchars($row['nombre']) . '">Seleccionar</button></td>';
    echo '</tr>';
}

$stmt->close();
$conexion->close();
?>
