<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'bases';
$user = 'root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

$q = isset($_GET['q']) ? $_GET['q'] : '';
if (!empty($q)) {
    $stmt = $conn->prepare('SELECT id_proveedor, nombre FROM proveedor WHERE nombre LIKE :query LIMIT 10');
    $stmt->execute(['query' => '%' . $q . '%']);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
} else {
    echo json_encode([]);
}
?>