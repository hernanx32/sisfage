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
    
<?PHP   
//$id=$_GET['id'];    
$id='6';
  
    
$sql = "SELECT * FROM articulo WHERE id_articulo = $id";
$resultado = $conn->query($sql);
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $VAL1=$fila['desc_larga'];
        $VAL2=$fila['cod_bar'];
        $VAL3=$fila['iva'];
        $VAL4=$fila['fec_act'];
        $VAL5=$fila['id_usuario'];
        $VAL6=$fila['id_proveedor'];
        
        $VAL20=$fila['cod_bar_prov'];
        
        $VAL7=$fila['porc_imp_int'];
        $VAL8=$fila['costo'];
        $VAL9=$fila['porc_bonific'];
        $VAL10=$fila['porc_flete'];
        $VAL11=$fila['porc_cargo_finan'];
        $VAL12=$fila['porc_precio1'];
        $VAL13=$fila['porc_precio2'];
        $VAL14=$fila['porc_precio3'];
        $VAL15=$fila['porc_precio4'];
        $VAL16=$fila['precio1'];
        $VAL17=$fila['precio2'];
        $VAL18=$fila['precio3'];
        $VAL19=$fila['precio4']; 
        }
    } else {
    echo "Error al obtener el ID del Articulo";
    sleep(10);    
    header("location:abmArticulo.php");
    }
    ?>
    

    
    
    
<form action="abmArticulo.php" method="post" id="form1" autocomplete="on" title="form1">
	<table width="880" border="1" align="center">
	  <caption>&nbsp;</caption>
		  <tbody>
			<tr>
			  <th height="133"><table width="800" border="0" align="center">
			    <tbody>
			      <tr>
			        <th colspan="4">Datos del Articulo</th>
		          </tr>
			      <tr>
			        <td width="113" align="left" bgcolor="#A1A1A1">Cod. Ref.:</td>
			        <td width="310" align="left" bgcolor="#A1A1A1"><input name="cod_ref" type="number" disabled="disabled" id="cod_ref" value="<?PHP echo $id; ?>"></td>
			        <td width="110" align="right" bgcolor="#A1A1A1">Ult. Mod.:</td>
			        <td width="249" align="left" bgcolor="#A1A1A1"><input name="textfield4" type="text" disabled="disabled" id="textfield4" value="<?PHP echo $VAL5; ?>" size="10" maxlength="10"><input name="fec_mod" type="date" disabled="disabled" id="fec_mod" value="<?PHP echo $VAL4; ?>"></td>
		          </tr>
			      <tr>
			        <td align="left" bgcolor="#A1A1A1">Descripción:</td>
			        <td align="left" bgcolor="#A1A1A1"><input name="desc_larga" type="text" disabled="disabled" id="desc_larga" value="<?PHP echo $VAL1; ?>" size="40" maxlength="40"></td>
			        <td align="right" bgcolor="#A1A1A1">Proveedor</td>
			        <td align="left" bgcolor="#A1A1A1"><input name="proveedor" type="text" disabled="disabled" id="proveedor" value="<?PHP echo $VAL6; ?>"></td>
		          </tr>
			      <tr>
			        <td align="left" bgcolor="#A1A1A1">Cod. Barra:</td>
			        <td align="left" bgcolor="#A1A1A1"><input name="cod_bar" type="text" disabled="disabled" id="cod_bar" value="<?PHP echo $VAL2; ?>"></td>
			        <td align="right" bgcolor="#A1A1A1">Cod.Bar.Prov.</td>
			        <td align="left" bgcolor="#A1A1A1"><input name="cod_prov" type="text" disabled="disabled" id="cod_prov" value="<?PHP echo $VAL20; ?>"></td>
		          </tr>
			      <tr>
			        <td align="left" bgcolor="#A1A1A1">Tipo I.V.A.:</td>
			        <td align="left" bgcolor="#A1A1A1"><input name="iva" type="text" disabled="disabled" id="iva" value="<?PHP echo $VAL3; ?>"></td>
			        <td align="right" bgcolor="#A1A1A1">Imp. Interno:</td>
			        <td align="left" bgcolor="#A1A1A1"><input name="imp_int" type="text" disabled="disabled" id="imp_int" value="<?PHP echo $VAL7; ?>"></td>
		          </tr>
		        </tbody>
		      </table></th>
		    </tr>
			<tr>
			  <td><table width="800" border="0" align="center">
			    <tbody>
			      <tr>
			        <th colspan="4">Composición de Costos</th>
		          </tr>
			      <tr>
			        <td colspan="2">Costo sin I.V.A. : 
			          <input name="costo" type="number" id="costo" value="<?PHP echo $VAL8; ?>" max="1000000" min="0">
		            x Unidad</td>
			        <td width="123" align="right">Bonificaciones: </td>
			        <td width="249">%
			          <input name="bonif" type="number" id="bonif" value="<?PHP echo $VAL9; ?>"></td>
		          </tr>
			      <tr>
			        <td width="205" align="center" bgcolor="#A1A1A1">Costo Neto</td>
			        <td width="205" align="center" bgcolor="#A1A1A1">Costo c/IVA</td>
			        <td align="right">Fletes o Gastos:</td>
			        <td>%
			          <input name="flete" type="number" id="flete" value="<?PHP echo $VAL10; ?>"></td>
		          </tr>
			      <tr>
			        <td align="center" bgcolor="#A1A1A1"><input name="costoneto" type="text" disabled="disabled" id="costoneto"></td>
			        <td align="center" bgcolor="#A1A1A1"><input name="costociva" type="text" disabled="disabled" id="costociva"></td>
			        <td align="right">Cargos Financ.:</td>
			        <td>%
			          <input name="carg_finac" type="number" id="carg_finac" value="<?PHP echo $VAL11; ?>"></td>
		          </tr>
		        </tbody>
		      </table></td>
		    </tr>
			<tr>
			  <td><table width="800" border="0" align="center">
			    <tbody>
			      <tr>
			        <th colspan="5" scope="col">Precio de Venta</th>
		          </tr>
			      <tr>
			        <td width="56" height="21">&nbsp;</td>
			        <td width="165" align="center">Aumento en Porc.</td>
			        <td width="188" align="center">Importe de Aumento</td>
			        <td width="169" align="center">Precios sin I.V.A.</td>
			        <td width="200" align="center">Precio de Venta </td>
		          </tr>
			      <tr>
			        <td height="21">Lista 1</td>
			        <td height="21">%
		            <input name="PA1" type="number" id="PA1" max="10000000" min="0" value="<?PHP echo $VAL12; ?>"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1">$
		            <input name="IA1" type="number" disabled="disabled" id="IA1" max="1000000" min="0" value="0"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1"><input name="PSI1" type="number" disabled="disabled" id="PSI1" max="1000000" min="0" value="0"></td>
			        <td height="21" align="center"><input type="number" name="PV1" id="PV1" value="<?PHP echo $VAL16; ?>"></td>
		          </tr>
			      <tr>
			        <td height="21">Lista 2</td>
			        <td height="21">%
		            <input name="PA2" type="number" id="PA2" max="10000000" min="0" value="<?PHP echo $VAL13; ?>"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1">$
		            <input name="IA2" type="number" disabled="disabled" id="IA2" max="1000000" min="0" value="0"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1"><input name="PSI2" type="number" disabled="disabled" id="PSI2" max="1000000" min="0" value="0"></td>
			        <td height="21" align="center"><input type="number" name="PV2" id="PV2" value="<?PHP echo $VAL17; ?>"></td>
		          </tr>
			      <tr>
			        <td height="21">Lista 3</td>
			        <td height="21">%
		            <input name="PA3" type="number" id="PA3" max="10000000" min="0" value="<?PHP echo $VAL14; ?>"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1">$
		            <input name="IA3" type="number" disabled="disabled" id="IA3" max="1000000" min="0" value="0"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1"><input name="PSI3" type="number" disabled="disabled" id="PSI3" max="1000000" min="0" value="0"></td>
			        <td height="21" align="center"><input type="number" name="PV3" id="PV3" value="<?PHP echo $VAL18; ?>"></td>
		          </tr>
			      <tr>
			        <td height="21">Lista 4</td>
			        <td height="21">%
		            <input name="PA4" type="number" id="PA4" max="10000000" min="0" value="<?PHP echo $VAL15; ?>"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1">$
		            <input name="IA4" type="number" disabled="disabled" id="IA4" max="1000000.000" min="0.000" value="0"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1"><input name="PSI4" type="number" disabled="disabled" id="PSI4" max="1000000" min="0" value="0"></td>
			        <td height="21" align="center"><input type="number" class="validar" max="1000.000" min="0.000" name="PV4" id="PV4" value="<?PHP echo $VAL19; ?>"></td>
		          </tr>
			      <tr>
			        <td height="26" colspan="5" align="center">&nbsp;</td>
		          </tr>
			      <tr>
			        <td height="26" colspan="5" align="center"><a href="abmArticulo.php" class="btn btn-outline-secondary">Cancela</a> - 
                <input type="submit" name="submit" id="submit" class="btn btn-outline-success" value="Agregar Costo"></td>
		          </tr>
		        </tbody>
		      </table></td>
		    </tr>
		  </tbody>
	</table>
	</form>
    
    <script>
        // Seleccionar todos los inputs con la clase "validar"
        const inputs = document.querySelectorAll('.validar');

        // Función para validar el rango de un input
        const validateRange = (inputElement) => {
            const min = parseFloat(inputElement.min); // Obtener el mínimo como decimal
            const max = parseFloat(inputElement.max); // Obtener el máximo como decimal
            const value = parseFloat(inputElement.value); // Convertir el valor actual a decimal

            // Si el valor está vacío, establecer a "0"
            if (isNaN(value) || inputElement.value.trim() === '') {
                inputElement.value = '0';
            } 
            // Validar que el valor esté dentro del rango
            else if (value < min) {
                inputElement.value = min.toFixed(2); // Asigna el valor mínimo
            } else if (value > max) {
                inputElement.value = max.toFixed(2); // Asigna el valor máximo
            }
        };

        // Agregar listeners a cada input
        inputs.forEach(input => {
            // Validar al perder el foco
            input.addEventListener('blur', () => validateRange(input));

            // Validar mientras el usuario escribe
            input.addEventListener('input', () => {
                // Permitir solo números, un punto y un signo negativo
                input.value = input.value.replace(/[^0-9.-]/g, '');

                // Evitar múltiples puntos o signos negativos
                const parts = input.value.split('.');
                if (parts.length > 2) {
                    input.value = parts[0] + ',' + parts.slice(1).join(''); // Solo permite un punto
                }
                if (input.value.indexOf('-') > 0) {
                    input.value = input.value.replace('-', ''); // Eliminar signos negativos en posiciones incorrectas
                }
            });
        });
    </script>
            
            
            
            
            
    </script>	
	
</body>
</html>