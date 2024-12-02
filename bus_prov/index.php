<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mostrar Valor y Etiqueta con Select2</title>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
  <label for="searchable-select2">Selecciona una opción:</label>
  <select id="searchable-select2" style="width: 200px;">
    <option value="1">Apple</option>
    <option value="2">Banana</option>
    <option value="3">Cherry</option>
    <option value="4">Date</option>
  </select>
  <br><br>
  <label for="result-input">Resultado:</label>
    <input type="text" id="input" placeholder="Valor" readonly>
    <input type="text" id="result" placeholder="Etiqueta" readonly>

  <script>
    $(document).ready(function () {
    const resultInput = $('#result');
    const resultInput2 = $('#input');
        
      const select2Element = $('#searchable-select2');

      select2Element.select2({
        placeholder: "Buscar...",
        allowClear: true
      });

      select2Element.on('select2:select', function (e) {
        const data = e.params.data;
          
        resultInput.val(`${data.text}`);
        resultInput2.val(`${data.id}`);  
          
      });

      select2Element.on('select2:clear', function () {
        resultInput.val('');
        resultInput2.val('');
      });
    });
  </script>
</body>
</html>
