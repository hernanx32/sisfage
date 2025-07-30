<?php include('conexion.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>ABM IVA</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<h2>Agregar IVA</h2>
<form id="form-iva">
    Nombre: <input type="text" name="nombre" required>
    Porcentaje: <input type="number" step="0.01" name="porcentaje" required>
    <input type="submit" value="Agregar">
</form>

<h2>Listado</h2>
<table border="1" width="50%" id="tabla-iva">
    <thead>
        <tr><th>Nombre</th><th>Porcentaje</th><th>Acciones</th></tr>
    </thead>
    <tbody>
        <?php
        $res = $conexion->query("SELECT * FROM iva");
        while ($row = $res->fetch_assoc()) {
            echo "<tr data-id='{$row['id_iva']}'>
                <td contenteditable='true' class='edit-nombre'>{$row['nombre']}</td>
                <td contenteditable='true' class='edit-porcentaje'>{$row['porcentaje']}</td>
                <td><button class='borrar'>Eliminar</button></td>
            </tr>";
        }
        ?>
    </tbody>
</table>

<script src="script.js"></script>
</body>
</html>
