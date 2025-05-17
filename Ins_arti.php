<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	
	
	<table width="990" border="1" align="center">
        <tbody>
          <tr>
            <td>Codigo: 
              <input name="buscar_art" type="search" autofocus="autofocus" id="buscar_art" tabindex="1" size="30" maxlength="30"> 
              - 
              <input type="button" name="btn_buscar" id="btn_buscar" value="Buscar"> 
              - Cantidad: 
              <input name="canti" type="number" id="canti" max="1000" min="1" tabindex="2" value="1"></td>
          </tr>
          <tr>
            <td>Detalle: <?PHP echo 'Bujia Marca desconocida'; ?> - Precio: <?PHP echo '$ 1.050,00'; ?> - Stock: <?PHP echo '560.00'; ?> - 
              <input name="btn_agregar" type="button" id="btn_agregar" tabindex="3" value="Agregar"></td>
          </tr>
        </tbody>
      </table>
			<table width="990" border="1" align="center">
              <tbody>
                <tr>
                  <td width="100" bgcolor="#9D9D9D">Cod. Int.</td>
                  <td width="410" bgcolor="#9D9D9D">Detalle</td>
                  <td width="80" bgcolor="#9D9D9D">Cantidad</td>
                  <td width="150" bgcolor="#9D9D9D">Precio Unitario</td>
                  <td width="150" bgcolor="#9D9D9D">Precio Final</td>
                  <td width="50" bgcolor="#9D9D9D">Eliminar</td>
                </tr>
                <tr>
                  <td>554</td>
                  <td>BUJIA CBH8EH-9</td>
                  <td align="center">2</td>
                  <td align="right">$3,272.21</td>
                  <td align="right">$6,544.42</td>
                  <td align="center">X</td>
                </tr>
				<tr>
                  <td colspan="6">554</td>
                
                </tr>  
              </tbody>
      </table>	
	
</body>
</html>