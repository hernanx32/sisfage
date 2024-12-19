<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	
	
	
	
<form id="form1" action="" name="form1" method="post">
  <p>Modificar datos</p>
  
    <p>
      <label for="cod_bar">codigo:</label>
      <input type="text" name="Cod_bar" id="Cod_bar">
    </p>
    <p>
      <label for="desc_corta">Descripcion Corta:</label>
      <input type="text" name="desc_corta" id="desc_corta">
    </p>
  <p>
      <label for="desc_larga">Descripcion Larga:</label>
      <input type="text" name="desc_larga" id="desc_larga">
    </p>	
  <p>
    <label for="IVA">Tipo de Iva:</label>
    <select name="IVA" id="IVA">
      <option value="1" selected="selected">21</option>
      <option value="2">10.5</option>
      <option value="3">17</option>
      <option value="4">18</option>
    </select>
  </p>
  <p>
    <label for="select">Rubro:</label>
    <select name="select" id="select">
      <option value="1" selected="selected">Varios</option>
      <option value="2">Repuesto</option>
    </select>
  </p>
<input type="submit">

	<?php
	//VALORES DEL FORMULARIO A CARGAR
	
	$cod_bar='111122223333';
	$desc_corta='Prueba';
	$desc_larga='Prueba Pruebita';
	$iva='3';
	$rubro='2';
	
	?>
	
  <script>
    // Pasar los valores de PHP a JavaScript usando elementos de datos
    const codBar = "<?php echo $cod_bar; ?>";
    const descCorta = "<?php echo $desc_corta; ?>";
    const descLarga = "<?php echo $desc_larga; ?>";
    const iva = "<?php echo $iva; ?>";
    const rubro = "<?php echo $rubro; ?>";

    // Rellenar los campos del formulario con JavaScript
    document.getElementById("Cod_bar").value = codBar;
    document.getElementById("desc_corta").value = descCorta;
    document.getElementById("desc_larga").value = descLarga;
    document.getElementById("IVA").value = iva;
    document.getElementById("select").value = rubro;
  </script>
	
	</form>
</body>
</html>