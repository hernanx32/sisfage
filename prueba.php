<?PHP
include("Modulos/conex.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<form id="form1" name="form1" method="post">
  <p>
    <label for="buscar">Buscar:</label>
    <input type="search" name="buscar" id="buscar">
    <input name="btnBuscar" type="button" id="btnBuscar" value="Buscar">
  </p>
  

	<script>
	document.form1.buscar.focus();
	</script>
	
</form>
</body>
</html>