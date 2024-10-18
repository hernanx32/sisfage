<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<section>
        <?php
        // Cargar el módulo seleccionado      index.php?modulo=modulo1
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