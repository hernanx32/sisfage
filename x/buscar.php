<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda</title>
    <script>
        function seleccionarResultado(valor) {
            window.opener.resultadoSeleccionado = valor;
            window.close();
        }
    </script>
</head>
<body>
    <h1>Resultados de la búsqueda</h1>
    <ul>
        <li><button onclick="seleccionarResultado('Resultado 1')">Resultado 1</button></li>
        <li><button onclick="seleccionarResultado('Resultado 2')">Resultado 2</button></li>
        <li><button onclick="seleccionarResultado('Resultado 3')">Resultado 3</button></li>
    </ul>
</body>
</html>
