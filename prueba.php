<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        #id_imp, #id_nomb {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <label for="imp_int">Selecciona una provincia:</label>
    <select name="imp_int" id="imp_int">
        <option value="1" selected="selected">Formosa</option>
        <option value="2">Chaco</option>
        <option value="3">Salta</option>
        <option value="4">Jujuy</option>
        <option value="5">Mendoza</option>
        <option value="6">Santa Fe</option>
        <option value="7">Buenos Aires</option>
        <option value="8">Tucumán</option>
        <option value="9">Corrientes</option>
        <option value="10">Misiones</option>
        <option value="11">Córdoba</option>
    </select>

    <input type="text" id="id_imp" placeholder="ID" size="5" maxlength="30" readonly="readonly">
    <input type="text" id="id_nomb" placeholder="Nombre" size="15" maxlength="30" readonly="readonly">

    <script>
        // Referencia al elemento select y campos de texto
        const selectElement = document.getElementById('imp_int');
        const idField = document.getElementById('id_imp');
        const nameField = document.getElementById('id_nomb');

        // Actualizar los campos de texto cuando cambia la selección
        selectElement.addEventListener('change', () => {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            idField.value = selectedOption.value; // Establecer el valor del ID
            nameField.value = selectedOption.text; // Establecer el texto del nombre
        });

        // Inicialización: Mostrar los valores iniciales
        window.onload = () => {
            const initialOption = selectElement.options[selectElement.selectedIndex];
            idField.value = initialOption.value;
            nameField.value = initialOption.text;
        };
    </script>
</body>
</html>