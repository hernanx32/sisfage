<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Aumento</title>
</head>
<body>
    <form>
        <label for="costo">Costo:</label>
        <input type="number" id="costo" name="costo" value="100"><br><br>

      <label for="porcentaje">Aumento en porcentaje:</label>
        <input name="porcentaje" type="text" id="porcentaje" placeholder="Porcentaje" min="0" ><br><br>

      <label for="importe">Aumento en importe:</label>
        <input name="importe" type="text" id="importe" placeholder="Importe" min="0"><br><br>
    </form>

    <script>
	
// Obtener los elementos del formulario
const costoInput = document.getElementById('costo');
const porcentajeInput = document.getElementById('porcentaje');
const importeInput = document.getElementById('importe');

// Función para actualizar los valores
function actualizarValores() {
    let costo = parseFloat(costoInput.value) || 0;
    let porcentaje = parseFloat(porcentajeInput.value) || 0;
    let importe = parseFloat(importeInput.value) || 0;

    // Si se ha ingresado un porcentaje, calcular el importe
    if (porcentaje > 0) {
        importe = costo + (costo * porcentaje / 100);
        importeInput.value = importe.toFixed(2);
    }
    // Si se ha ingresado un importe, calcular el porcentaje
    else if (importe > 0) {
        porcentaje = ((importe - costo) / costo) * 100;
        porcentajeInput.value = porcentaje.toFixed(2);
    }
}

// Detectar cambios en el campo "Costo"
costoInput.addEventListener('input', function () {
    actualizarValores();
});

// Detectar cambios en el campo "Porcentaje"
porcentajeInput.addEventListener('input', function () {
    let costo = parseFloat(costoInput.value) || 0;
    let porcentaje = parseFloat(porcentajeInput.value) || 0;
    if (porcentaje > 0) {
        actualizarValores();
    }
});

// Detectar cambios en el campo "Importe"
importeInput.addEventListener('input', function () {
    let costo = parseFloat(costoInput.value) || 0;
    let importe = parseFloat(importeInput.value) || 0;
    if (importe > 0) {
        actualizarValores();
    }
});

	
	</script>
</body>
</html>
