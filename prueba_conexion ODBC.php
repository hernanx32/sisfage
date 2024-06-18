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
	echo 'PHP Architecture: ' . PHP_INT_SIZE * 8 . ' bits' . PHP_EOL;


// Configuración de la cadena de conexión ODBC sin DSN
$driver = 'Driver={C:\Program Files (x86)\Sybase\SQL Anywhere 9\win32\dbodbc9.dll};Host=192.168.100.199:2638;ServerName=ServerAPA;DatabaseName=dba;UserID=dba;Password=gestion;}'; // Reemplaza con el nombre del controlador ODBC adecuado
$server = '192.168.100.199'; // Reemplaza con el nombre de tu servidor
$database = 'dba'; // Reemplaza con el nombre de tu base de datos
$user = 'dba'; // Reemplaza con tu nombre de usuario
$password = 'gestion'; // Reemplaza con tu contraseña

// Crear la cadena de conexión
$connectionString = "Driver=$driver;Server=$server;Database=$database;";

// Intentar la conexión a la base de datos
$connection = odbc_connect($connectionString, $user, $password);

if (!$connection) {
    die("Error de conexión: " . odbc_errormsg());
}

echo "Conexión exitosa a la base de datos.";

// Ejemplo de consulta SELECT
$sql = "SELECT * FROM your_table"; // Reemplaza 'your_table' con el nombre de tu tabla
$result = odbc_exec($connection, $sql);

if (!$result) {
    die("Error al realizar la consulta: " . odbc_errormsg());
}

// Obtener y mostrar los resultados
while ($row = odbc_fetch_array($result)) {
    echo "ID: " . $row['NroReg'] . " - Nombre: " . $row['cDetalle'] . "<br>";
}

// Cerrar la conexión
odbc_close($connection);

		
		
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