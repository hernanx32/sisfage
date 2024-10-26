<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";  // Cambiar si es necesario
$password = "";  // Cambiar si es necesario
$dbname = "bases";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener los productos desde la base de datos
$sql = "SELECT id_articulo, desc_larga FROM articulo";
$result = $conn->query($sql);

// Generar las opciones para el select
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['id_articulo'].'">'.$row['desc_larga'].'</option>';
    }
} else {
    echo '<option>No se encontraron productos</option>';
}

$conn->close();
?>