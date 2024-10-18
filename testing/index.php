<?php
// index.php

// Muestra enlaces a diferentes módulos
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Modular en PHP</title>
</head>
<body>
    <h1>Sistema Modular</h1>
    
    <!-- Enlaces a los diferentes módulos -->
    <nav>
        <ul>
            <li><a href="index.php?modulo=modulo1">Módulo 1</a></li>
            <li><a href="index.php?modulo=modulo2">Módulo 2</a></li>
            <li><a href="index.php?modulo=modulo3">Módulo 3</a></li>
        </ul>
    </nav>

    <!-- Carga de módulos -->
    <section>
        <?php
        // Cargar el módulo seleccionado
        if (isset($_GET['modulo'])) {
            $modulo = $_GET['modulo'];
            $archivoModulo = "modulos/" . $modulo . ".php";

            // Verificar si el archivo del módulo existe
            if (file_exists($archivoModulo)) {
                include($archivoModulo);
            } else {
                echo "<p>Módulo no encontrado.</p>";
            }
        } else {
            echo "<p>Bienvenido, selecciona un módulo para cargar.</p>";
        }
        ?>
    </section>
</body>
</html>
