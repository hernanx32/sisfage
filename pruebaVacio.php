<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminLTE DataTable Example</title>
    <!-- jQuery -->
    
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <!-- AdminLTE (opcional, si quieres usar estilos de AdminLTE) -->
    <link rel="stylesheet" href="path/to/adminlte.min.css">
</head>


<body>

<?php
// Ruta completa al archivo .mdb
$databasePath = 'D:\\New\\TRANSPORTE.mdb'; // Reemplaza con la ruta a tu archivo .mdb

// Cadena de conexión ODBC sin DSN
$dsn = "DRIVER={Microsoft Access Driver (*.mdb, *.accdb)};DBQ=$databasePath;";

// Intentar la conexión a la base de datos
$connection = odbc_connect($dsn, '', '');

if (!$connection) {
    die("Error de conexión: " . odbc_errormsg());
}

echo "Conexión exitosa a la base de datos.";

// Ejemplo de consulta SELECT
$sql = "SELECT * FROM articulo"; // Reemplaza 'your_table' con el nombre de tu tabla en Access
$result = odbc_exec($connection, $sql);

if (!$result) {
    die("Error al realizar la consulta: " . odbc_errormsg());
}

// Obtener y mostrar los resultados
while ($row = odbc_fetch_array($result)) {
    echo "ID: " . $row['Cref'] . " - Nombre: " . $row['cDetalle'] . "<br>"; // Reemplaza con los nombres de tus columnas
}
?>
    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [[0, "desc"]]
        });
    });
    </script>
</body>
</html>