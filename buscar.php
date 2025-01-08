<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado un término de búsqueda
$searchTerm = isset($_GET['buscar']) ? $_GET['buscar'] : '';

$sql = "SELECT * FROM Articulo WHERE nombre LIKE ? OR codigo LIKE ?";
$stmt = $conn->prepare($sql);

// Preparamos las variables para evitar inyecciones SQL
$searchTermWithWildcard = "%$searchTerm%";
$stmt->bind_param("ss", $searchTermWithWildcard, $searchTermWithWildcard);

// Ejecutar la consulta
$stmt->execute();
$result = $stmt->get_result();

// Mostrar los resultados
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nombre"] . "</td>
                <td>" . $row["codigo"] . "</td>
                <td>" . $row["precio"] . "</td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No se encontraron resultados.";
}

$stmt->close();
$conn->close();
?>
