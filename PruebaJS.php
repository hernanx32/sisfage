<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>División Automática</title>
    <script>
        function calcularDivision() {
            // Obtener valores de los inputs
            const nro1 = parseFloat(document.getElementById("Nro1").value) || 0;
            const nro2 = parseFloat(document.getElementById("Nro2").value) || 0;
            
            // Calcular la división
            let resultado;
            if (nro2 !== 0) {
                resultado = nro1 / nro2;
            } else {
                resultado = "Error: Div/0"; // Mensaje para división por cero
               
            }
            
            // Mostrar el resultado en el input Res
            document.getElementById("Res").value = resultado;
        }
    </script>
</head>
<body>
    <form id="form1" name="form1" method="post" action="PruebaJS.php?scr=ac">
        <p>
            <label for="Nro1">Número 1:</label>
            <input type="number" name="Nro1" id="Nro1" value="0" oninput="calcularDivision()"><br>
            
            <label for="Nro2">Número 2:</label>
            <input type="number" name="Nro2" id="Nro2" value="0" oninput="calcularDivision()">
        </p>
        <p>
            <label for="Res">Resultado:</label>
            <input type="number" name="Res" id="Res" readonly>
        </p>
        <p>
            <input type="submit" name="accion" id="accion" value="enviar">
        </p>
    </form>
    
    
    <?php echo $_POST['Res'];?>
</body>
</html>
