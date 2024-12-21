<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Aumento</title>
</head>
<body>
    <form>
        <label for="desc_corta">Desc. Corta:</label>
        <input type="text" id="desc_corta" name="desc_corta" tabindex="1" >

      <label for="desc_larga">Desc Larga:</label>
        <input type="text" name="desc_larga" id="desc_larga" tabindex="2"><br><br>

      <label for="importe">Aumento en importe:</label>
        <input name="importe" type="text" id="importe" placeholder="Importe" min="0"><br><br>
    </form>

    <script>
	
	document.getElementById('desc_corta').addEventListener('blur', function () {
        const descCortaValue = this.value;
        document.getElementById('desc_larga').value = descCortaValue;
    });

	
	</script>
</body>
</html>
