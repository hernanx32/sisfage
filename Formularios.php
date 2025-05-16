<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario con Búsqueda</title>
</head>
<body>

</head>

<body>
	
<table width="1000" border="3" align="center">
  <tbody>
    <tr>
      <td width="450"> 
        <label for="date">Fecha:</label>
      <input name="date" type="date" id="date" value="<?php echo date('Y-m-d');?>" readonly="readonly"></td>
      <td width="78" rowspan="3"><img src="img/X.png" width="79" height="79" alt=""/></td>
      <td width="450">Sucursal: 
      <input name="id_sucu" type="text" id="id_sucu" value="001" size="8" maxlength="8" readonly="readonly"> 
      - 
      <input name="nomb_sucu" type="text" id="nomb_sucu" value="Casa Central" size="20" maxlength="30" readonly="readonly"></td>
    </tr>
    <tr>
      <td rowspan="3"><table width="450" border="0" align="center">
        <tbody>
          <tr>
            <td><input type="button" name="button" id="button" value="Buscar Cliente">
               <label for="id_cli">Nro:</label>
              <input name="id_cli" type="text" id="id_cli" value="1" size="10" maxlength="10" readonly="readonly"></td>
          </tr>
          <tr>
            <td><label for="Nomb_cli">R.Social:</label>
              <input name="Nomb_cli" type="text" id="Nomb_cli" value="Consumidor Final" size="20" maxlength="30" readonly="readonly"> 
              - 
              <input name="cuit_cli" type="text" id="cuit_cli" value="11-11111111-1" size="13" maxlength="15" readonly="readonly"></td>
          </tr>
          <tr>
            <td><label for="dire_cli">Dirección:</label>
              <input name="dire_cli" type="text" id="dire_cli" value="Sin Domicilio" size="30" maxlength="30" readonly="readonly"></td>
          </tr>
          </tbody>
      </table></td>
      <td>Nro. Compr:
      <input name="nro_comp1" type="text" id="nro_comp1" value="00001" size="8" maxlength="8" readonly="readonly"> 
      - 
      <input name="nro_comp2" type="text" id="nro_comp2" value="00000003" size="20" maxlength="30" readonly="readonly"></td>
    </tr>
    <tr>
      <td>Lista de Precio : 
      <input name="list_pre" type="text" id="list_pre" value="Lista 1" size="20" maxlength="20" readonly="readonly"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Vendedor: 
      <input name="id_vend" type="text" id="id_vend" value="000001" size="8" maxlength="8" readonly="readonly">
      - 
      <input name="nomb_vend" type="text" id="nomb_vend" value="Carranza Victor" size="20" maxlength="30" readonly="readonly"></td>
    </tr>
    <tr>
      <td colspan="3"><table width="990" border="0" align="center">
        <tbody>
          <tr>
            <td>Codigo: 
              <input name="buscar_art" type="search" autofocus="autofocus" id="buscar_art" tabindex="1" size="30" maxlength="30"> 
              - 
              <input type="button" name="btn_buscar" id="btn_buscar" value="Buscar"> 
              - Cantidad: 
              <input name="id_cli2" type="text" id="id_cli2" tabindex="2" value="1" size="10" maxlength="10" readonly="readonly"></td>
          </tr>
          <tr>
            <td>Detalle: <?PHP echo 'Bujia Marca desconocida'; ?> - Precio: <?PHP echo '$ 1.050,00'; ?> - Stock: <?PHP echo '560.00'; ?> - 
              <input name="btn_agregar" type="button" id="btn_agregar" tabindex="3" value="Agregar"></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="3">
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
              </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="3" align="right"> 
        <label for="sub_total">Sub-Total:</label>
      <input name="sub_total" type="text" id="sub_total" value="$ 6544.42" size="25" maxlength="30"></td>
    </tr>
    <tr>
      <td colspan="3"><table width="990" border="0">
        <tbody>
          <tr>
            <td width="627">Grupo Cliente: Clientes Final</td>
            <td width="353" align="right">Otros:
              <input name="sub_total2" type="text" id="sub_total2" value="$ 0.00" size="20" maxlength="20"></td>
          </tr>
          <tr>
            <td>Cta. Disponible: </td>
            <td align="right">Tarjetas:
              <input name="sub_total3" type="text" id="sub_total3" value="$ 0.00" size="20" maxlength="20"></td>
          </tr>
          <tr>
            <td>Saldo Disponible:</td>
            <td align="right">Efectivo:
              <input name="sub_total4" type="text" id="sub_total4" value="$ 10000.00" size="20" maxlength="20"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="right">Vuelto: 
              <input name="sub_total5" type="text" id="sub_total5" value="$ 3455.58" size="20" maxlength="20"></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>
    

