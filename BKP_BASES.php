<?php
// Configuración de la base de datos
$host = 'localhost'; // Dirección del servidor
$username = 'root'; // Usuario de MySQL
$password = ''; // Contraseña de MySQL
$dbName = 'bases'; // Nombre de la base de datos

// Nombre del archivo de backup
$backupFile = 'backup_' . $dbName . '_' . date('Y-m-d_H-i-s') . '.sql';

// Conexión al servidor MySQL
$conn = new mysqli($host, $username, $password, $dbName);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener la lista de tablas
$tables = [];
$result = $conn->query("SHOW TABLES");
while ($row = $result->fetch_row()) {
    $tables[] = $row[0];
}

// Iniciar el contenido del archivo de backup
$backupSQL = "-- Backup de la base de datos: $dbName\n-- Fecha: " . date('Y-m-d H:i:s') . "\n\n";

foreach ($tables as $table) {
    // Obtener la estructura de la tabla
    $result = $conn->query("SHOW CREATE TABLE $table");
    $row = $result->fetch_row();
    $backupSQL .= "\n-- Estructura de la tabla `$table`\n";
    $backupSQL .= $row[1] . ";\n\n";

    // Obtener los datos de la tabla
    $result = $conn->query("SELECT * FROM $table");
    if ($result->num_rows > 0) {
        $backupSQL .= "-- Datos de la tabla `$table`\n";
        while ($row = $result->fetch_assoc()) {
            $backupSQL .= "INSERT INTO `$table` VALUES(";
            $values = [];
            foreach ($row as $value) {
                $values[] = isset($value) ? "'" . $conn->real_escape_string($value) . "'" : "NULL";
            }
            $backupSQL .= implode(", ", $values) . ");\n";
        }
        $backupSQL .= "\n";
    }
}

// Guardar el archivo de backup
if (file_put_contents($backupFile, $backupSQL)) {
    echo "Backup creado con éxito: $backupFile";
} else {
    echo "Error al crear el backup.";
}

$conn->close();
?>