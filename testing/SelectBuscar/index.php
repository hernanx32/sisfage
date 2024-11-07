<!DOCTYPE html> 
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

    <title>Seleccionar Marca</title>
</head>
<body>
    <form id="form1" name="form1" method="post">
        <select name="select" class="selectpicker" data-show-subtext="true" data-live-search="true" id="marcaSelect">
            <option value="" selected>Buscar Marca</option>
            <option value="1">Audi</option>
            <option value="2">BMW</option>
            <option value="3">Citroen</option>
            <option value="4">Fiat</option>
            <option value="5">Ford</option>
            <option value="6">Honda</option>
            <option value="7">Hyundai</option>
            <option value="8">Kia</option>
            <option value="9">Mazda</option>
        </select>
        -
        <label for="id_marca">ID:</label>
        <input name="id_marca" type="text" class="selectpicker" id="id_marca" size="5" maxlength="5" readonly>
    </form>

    <script>
        $(document).ready(function() {
            // Escuchar el cambio de selección en el select
            $('#marcaSelect').on('change', function() {
                // Obtener el valor del select (ID de la marca seleccionada)
                var idMarca = $(this).val();
                // Colocar el valor en el campo de texto id_marca
                $('#id_marca').val(idMarca);
            });
        });
    </script>
</body>
</html>