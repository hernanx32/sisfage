<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bases";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $stmt = $conn->prepare("SELECT * FROM usuario WHERE id_usuario LIKE ? OR usuario LIKE ?");
    $searchTerm = "%$query%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='result-item'>ID: " . $row["id_usuario"]. " - Usuario: " . $row["usuario"]. "</div>";
        }
    } else {
        echo "<div class='result-item'>0 results</div>";
    }
    $stmt->close();
}

$conn->close();
?>