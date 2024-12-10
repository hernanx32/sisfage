<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
<?PHP $ValorInicial = '1986';?>
<body>
	
	<form id="form1" name="form1" method="post">
	  <label for="LA1">Datos Auto:</label>
    <input type="text" name="LA1" id="LA1"><br>
	<input type="text" name="LA2" id="LA2">
		
</form>
	
<script>
	document.getElementById('LA1').value = '<?PHP echo $ValorInicial?>';
	
	</script>
	
	
</body>
</html>