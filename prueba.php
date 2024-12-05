<?php
// Mostrar errores
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'bases');
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Verificar si es una solicitud AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax']) && $_POST['ajax'] === '1') {
    $codigo = $_POST['cod_bar'];

    // Consulta en la base de datos
    $sql = "SELECT * FROM articulo WHERE cod_bar = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $codigo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Responder a la solicitud AJAX
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        echo json_encode(['existe' => true, 'detalle' => $fila['desc_corta']]); // Ajusta la columna 'nombre'
    } else {
        echo json_encode(['existe' => false]);
    }
    $stmt->close();
    $conn->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar Código de Barras</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form id="form_codigo_barra" method="post">
        <label for="cod_bar">Código de Barras:</label>
        <input name="cod_bar" type="text" required="required" id="cod_bar" size="20" maxlength="20">
        <div id="mensaje_error" style="color: red; font-weight: bold;"></div><div id="mensaje_ok" style="color: green; font-weight: bold;"></div>
        <button type="submit">Enviar</button>
    </form>

    <script>
        $(document).ready(function () {
            $('#cod_bar').on('blur', function () {
                var codigo = $(this).val();

                if (codigo !== "") {
                    $.ajax({
                        url: window.location.href, // Llamar al archivo actual
                        method: 'POST',
                        data: { ajax: 1, cod_bar: codigo },
                        dataType: 'json',
                        success: function (respuesta) {
                            if (respuesta.existe) {
                                $('#mensaje_error').text('El código ya existe: ' + respuesta.detalle);
                            } else {
                                $('#mensaje_error').text('');
                            }
                        },
                        error: function () {
                            $('#mensaje_error').text('Error al verificar el código.');
                        }
                    });
                }
            });

            $('#form_codigo_barra').on('submit', function (e) {
                if ($('#mensaje_error').text() !== "") {
                    e.preventDefault();
                    alert('Por favor corrige el código de barras antes de enviar.');
                }
            });
        });
    </script>
</body>
</html>
