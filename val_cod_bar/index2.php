<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Código</title>
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <form id="form-articulo">
        <label for="cod_bar">Código de Barras:</label>
        <input type="text" id="cod_bar" name="cod_bar">
        <span id="error-cod_bar" class="error"></span>
        <br><br>
        <button type="submit">Guardar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#cod_bar").on("blur", function() {
                const codigo = $(this).val();
                if (codigo.trim() === "") return;

                // Realiza una solicitud AJAX al servidor para validar el código
                $.ajax({
                    url: "validar_codigo.php", // Archivo PHP en el servidor
                    method: "POST",
                    data: { cod_bar: codigo },
                    success: function(respuesta) {
                        if (respuesta === "repetido") {
                            $("#error-cod_bar").text("Este código ya está registrado.");
                        } else {
                            $("#error-cod_bar").text("");
                        }
                    },
                    error: function() {
                        $("#error-cod_bar").text("Error al validar el código.");
                    }
                });
            });
        });
    </script>
</body>
</html>
