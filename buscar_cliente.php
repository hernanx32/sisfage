<?php
$conexion = new mysqli("localhost", "root", "LauLukLulu477!", "bases");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$criterio = $_GET['criterio'] ?? '';

if (is_numeric($criterio)) {
    $sql = "SELECT * FROM clientes WHERE id_cliente = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $criterio);
} else {
    $sql = "SELECT * FROM clientes WHERE nombre LIKE ? OR direccion LIKE ?";
    $stmt = $conexion->prepare($sql);
    $criterioLike = "%" . $criterio . "%";
    $stmt->bind_param("ss", $criterioLike, $criterioLike);
}

$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $id = $row['id_cliente'];
    $nombre = htmlspecialchars($row['nombre'], ENT_QUOTES);
    $direccion = htmlspecialchars($row['direccion'], ENT_QUOTES);
    echo "<div style='cursor:pointer; margin:5px 0;' onclick=\"seleccionarCliente($id, '$nombre', '$direccion')\">";
    echo "ID: $id - $nombre - $direccion";
    echo "</div>";
}

$conexion->close();
?>
