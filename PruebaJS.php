<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculos Automáticos</title>
    <style>
        input {
            font-size: 16px;
            padding: 8px;
            width: 80px;
            text-align: right;
            margin-bottom: 1px;
            display: block;
        }
    </style>
</head>
<body>
    <label for="currency1">Monto 1:</label>
    <input type="text" id="currency1" placeholder="0" />

    <label for="currency2">Monto 2:</label>
    <input type="text" id="currency2" placeholder="0" />

    <label for="currency3">Diferencia (Monto 3):</label>
    <input type="text" id="currency3" placeholder="0.0000" readonly />

    <label for="percentage">Porcentaje de diferencia:</label>
    <input type="text" id="percentage" placeholder="0.00%" readonly />

    <script>
    document.addEventListener("DOMContentLoaded", () => {
    const currency1Input = document.getElementById("currency1");
    const currency2Input = document.getElementById("currency2");
    const differenceInput = document.getElementById("currency3");
    const percentageInput = document.getElementById("percentage");

    const MIN_VALUE = 0;
    const MAX_VALUE = 1000000; // Ajusta según tus necesidades

    // Inicializar Monto 2 con el valor predeterminado
    currency2Input.value = "10.0000";

    // Función para manejar inputs de tipo moneda
    function handleCurrencyInput(input) {
        input.addEventListener("input", () => {
            let value = input.value;

            // Remover caracteres no válidos
            value = value.replace(/[^0-9.]/g, "");

            // Limitar un solo punto decimal
            const parts = value.split(".");
            if (parts.length > 2) {
                value = parts[0] + "." + parts[1];
            }

            // Limitar a 4 dígitos después del punto decimal
            if (parts[1]?.length > 4) {
                value = parts[0] + "." + parts[1].substring(0, 4);
            }

            // Validar rango mínimo y máximo
            const numericValue = parseFloat(value);
            if (!isNaN(numericValue)) {
                if (numericValue < MIN_VALUE) value = MIN_VALUE.toFixed(4);
                if (numericValue > MAX_VALUE) value = MAX_VALUE.toFixed(4);
            }

            input.value = value;

            // Actualizar cálculos
            calculateDifferenceAndPercentage();
        });

        input.addEventListener("blur", () => {
            if (input.value === "") {
                input.value = "0.0000";
            }
        });

        // Establecer valor inicial
        input.value = "0.0000";
    }

    // Función para manejar los cálculos automáticos
    function calculateDifferenceAndPercentage() {
        const value1 = parseFloat(currency1Input.value) || 0;
        const value2 = parseFloat(currency2Input.value) || 0;

        // Calcular la diferencia
        const difference = value1 - value2;
        differenceInput.value = difference.toFixed(4);

        // Calcular el porcentaje de diferencia (evitar división por cero)
        const percentage = value1 === 0 ? 0 : ((difference / value1) * 100);
        percentageInput.value = percentage.toFixed(2) + "%";
    }

    // Aplicar validación a Monto 1
    handleCurrencyInput(currency1Input);

    // Inicializar cálculos
    calculateDifferenceAndPercentage();
});
    </script>
</body>
</html>