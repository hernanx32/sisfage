<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén el valor de la selección
    $selection = isset($_POST['selection']) ? $_POST['selection'] : '';

    // Procesa el dato (por ejemplo, guardarlo en la base de datos o usarlo)
    // Aquí solo enviamos una respuesta
    echo "Has seleccionado: " . htmlspecialchars($selection);
}
?>
