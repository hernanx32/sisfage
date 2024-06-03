<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    $stmt = $conn->prepare("INSERT INTO productos (nombre, descripcion, cantidad, precio) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $nombre, $descripcion, $cantidad, $precio);

    if ($stmt->execute()) {
        echo "Producto agregado exitosamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<form method="post" action="agregar_producto.php">
    Nombre: <input type="text" name="nombre" required><br>
    Descripción: <textarea name="descripcion" required></textarea><br>
    Cantidad: <input type="number" name="cantidad" required><br>
    Precio: <input type="number" step="0.01" name="precio" required><br>
    <input type="submit" value="Agregar Producto">
</form>
