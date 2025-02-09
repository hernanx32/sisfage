<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Código de Barras</title>
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <form id="form-articulo" method="POST">
        <label for="cod_bar">Código de Barras:</label>
        <input 
            type="text" 
            id="cod_bar" 
            name="cod_bar"
            placeholder="Introduce el código de barras"
        >
        <span id="error-cod_bar" class="error"></span>
        <br><br>
        <button type="submit">Enviar</button>
    </form>

    <script>
        // Función para hacer la validación AJAX
        document.getElementById("cod_bar").addEventListener("blur", function() {
            let codigo = this.value;
            
            if (codigo.trim() === "") {
                document.getElementById("error-cod_bar").textContent = "";
                return;
            }

            // Realizamos una solicitud AJAX a un script PHP para comprobar si el código existe
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "validar_codigo.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status === 200) {
                    let respuesta = xhr.responseText;
                    document.getElementById("error-cod_bar").textContent =respuesta;
                } else {
                    document.getElementById("error-cod_bar").textContent = "Error al validar el código.";
                }
            };
            xhr.send("cod_bar=" + encodeURIComponent(codigo));
        });
    </script>
</body>
</html>
