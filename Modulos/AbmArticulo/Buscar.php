<?php
$conexion = new mysqli('localhost', 'root', 'LauLukLulu477!', 'bases');

if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

$query = $_GET['query'] ?? '';

$sql = "SELECT id_usuario, nombre FROM usuario WHERE nombre LIKE ?";
$stmt = $conexion->prepare($sql);
$param = "%" . $query . "%";
$stmt->bind_param("s", $param);
$stmt->execute();
$result = $stmt->get_result();

$html = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= '<div class="resultado" data-id="' . $row['id_usuario'] . '">' . $row['nombre'] . '</div>';
    }
} else {
    $html = '<div class="resultado">No se encontraron resultados</div>';
}

echo $html;

$stmt->close();
$conexion->close();
