<!doctype html>
<html>
<head>
	<?php
	include("Modulos/conex.php");
	?>

	<meta charset="utf-8">
	<title>Listados Comunes</title>
</head>

<body>
<?php echo 'Estado de Conexion:'. $EstCon;


	
$sql = "SELECT * FROM ARTICULOS WHERE ID='10'";
$resultado = $conexion->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    // Recorrer los datos
    while ($fila = $resultado->fetch_assoc()) {
        echo "ID: " . $fila["ID"] . "<br>";
        echo "Nombre: " . $fila["Nombre"] . "<br>";
        echo "Precio: " . $fila["Precio"] . "<br>";
        // Agrega aquí más campos si es necesario
        echo "<hr>";
    }
} else {
    echo "No se encontraron resultados.";
}

$conexion->close();
?>	
	</body>
</html>