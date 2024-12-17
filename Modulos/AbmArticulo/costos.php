<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

<?PHP    
function costos($conn, $id){
//TRAEMOS LOS DATOS DEL FORMULRIO
$focus='costo';    
    
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
    
<style>
  input[type="number"] {
    width: 100px; /* Ajusta el ancho según tus necesidades */
    height: 30px;
    font-size: 16px;
    box-sizing: border-box; /* Evita cambios de tamaño inesperados */
  }
</style>
    
    
    
<form action="abmArticulo.php?scr=costosmodif" method="post" name="form1" id="form1" autocomplete="on" title="form1">
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
			        <td width="310" align="left" bgcolor="#A1A1A1">
                        <input type="text" name="cod_ref" id="cod_ref" value="<?PHP echo $id; ?>" readonly /></td>
			        <td width="110" align="right" bgcolor="#A1A1A1">Ult. Mod.:</td>
			        <td width="249" align="left" bgcolor="#A1A1A1">
                        <input type="text" name="id_usuario" readonly id="id_usuario" value="<?PHP echo $VAL5; ?>" size="10" maxlength="10"><input name="fec_mod" type="date" readonly id="fec_mod" value="<?PHP echo $VAL4; ?>"></td>
		          </tr>
			      <tr>
			        <td align="left" bgcolor="#A1A1A1">Descripción:</td>
			        <td align="left" bgcolor="#A1A1A1"><input name="desc_larga" type="text" readonly id="desc_larga" value="<?PHP echo $VAL1; ?>" size="40" maxlength="40"></td>
			        <td align="right" bgcolor="#A1A1A1">Proveedor</td>
			        <td align="left" bgcolor="#A1A1A1"><input name="proveedor" type="text" readonly id="proveedor" value="<?PHP echo $VAL6; ?>"></td>
		          </tr>
			      <tr>
			        <td align="left" bgcolor="#A1A1A1">Cod. Barra:</td>
			        <td align="left" bgcolor="#A1A1A1"><input name="cod_bar" type="text" readonly id="cod_bar" value="<?PHP echo $VAL2; ?>"></td>
			        <td align="right" bgcolor="#A1A1A1">Cod.Bar.Prov.</td>
			        <td align="left" bgcolor="#A1A1A1"><input name="cod_prov" type="text" readonly id="cod_prov" value="<?PHP echo $VAL20; ?>"></td>
		          </tr>
			      <tr>
			        <td align="left" bgcolor="#A1A1A1">Tipo I.V.A.:</td>
			        <td align="left" bgcolor="#A1A1A1"><input name="iva" type="text" id="iva" value="<?PHP echo $VAL3; ?>" readonly></td>
			        <td align="right" bgcolor="#A1A1A1">Imp. Interno:</td>
			        <td align="left" bgcolor="#A1A1A1"><input name="imp_int" type="text" readonly id="imp_int" value="<?PHP echo $VAL7; ?>"></td>
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
			         <input type="number" name="costo" id="costo" onBlur="ponerCeroSiVacio(this,2), calcular()" value="<?PHP echo $VAL8; ?>" tabindex="1">
		            x Unidad</td>
			        <td width="123" align="right">Bonificaciones: </td>
			        <td width="249">%
			          <input name="porc_bonif" type="number"id="porc_bonif" max="1000" min="0" tabindex="2" onBlur="ponerCeroSiVacio(this,2), calcular()"  value="<?PHP echo $VAL9; ?>">
                      $<input type="text" name="imp_bonif" id="imp_bonif" size="10" maxlength="10" disabled="disabled" >
                      
                      </td>
		          </tr>
			      <tr>
			        <td width="205" align="center" bgcolor="#A1A1A1">Costo Neto</td>
			        <td width="205" align="center" bgcolor="#A1A1A1">Costo c/IVA</td>
			        <td align="right">Fletes o Gastos:</td>
			        <td>%
			          <input name="porc_flete" type="number" id="porc_flete" onBlur="ponerCeroSiVacio(this,2), calcular()"id="porc_bonif" tabindex="3" max="1000" min="0"  value="<?PHP echo $VAL10; ?>">
                      $<input name="imp_flete" type="text" id="imp_flete" size="10" maxlength="10" disabled="disabled" />
                                    
                      </td>
		          </tr>
			      <tr>
			        <td align="center" bgcolor="#A1A1A1"><input name="costoneto" type="text" readonly id="costoneto"></td>
			        <td align="center" bgcolor="#A1A1A1"><input name="costociva" type="text" readonly id="costociva"></td>
			        <td align="right">Cargos Financ.:</td>
			        <td>%
			          <input name="porc_cfin" type="number" id="porc_cfin" onBlur="ponerCeroSiVacio(this,2), calcular()" id="porc_bonif" tabindex="4" max="1000" min="0" value="<?PHP echo $VAL11; ?>">
                      $<input name="imp_cfin" type="text" id="imp_cfin" size="10" maxlength="10" disabled="disabled" />
                      
                      </td>
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
		            <input name="PA1" type="number" id="PA1" max="10000000" min="0" tabindex="5" onBlur="ponerCeroSiVacio(this,4), calcular()" value="<?PHP echo $VAL12; ?>"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1">$
		            <input name="IA1" type="number" max="1000000" min="0" readonly id="IA1" value="0"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1">$<input name="PSI1" type="number" max="1000000" min="0" readonly id="PSI1" value="0"></td>
			        <td height="21" align="center">$<input type="number" step="any" name="PV1" id="PV1" tabindex="6" onBlur="ponerCeroSiVacio(this,4), calcular2()" value="<?PHP echo $VAL16; ?>"></td>
		          </tr>
			      <tr>
			        <td height="21">Lista 2</td>
			        <td height="21">%
		            <input name="PA2" type="number" id="PA2" max="10000000" min="0" tabindex="7" onBlur="ponerCeroSiVacio(this,4), calcular()" value="<?PHP echo $VAL13; ?>"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1">$
		            <input name="IA2" type="number" max="1000000" min="0" readonly id="IA2" value="0"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1">$<input name="PSI2" type="number" max="1000000" min="0" readonly id="PSI2" value="0"></td>
			        <td height="21" align="center">$<input type="number" name="PV2" id="PV2" tabindex="8" onBlur="ponerCeroSiVacio(this,4), calcular2()"  value="<?PHP echo $VAL17; ?>"></td>
		          </tr>
			      <tr>
			        <td height="21">Lista 3</td>
			        <td height="21">%
		            <input name="PA3" type="number" id="PA3" max="10000000" min="0" tabindex="9" onBlur="ponerCeroSiVacio(this,4), calcular()" value="<?PHP echo $VAL14; ?>"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1">$
		            <input name="IA3" type="number" readonly id="IA3" max="1000000" min="0" value="0"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1">$<input name="PSI3" type="number" readonly id="PSI3" max="1000000" min="0" value="0"></td>
			        <td height="21" align="center">$<input type="number" name="PV3" id="PV3" tabindex="10" onBlur="ponerCeroSiVacio(this,4), calcular2()"  value="<?PHP echo $VAL18; ?>"></td>
		          </tr>
			      <tr>
			        <td height="21">Lista 4</td>
			        <td height="21">%
		            <input name="PA4" type="number" id="PA4" max="10000000" min="0" tabindex="11" onBlur="ponerCeroSiVacio(this,4), calcular()" value="<?PHP echo $VAL15; ?>"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1">$
		            <input name="IA4" type="number" readonly id="IA4" max="1000000" min="0" value="0"></td>
			        <td height="21" align="center" bgcolor="#A1A1A1">$<input name="PSI4" type="number" readonly id="PSI4" max="1000000" min="0" value="0"></td>
			        <td height="21" align="center">$<input type="number" name="PV4" id="PV4" tabindex="12" onBlur="ponerCeroSiVacio(this,4), calcular2()"  value="<?PHP echo $VAL19; ?>"></td>
		          </tr>
			      <tr>
			        <td height="26" colspan="5" align="center">&nbsp;</td>
		          </tr>
			      <tr>
			        <td height="26" colspan="5" align="center"><a href="abmArticulo.php" class="btn btn-outline-secondary">Cancela</a> - 
                <input type="submit" name="submit" id="submit" class="btn btn-outline-success" tabindex="13" value="Agregar Costo"></td>
		          </tr>
		        </tbody>
		      </table></td>
		    </tr>
		  </tbody>
	</table>
	</form>
    
    <script>
   
       
        
    function calcular(){
        //CARGAMOS LOS VALORES DEL FORMULARIO

        var iva = Number(document.getElementById('iva').value);
        var imp_int = Number(document.getElementById('imp_int').value);
        var costo = Number(document.getElementById('costo').value);
        
        var costociva = (((iva + imp_int) / 100)+1) * costo;
        
        costociva =(parseFloat(costociva).toFixed(4)).toString().split(". ");
        document.getElementById("costociva").value = costociva;
    
        //LEEMOS VALORES DE LOS PORCENTAJES DE BONIF, FLETE, CARGO FINANC
        var porc_bonif = Number(document.getElementById('porc_bonif').value);
        var porc_flete = Number(document.getElementById('porc_flete').value);
        var porc_cfin = Number(document.getElementById('porc_cfin').value);
        
        //CALCULAMOS EL BONIFICACION EN $
        var imp_bonif = (((porc_bonif / 100)+1)*costo) - costo;
        imp_bonif=Number((parseFloat(imp_bonif).toFixed(4)).toString().split(". "));
        document.getElementById("imp_bonif").value = imp_bonif;
        //CALCULAMOS EL FLETE EN $
        var imp_flete = (((porc_flete / 100)+1)*costo) - costo;
        imp_flete=Number((parseFloat(imp_flete).toFixed(4)).toString().split(". "));
        document.getElementById("imp_flete").value = imp_flete;
        //CALCULAMOS EL CARGOS FINANCIEROS EN $
        var imp_cfin = (((porc_cfin / 100)+1)*costo) - costo;
        imp_cfin=Number((parseFloat(imp_cfin).toFixed(4)).toString().split(". "));
        document.getElementById("imp_cfin").value = imp_cfin;
        
        var costoneto = costociva - imp_bonif + imp_flete + imp_cfin ;
        costoneto=Number((parseFloat(costoneto).toFixed(4)).toString().split(". "));
        document.getElementById("costoneto").value = costoneto;
        
        
        //CALCULAMOS EL PRECIO DE VENTA 1
        var PorcVta1 = Number(document.getElementById('PA1').value);
        var PreVta1 = Number(document.getElementById('PV1').value);
        var PorcVta2 = Number(document.getElementById('PA2').value);
        var PreVta2 = Number(document.getElementById('PV2').value);
        var PorcVta3 = Number(document.getElementById('PA3').value);
        var PreVta3 = Number(document.getElementById('PV3').value);
        var PorcVta4 = Number(document.getElementById('PA4').value);
        var PreVta4 = Number(document.getElementById('PV4').value);
        
        
        if (PorcVta1 <= 1) {
            document.getElementById("PV1").value = costoneto;
        } else  {
        var PrecVtaFinal1=costoneto + ((PorcVta1 * costoneto) /100);
        PrecVtaFinal1=Number((parseFloat(PrecVtaFinal1).toFixed(2)).toString().split(". "));           
        document.getElementById("PV1").value = PrecVtaFinal1;
        }
            
        //CALCULAMOS EL PRECIO DE VENTA 2
        if (PorcVta2 <= 1) {
        document.getElementById("PV2").value = costoneto;
        } else  {
        var PrecVtaFinal2=costoneto + ((PorcVta2 * costoneto) /100);
        PrecVtaFinal2=Number((parseFloat(PrecVtaFinal2).toFixed(2)).toString().split(". "));           
        document.getElementById("PV2").value = PrecVtaFinal2;    
        }
        //CALCULAMOS EL PRECIO DE VENTA 3
        if (PorcVta3 <= 1) {
        document.getElementById("PV3").value = costoneto;
        } else  {
        var PrecVtaFinal3=costoneto + ((PorcVta3 * costoneto) /100);
        PrecVtaFinal3=Number((parseFloat(PrecVtaFinal3).toFixed(2)).toString().split(". "));           
        document.getElementById("PV3").value = PrecVtaFinal3;    
        }
        //CALCULAMOS EL PRECIO DE VENTA 4
        if (PorcVta4 <= 1) {
        document.getElementById("PV4").value = costoneto;
        } else  {
        var PrecVtaFinal4=costoneto + ((PorcVta4 * costoneto) /100);
        PrecVtaFinal4=Number((parseFloat(PrecVtaFinal4).toFixed(2)).toString().split(". "));           
        document.getElementById("PV4").value = PrecVtaFinal4;    
        }
        
        
        //CALCULAMOS Importe de Aumento 
        var ImporAumento1 = PrecVtaFinal1 - costoneto; 
        ImporAumento1=Number((parseFloat(ImporAumento1).toFixed(2)).toString().split(". "));  
        document.getElementById("IA1").value = ImporAumento1;

        var ImporAumento2 = PrecVtaFinal2 - costoneto; 
        ImporAumento2=Number((parseFloat(ImporAumento2).toFixed(2)).toString().split(". "));  
        document.getElementById("IA2").value = ImporAumento2;
        
        var ImporAumento3 = PrecVtaFinal3 - costoneto; 
        ImporAumento3=Number((parseFloat(ImporAumento3).toFixed(2)).toString().split(". "));  
        document.getElementById("IA3").value = ImporAumento3;
        
        var ImporAumento4 = PrecVtaFinal4 - costoneto; 
        ImporAumento4=Number((parseFloat(ImporAumento4).toFixed(2)).toString().split(". "));  
        document.getElementById("IA4").value = ImporAumento4;
        
        //CALCULAMOS PRECIO SIN IVA
        
        var PreSIva1 = PrecVtaFinal1-((iva/100)*PrecVtaFinal1);
        PreSIva1=Number((parseFloat(PreSIva1).toFixed(2)).toString().split(". "));  
        document.getElementById("PSI1").value = PreSIva1;        
        
        var PreSIva2 = PrecVtaFinal2-((iva/100)*PrecVtaFinal2);
        PreSIva2=Number((parseFloat(PreSIva2).toFixed(2)).toString().split(". "));  
        document.getElementById("PSI2").value = PreSIva2;        

        var PreSIva3 = PrecVtaFinal3-((iva/100)*PrecVtaFinal3);
        PreSIva3=Number((parseFloat(PreSIva3).toFixed(2)).toString().split(". "));  
        document.getElementById("PSI3").value = PreSIva3;
        
        var PreSIva4 = PrecVtaFinal4-((iva/100)*PrecVtaFinal4);
        PreSIva4=Number((parseFloat(PreSIva4).toFixed(2)).toString().split(". "));  
        document.getElementById("PSI4").value = PreSIva4; 
        
    }
    function calcular2(){
        var CosNeto = Number(document.getElementById('costoneto').value); //PORCENTAJE
        var PorcVta1 = Number(document.getElementById('PA1').value); //PORCENTAJE
        var PreVta1 = Number(document.getElementById('PV1').value);  //PRE VTA
        var PorcVta2 = Number(document.getElementById('PA2').value); //PORCENTAJE
        var PreVta2 = Number(document.getElementById('PV2').value);  //PRE VTA
        var PorcVta3 = Number(document.getElementById('PA3').value); //PORCENTAJE
        var PreVta3 = Number(document.getElementById('PV3').value);  //PRE VTA
        var PorcVta4 = Number(document.getElementById('PA4').value); //PORCENTAJE
        var PreVta4 = Number(document.getElementById('PV4').value);  //PRE VTA
        
        
        
        var PorcVtaFinal1=((PreVta1 - CosNeto) / CosNeto) * 100;
        PorcVtaFinal1=Number((parseFloat(PorcVtaFinal1).toFixed(6)).toString().split(". "));           
        document.getElementById("PA1").value = PorcVtaFinal1;

        var PorcVtaFinal2=((PreVta2 - CosNeto) / CosNeto) * 100;
        PorcVtaFinal2=Number((parseFloat(PorcVtaFinal2).toFixed(6)).toString().split(". "));           
        document.getElementById("PA2").value = PorcVtaFinal2;
        
        var PorcVtaFinal3=((PreVta3 - CosNeto) / CosNeto) * 100;
        PorcVtaFinal3=Number((parseFloat(PorcVtaFinal3).toFixed(6)).toString().split(". "));           
        document.getElementById("PA3").value = PorcVtaFinal3;
        
        var PorcVtaFinal4=((PreVta4 - CosNeto) / CosNeto) * 100;
        PorcVtaFinal4=Number((parseFloat(PorcVtaFinal4).toFixed(6)).toString().split(". "));           
        document.getElementById("PA4").value = PorcVtaFinal4;
        
        calcular();
        
    }
        
    window.onload=calcular();
        
        
        
//coloca el atributo step any para poder enviar con decimales        
const numberInputs = document.querySelectorAll('input[type="number"]');

  // Agregar step="any" a cada uno
numberInputs.forEach(input => input.setAttribute('step', 'any'));
        
        
        
   document.form1.costo.focus();    
        
        
        
        
        
        
        
 </script>

    
    <?php } ?>   
<script>
document.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault(); // Evita el comportamiento predeterminado

        // Obtén el elemento actual con el foco
        const currentElement = document.activeElement;
        if (!currentElement) return;

        // Encuentra el siguiente elemento según el tabindex
        const tabindex = parseInt(currentElement.getAttribute('tabindex'), 10);
        if (!isNaN(tabindex)) {
            const nextElement = document.querySelector(`[tabindex="${tabindex + 1}"]`);
            if (nextElement) {
                nextElement.focus();
                if (typeof nextElement.select === 'function') {
                    nextElement.select(); // Selecciona el contenido si es posible
                }
            }
        }
    }
});

</script>   
</body>
</html>