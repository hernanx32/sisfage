<?php
$conexion = new mysqli("localhost", "root", "LauLukLulu477!", "bases");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$criterio = $_GET['criterio'] ?? '';

if (is_numeric($criterio)) {
    $sql = "SELECT * FROM clientes WHERE id_cliente = ?";
} else {
    $sql = "SELECT * FROM clientes WHERE razon_social LIKE ? OR direccion LIKE ?";
    $criterio = "%$criterio%";
}

$stmt = $conexion->prepare($sql);

if (is_numeric($_GET['criterio'])) {
    $stmt->bind_param("i", $_GET['criterio']);
} else {
    $stmt->bind_param("ss", $criterio, $criterio);
}

$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<div onclick=\"seleccionarCliente(" . $row['id_cliente'] . ", '" . htmlspecialchars($row['razon_social']) . "', " . $row['direccion'] . ")\">";
    echo "ID: " . $row['id_cliente'] . " - " . $row['razon_social'] . " - " . $row['direccion'];
    echo "</div>";
}

$conexion->close();
?>