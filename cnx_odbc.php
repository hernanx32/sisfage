<?php
try {
    $ruta = "C:\\xampp\\sisfage.mdb"; // Usa doble backslash en Windows
    $dsn = "odbc:Driver={Microsoft Access Driver (*.mdb)};Dbq=C:\xampp\sisfage.mdb;Uid=Admin;Pwd=;";
    
    $pdo = new PDO($dsn);

    // Leer datos de la tabla "clientes"
    $stmt = $pdo->query("SELECT * FROM clientes");
    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $fila['id'] . " - Nombre: " . $fila['nombre'] . "<br>";
    }

} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>

	