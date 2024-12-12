<?php
// Configuración de la base de datos
$host = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "bases";

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario, $clave, $baseDeDatos);

// Verificamos la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibimos el valor del código de barras
$codigo = isset($_POST['cod_bar']) ? trim($_POST['cod_bar']) : '';

if (!empty($codigo)) {
    // Preparamos la consulta para verificar si el código de barras existe
    $consulta = $conexion->prepare("SELECT COUNT(*) FROM articulo WHERE cod_bar = ?");
    $consulta->bind_param("s", $codigo);
    $consulta->execute();
    $consulta->bind_result($count);
    $consulta->fetch();
    $consulta->close();

    // Verificamos el resultado de la consulta
    if ($count > 0) {
        echo "¡¡¡Este código de barras ya está registrado!!!";
        } else {
        echo "OK"; // No hay error si no se repite
     
    }
} else {
    echo "El código de barras no puede estar vacío.";
}

$conexion->close();
?>
