<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "bases"; // Cambia por el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el término de búsqueda enviado desde el frontend
$query = $_GET['query'];

// Preparar y ejecutar la consulta SQL
$sql = "SELECT id_usuario, nombre FROM usuario WHERE  id_usuario LIKE ? OR nombre LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = '%' . $query . '%';
$stmt->bind_param("ss", $searchTerm, $searchTerm);  // Se vincula para buscar tanto por id como por nombre
$stmt->execute();
$result = $stmt->get_result();

// Crear un array para almacenar los resultados
$suggestions = [];

while ($row = $result->fetch_assoc()) {
    $suggestions[] = $row;
}

// Devolver los resultados en formato JSON
echo json_encode($suggestions);

// Cerrar la conexión
$conn->close();
?>