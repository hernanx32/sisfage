<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
 
<script src="js/jquery-3.6.0.min.js">	</script>
<script src="js/AltaArticulos.js"></script>

	</head>


<body>
<form action="/ArticuloAlta2.php" method="post" id="form1">	
<table width="780" border="1" align="center">
  <caption>Alta Articulo</caption>
	<tbody>
    <tr>
      <td>
	<table width="770" border="0">
         <tr>
            <td width="126" align="right"><label for="cref">Cod.Referencia:</label></td>
            <td width="220" align="left"><input name="cref" type="text" disabled="disabled" id="cref" tabindex="99" size="10"></td>
            <td width="410">&nbsp;</td>
          </tr>
         <tr>
            <td width="126" align="right"><label for="codbar">Cod.Barra:</label></td>
            <td width="220" align="left"><input name="codbar" type="text" autofocus="autofocus" id="codbar" tabindex="1"></td>
            <td width="410">&nbsp;</td>
        </tr>
         <tr>
            <td width="126" align="right"><label for="Desc">Desc. Corta</label></td>
            <td width="220" align="left"><input name="Desc" type="text" id="Desc" tabindex="2" size="25" maxlength="30" onkeyup="txtMayuscula('Desc')"></td>
            <td width="410" align="left">Desc. Larga
              <input name="Desl" type="text" id="Desl" tabindex="3" size="40" maxlength="50" onkeyup="txtMayuscula('Desl')"></td>
        </tr>
         <tr>
            <td width="126" align="right"><label for="Rubro">Rubro / Sub Rubro</label></td>
            <td width="220" align="left">    
				<select name="rubro" id="rubro" tabindex="4">
       			   <option value="1">Repuesto Varios</option>
      			</select>
		 </td>
            <td width="410" align="left"><select name="subrubro" id="subrubro" tabindex="5">
              <option value="1">Varios</option>
            </select></td>
        </tr>
    </table>
		</td>
    </tr>
    <tr>
      <td><table width="770" border="0">
        <tbody>
          <tr>
            <td width="289" align="right" >Control de Stock
              <select name="ctrlStock" id="ModIva3" tabindex="6">
                <option value="1">SI</option>
                <option value="0">NO</option>
              </select></td>
            <td width="52" align="center" >&nbsp;</td>
            <td align="center" ><label for="ImpInterno">Unidad de Medida</label>
				<select name="UniMed" id="UniMed" tabindex="8">
                	<option value="1">Unidad</option>
               		<option value="2">KG.</option>
					<option value="3">Litros</option>
					<option value="4">Metros</option>
             	</select>
			  </td>
            </tr>
          <tr>
            <td align="right">Habilitado
              <select name="Habilitado" id="ModIva2" tabindex="7">
                <option value="1">SI</option>
                <option value="0">NO</option>
              </select></td>
            <td align="center">&nbsp;</td>
            <td align="center">Unidad x Bulto
              <input name="input2" type="number" id="input3" tabindex="9" max="2" min="2" size="10" value="1" maxlength="2"></td>
            </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td>
		
		<table width="770" border="0">
        <tbody>
          <tr>
            <td width="159" align="center" ><label for="ModIva">Modalidad de I.V.A.</label></td>
            <td width="112" align="center" ><label for="TipoIva">Tipo</label></td>
            <td align="center" ><label for="ImpInterno">Imp. Internos</label></td>
            <td align="center" >&nbsp;</td>
            </tr>
          <tr>
            <td align="center"><select name="ModIva" id="ModIva" tabindex="10">
              <option value="1">Grabado</option>
              <option value="2">Exento</option>
              <option value="3">No Grabado</option>
            </select></td>
            <td align="center"><select name="TipoIva" id="TipoIva" tabindex="11" oninput="calcularResultado()">
              <option value="21">21%</option>
              <option value="0">0 %</option>
              <option value="10.5">10.5%</option>
              <option value="27">27%</option>
            </select></td>
            <td width="197" align="center">
			<select name="ImpInterno" id="ImpInterno" tabindex="12">
              <option value="0">0 %</option>
              <option value="3">3 %</option>
              <option value="5">5 %</option>
			  <option value="10">10 %</option>
            </select>
			  </td>
            <td width="284" align="left">&nbsp;</td>
            </tr>
        </tbody>
      </table>
		
		
		
		</td>
    </tr>
    <tr>
      <td><table width="770" border="0">
          <tr>
            <td width="478"><label for="id_prov">Proveedor:</label>
              <input name="BuscaProv" type="text" id="searchTerm" placeholder="Buscar proveedor" tabindex="13">
              <input name="id_prov" type="text" disabled="disabled" required="required" id="id_prov" placeholder="0" tabindex="13" size="3">
              <input name="nom_prov" type="text" disabled="disabled" id="nom_prov" placeholder="0" tabindex="13" size="15"><div id="searchResults"></div></td>
            <td width="282"><label for="CRefProv">Cod. Ref Prov.:</label>
            <input name="CRefProv" type="text" id="CRefProv" tabindex="15" size="14" maxlength="15"></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="770" border="0">
        <tr>
          <td colspan="2"><label for="Costo">Costo Sin Iva: $</label>
            <input name="Costo" type="number" id="Costo" tabindex="15" size="10" oninput="calcularResultado()"> 
            X Unidad</td>
          <td width="387"><label for="BonifPor">Bonificaciones</label>
            %
            <input name="BonifPor" type="text" id="BonifPor" max="2" min="2" tabindex="16" value="0" size="2" maxlength="2" oninput="calResPorBoni()">
            $
  <input name="BonifImp" type="text" id="BonifImp" max="2" min="2" tabindex="17" value="0" size="10" maxlength="10" oninput="calcularResultado()"></td>
        </tr>
        <tr>
          <td width="182" align="center" bgcolor="#BEBEBE">Costo Neto</td>
          <td width="187" align="center" bgcolor="#BEBEBE">Costo C/IVA</td>
          <td><label for="FletePor">Flete o Gastos</label>
%
  <input name="FletePor" type="text" id="FletePor" max="5" min="5" tabindex="19" value="0" size="2" maxlength="2" oninput="calResPorFlete()">
$
<input name="FleteImp" type="text" id="FleteImp" max="5" min="5" tabindex="20" value="0" size="10" maxlength="10" oninput="calcularResultado()"></td>
        </tr>
        <tr>
          <td align="center" bgcolor="#BEBEBE"><input name="Cost_siva" type="text" disabled="disabled" id="Cost_siva" tabindex="18" size="10" maxlength="10"></td>
          <td align="center" bgcolor="#BEBEBE"><input name="Cost_civa" type="text" disabled="disabled" id="Cost_civa" tabindex="18" size="10" maxlength="10"></td>
          <td><label for="cargosFPor">Cargos Financ.</label>
            %
            <input name="cargosFPor" type="text" id="cargosFPor" max="5" min="5" tabindex="21" value="0" size="2" maxlength="2" oninput="calResPorCarFin()">
            $
  <input name="cargosFImp" type="text" id="cargosFImp" max="5" min="5" tabindex="22" value="0" size="10" maxlength="10" oninput="calcularResultado()"></td>
        </tr>
		  
		  
      </table></td>
    </tr>
    <tr>
      <td><table width="770" border="0">
        <tbody>
          <tr>
            <th colspan="3" align="left" scope="col">Precio de Venta</th>
            <th align="left" scope="col">&nbsp;</th>
            <th align="left" scope="col">&nbsp;</th>
            </tr>
          <tr>
            <td width="66" align="right">&nbsp;</td>
            <td colspan="2" align="center" bgcolor="#CACACA">Aumentos Por: </td>
            <td width="137" align="center">Precio S/IVA</td>
            <td width="292" align="center" bgcolor="#CACACA"> Precio de Venta  C/IVA Final</td>
          </tr>
          <tr>
            <td align="right">Lista 1</td>
            <td width="108" align="center" bgcolor="#CACACA">% 
              <input name="LA1" type="text" id="LA1" tabindex="22" value="0" size="7" maxlength="7"  oninput="calcularPorc('A')"></td>
            <td width="145" align="center" bgcolor="#CACACA">$
              <input name="LA2" type="text" id="LA2" tabindex="22" value="0" size="10" maxlength="10" disabled="disabled"></td>
            <td align="center"><input name="LA3" type="text" id="LA3" tabindex="22" size="10" maxlength="10" disabled="disabled"></td>
            <td align="center" bgcolor="#CACACA"><input name="LA4" type="text" id="LA4" tabindex="22" size="15" maxlength="15" oninput="calcularImp('A')"></td>
          </tr>
    
          <tr>
            <td align="right">Lista 2</td>
            <td align="center" bgcolor="#CACACA">% 
              <input name="LB1" type="text" id="LB1" tabindex="22" value="0" size="7" maxlength="7"></td>
            <td align="center" bgcolor="#CACACA">$ 
              <input name="LB2" type="text" id="LB2" tabindex="22" value="0" size="10" maxlength="10"></td>
            <td align="center"><input name="LB3" type="text" id="LB3" tabindex="22" size="10" maxlength="10"></td>
            <td align="center" bgcolor="#CACACA"><input name="LB4" type="text" id="LB4" tabindex="22" size="15" maxlength="15"></td>
          </tr>

          <td align="right">Lista 3</td>
            <td align="center" bgcolor="#CACACA">% 
              <input name="LC1" type="text" id="LC1" tabindex="22" value="0" size="7" maxlength="7"></td>
            <td align="center" bgcolor="#CACACA">$
              <input name="LC2" type="text" id="LC2" tabindex="22" value="0" size="10" maxlength="10"></td>
            <td align="center"><input name="LC3" type="text" id="LC3" tabindex="22" size="10" maxlength="10"></td>
            <td align="center" bgcolor="#CACACA"><input name="LC4" type="text" id="LC4" tabindex="22" size="15" maxlength="15"></td>
          </tr>
       
          <tr>
            <td align="right">Lista 4</td>
            <td align="center" bgcolor="#CACACA">% 
              <input name="LD1" type="text" id="LD1" tabindex="22" value="0" size="7" maxlength="7"></td>
            <td align="center" bgcolor="#CACACA">$ 
              <input name="LD2" type="text" id="LD2" tabindex="22" value="0" size="10" maxlength="10"></td>
            <td align="center"><input name="LD3" type="text" id="LD3" tabindex="22" size="10" maxlength="10"></td>
            <td align="center" bgcolor="#CACACA"><input name="LD4" type="text" id="LD4" tabindex="22" size="15" maxlength="15"></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="submit" id="submit" value="Guardar Articulo"></td>
    </tr>
  </tbody>
</table>
	  
	</form>
</body>
</html>