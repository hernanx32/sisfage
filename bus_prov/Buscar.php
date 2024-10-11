<?php
// Conexión a la base de datos
$conn= new mysqli("127.0.0.1", "root", "", "bases");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el término de búsqueda enviado desde JavaScript
$buscar = $_GET['buscar'] ?? '';

if ($buscar) {
    // Consultar los proveedores que coincidan con el término de búsqueda
    $sql = "SELECT id_acceso, nombre FROM acceso WHERE nombre LIKE ?";
    $stmt = $conn->prepare($sql);
    $buscar = "%" . $buscar . "%";
    $stmt->bind_param("s", $buscar);
    $stmt->execute();
    $result = $stmt->get_result();

    // Devolver los resultados en formato JSON
    $proveedores = [];
    while ($row = $result->fetch_assoc()) {
        $proveedores[] = $row;
    }
    echo json_encode($proveedores);
}

$conn->close();
?>