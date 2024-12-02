<?php
header('Content-Type: application/json');

if (isset($_GET['q'])) {
    $q = $_GET['q'];

    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'usuario', 'contraseña', 'nombre_base_datos');

    if ($conn->connect_error) {
        die(json_encode(['error' => 'Error de conexión']));
    }

    // Consulta para buscar proveedores
    $stmt = $conn->prepare("SELECT id, nombre FROM proveedores WHERE nombre LIKE CONCAT('%', ?, '%') LIMIT 10");
    $stmt->bind_param('s', $q);
    $stmt->execute();
    $result = $stmt->get_result();

    $proveedores = [];
    while ($row = $result->fetch_assoc()) {
        $proveedores[] = $row;
    }

    echo json_encode($proveedores);

    $stmt->close();
    $conn->close();
} else {
    echo json_encode([]);
}
