<?PHP
include("../Modulos/conex.php");
?>

<!doctype html>
<html lang='es'>
<head>
<meta charset="utf-8">
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>Documento sin título</title>
</head>

<body>

	
<form id="form1" name="form1" action="buscar.php"A method="get">
  <p>
    <label for="buscar">Buscar:</label>
    <input type="search" name="buscar" id="buscar">
    <input name="btnBuscar" type="button" id="btnBuscar" onclick="abrirVentanaBusqueda()" value="Buscar">
  </p>
 
    <script>
        // JavaScript maneja los atajos de teclado
        document.addEventListener('keydown', function(event) {
            if (event.ctrlKey && event.key === 's') {
                event.preventDefault(); // Evita la acción predeterminada del navegador
                alert('¡Atajo Ctrl+S activado!');
            } else if (event.altKey && event.key === 'a') {
                alert('¡Atajo Alt+A activado!');
            }
        });
    </script>
</head>
<body>
    <h1>Ejemplo de atajos de teclado</h1>
    <p>Pulsa <b>Ctrl+S</b> o <b>Alt+A</b> para activar un atajo.</p>
</body>
</html>	
	

	<script>
	document.form1.buscar.focus();
	</script>
	
</form>
</body>
</html>



