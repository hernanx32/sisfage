<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seleccionar y Mostrar</title>
</head>
<body>
  <select name="imp_int" id="imp_int">
    <option value="1" selected="selected">Formosa</option>
    <option value="2">Chaco</option>
    <option value="3">Salta</option>
    <option value="4">Jujuy</option>
    <option value="5">Mendoza</option>
    <option value="6">SantaFe</option>
    <option value="7">Buenos Aires</option>
    <option value="8">Tucuman</option>
    <option value="9">Corrientes</option>
    <option value="10">Misiones</option>
    <option value="11">Cordoba</option>
  </select>
  <input type="text" id="id_imp" placeholder="ID" size="5" maxlength="30" readonly="readonly">
  <input type="text" id="id_nomb" placeholder="Nombre" size="5" maxlength="30" readonly="readonly">

  <script>
    // Obtenemos las referencias de los elementos
    const selectElement = document.getElementById('imp_int');
    const idInput = document.getElementById('id_imp');
    const nameInput = document.getElementById('id_nomb');

    // Agregamos un evento para detectar cambios en el select
    selectElement.addEventListener('change', function () {
      // Actualizamos los valores en los inputs
      idInput.value = selectElement.value; // El valor del <option>
      nameInput.value = selectElement.options[selectElement.selectedIndex].text; // El texto del <option>
    });

    // Inicializamos con el valor seleccionado por defecto
    window.onload = function () {
      idInput.value = selectElement.value;
      nameInput.value = selectElement.options[selectElement.selectedIndex].text;
    };
  </script>
</body>
</html>