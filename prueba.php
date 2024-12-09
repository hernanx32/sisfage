<?php
$conn = new mysqli("127.0.0.1", "root", "", "bases");
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die('Error de Conexión: ' . $conn->connect_error);
    $EstCon = 'Error';
} else {
    $EstCon = 'OK';
}


$query = "SELECT MIN(t1.id_articulo + 1) AS next_id
FROM articulo t1
LEFT JOIN articulo t2
ON t1.id_articulo + 1 = t2.id_articulo
WHERE t2.id_articulo IS NULL";

$stmt = $conn->prepare($query);
$stmt->execute();
$stmt->bind_result($id_art);
$stmt->fetch();
echo $id_art;
$stmt->close();
        




/*
$query = "SELECT porcentaje FROM iva WHERE id_iva = '$dato10'";
$stmt = $conn->prepare($query);
if ($stmt) {
    $stmt->execute();
    $stmt->bind_result($valorIva);

    // Extrae el resultado
    if ($stmt->fetch()) {
        echo $valorIva; // Muestra el valor de porcentaje
    } else {
        echo "No se encontró el registro.";
    }

    $stmt->close(); // Cierra el statement
} else {
    echo "Error en la preparación de la consulta: " . $conn->error;
}

$conn->close(); // Cierra la conexión */
?>
