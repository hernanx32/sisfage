<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
    <script>
        function abrirBusqueda() {
            var popup = window.open("buscar_cliente.php", "Busqueda", "width=600,height=400");
        }

        function seleccionarCliente(id, nombre) {
            window.opener.document.getElementById('id_cliente').value = id;
            window.opener.document.getElementById('nomb_cliente').value = nombre;
            window.close();
        }
    </script>
	
	
	<form id="form1" name="form1" method="post">
	  <table width="1200" border="1" align="center">
	    <tbody>
	      <tr>
	        <td width="648">Sistema de Ventas</td>
	        <td width="536" align="right">Fecha
	          <label for="date">:</label>
            <input name="date" type="date" id="date" value="<?PHP echo date("Y-m-d") ?>" readonly="readonly"></td>
          </tr>
	      <tr>
	        <td><label for="Cliente">Cliente:</label>
            <input name="id_cliente" type="text" id="id_cliente" value="0001" size="4" maxlength="4">
            <label for="nomb_cliente">-</label>
            <input name="nomb_cliente" type="text" id="nomb_cliente" value="Consumidor Final">
            <input type="button" name="button" id="button" value="Buscar" onclick="abrirBusqueda()"></td>
	        <td>
	          <label for="tipo_comp">Tipo de Comprobante:</label>
              <select name="tipo_comp" disabled="disabled" id="tipo_comp">
                <option value="X" selected="selected">X</option>
                <option value="NCX">NCX</option>
            </select></td>
          </tr>
	      <tr>
	        <td><label for="cli_domi">Domicilio:</label>
            <input type="text" name="cli_domi" id="cli_domi"></td>
	        <td>Nro. Comprobante: 
	          <input name="nro_rem1" type="text" id="nro_rem1" value="00001" size="6" maxlength="6" readonly="readonly">
              <label for="nro_rem3">-</label>
            <input name="nro_rem2" type="text" id="nro_rem3" value="0000000001" size="10" maxlength="10" readonly="readonly"></td>
          </tr>
	      <tr>
	        <td><label for="select">L. Precio:</label>
              <select name="select" disabled="disabled" id="select">
                <option value="Lista1" selected="selected">Lista1</option>
                <option value="Lista2">Lista2</option>
                <option value="Lista3">Lista3</option>
                <option value="Lista4">Lista4</option>
            </select></td>
	        <td><label for="Sucursal">Sucursal:</label>
            <input name="Sucursal" type="text" id="Sucursal" readonly="readonly"></td>
          </tr>
	      <tr>
	        <td colspan="2"><label for="busc_art">Agregar Articulo</label>
            <input name="busc_art" type="text" id="busc_art" placeholder="Buscar...">
            <label for="Canti">Cant.:</label>
            <input name="Canti" type="number" required="required" id="Canti" max="1000" min="1" value="1"></td>
          </tr>
	      <tr>
	        <td colspan="2">&nbsp;</td>
          </tr>
        </tbody>
      </table>
</form>
</body>
</html>