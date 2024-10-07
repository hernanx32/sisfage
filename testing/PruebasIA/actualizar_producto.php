<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    $stmt = $conn->prepare("UPDATE productos SET nombre=?, descripcion=?, cantidad=?, precio=? WHERE id=?");
    $stmt->bind_param("ssiii", $nombre, $descripcion, $cantidad, $precio, $id);

    if ($stmt->execute()) {
        echo "Producto actualizado exitosamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id=$id";
    $result = $conn->query($sql);
    $producto = $result->fetch_assoc();
}

?>

<form method="post" action="actualizar_producto.php">
    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
    Nombre: <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required><br>
    Descripción: <textarea name="descripcion" required><?php echo $producto['descripcion']; ?></textarea><br>
    Cantidad: <input type="number" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required><br>
    Precio: <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required><br>
    <input type="submit" value="Actualizar Producto">
</form>
