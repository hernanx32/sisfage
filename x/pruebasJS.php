<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Prueba</title>
  
	<script src="js/formularios.js"></script>
  </head>
	
<body>
<form>
<table width="650" border="1">
  <tbody>
    <tr>
      <th colspan="2" align="left" scope="col">Funciones JS de Formularios</th>
      </tr>
    <tr>
      <td width="248" align="left"><input name="Nombre1" type="text" id="Nombre1" autocomplete="off" onkeyup="txtMayuscula('Nombre1')"></td>
      <td width="386" align="left">Poner en Mayuscula cuando se sale del campo de texto</td>
      </tr>
    <tr>
      <td align="left"><input type="text" id="nombre2" oninput="txtMayuscula('nombre2')"></td>
      <td align="left">Siempre coloca en Mayusculas</td>
    </tr>
    <tr>
      <td align="left">
		$
		<input type="number" id="numero" min="0" step="0.01" onblur="ponerCeroSiVacio(this, '2')" value="0">

      <td align="left">Numeros Para Monedas</td>
    </tr>
    <tr>
      <td align="left"><label for="costo">Costo $</label>
        <input name="costo" type="number" id="costo" min="0" step="0.01" onblur="ponerCeroSiVacio(this, '6')" value="0"></td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="left">
		<label for="val1">Val1</label>
        <input name="val1" type="number" id="val1" min="0" step="0.01" onblur="ponerCeroSiVacio(this, '2')" value="0">
		</td>
      <td align="left">
		<label for="val2">Val2</label>
        <input name="val2" type="number" id="val2" min="0" step="0.01" onblur="ponerCeroSiVacio(this, '2')" value="0">
		</td>
    </tr>
    <tr>
      <td align="left">
		<label for="val3">Val3</label>
        <input name="val3" type="number" id="val3" min="0" step="0.01" onblur="ponerCeroSiVacio(this, '2')" value="0">
		</td>
      <td align="left">
		<label for="val4">Val1</label>
        <input name="val4" type="number" id="val4" min="0" step="0.01" onblur="ponerCeroSiVacio(this, '2')" value="0">
		</td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
  </tbody>
</table>
</form>
	
</body>	
</html>	