<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<form action="index.php" method="get" name="Buscar" id="Buscar">
  <input name="busc_art" type="search" id="busc_art" form="Buscar" placeholder="Buscar Articulo" tabindex="1" autocomplete="off" size="20">
	Cant.: <input name="cant." type="number" id="cant." max="1000" min="1" tabindex="2" value="1" >
</form>

<br>
<form action="index.php" method="get" name="agregarArt" id="Buscar">
  <input name="art" type="search" autofocus="autofocus" id="art" form="Buscar" tabindex="1" autocomplete="off" size="20">
</form>	
	
	
	
	<script>
document.Buscar.busc_art.focus();
	
	</script>
</body>
</html>