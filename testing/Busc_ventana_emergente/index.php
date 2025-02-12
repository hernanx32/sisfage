<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "Bases");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener datos de la tabla
$query = "SELECT id_proveedor, nombre FROM proveedor";
$resultado = $conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select con Búsqueda</title>
    <!-- Incluir jQuery y Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>
<body>

    <form method="POST" action="procesar.php">
        <label for="producto">Selecciona un producto:</label>
        <select id="producto" name="producto" class="mi-select">
            <option value="">-- Seleccionar --</option>
            <?php while ($fila = $resultado->fetch_assoc()) { ?>
                <option value="<?= $fila['id_proveedor'] ?>"><?= $fila['nombre'] ?></option>
            <?php } ?>
        </select>
        <button type="submit">Enviar</button>
    </form>

    <script>
        $(document).ready(function() {
            $('.mi-select').select2({
                placeholder: "Buscar producto...",
                allowClear: true
            });
        });
    </script>

</body>
</html>
