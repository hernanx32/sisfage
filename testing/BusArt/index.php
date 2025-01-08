<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<form action="buscarArt.php" id="form1" name="form1" method="post">
<table width="500" border="0" align="center" summary="Buscador de Artiulos Avanzado para facturador y remitos">
  <caption>
    Buscador Articulo
  </caption>
  <tbody>
    <tr>
      <td width="156"><input name="BuscaArt" type="search" id="BuscaArt" tabindex="1" title="Buscar Articulo" size="30" maxlength="30"></td>
      <td width="162"><input name="btnBuscarArt" type=submit id="btnBuscarArt" form="form1" value="Buscar Articulo (F2)"></td>
      <td width="160">&nbsp;</td>
    </tr>
    <tr>
      <td>Detalle Articulo</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

</form>
<script>
	//COLOCA EL FOUS EN EL CAMPOR BuscaArt
	document.form1.BuscaArt.focus();
	
	//AL PRESIONAR F2 BUSQUE EL ARTICULO
	document.addEventListener('keydown', function(event) {
            if (event.key === 'F2') {
                event.preventDefault(); 
               form1.submit();			}});
	
	
	
	</script>	
</body>
</html>