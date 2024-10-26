<?php

function abmaprov($conn)
{
?>
<div class="card">
            <div class="card-header">
                <h3 class="card-title">ABM Proveedores</h3>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Localidad</th>
                    <th>CUil/Cuit</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
<?PHP 
$sql = "SELECT `id_proveedor`,`nombre`, `direccion`, `localidad`, `nro_doc` FROM proveedor";
$result = $conn->query($sql);      
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        echo "<tr><td>";
        echo $row['id_proveedor'];
        echo "</td><td>";
        echo $row['nombre'];
        echo "</td><td>";
        echo $row['direccion'];
        echo "</td><td>";
        echo $row['localidad'];
        echo "</td><td>";
        echo $row['nro_doc'];
        echo "</td><td align='center'>";
        echo "<a href='abmArticulo.php?scr=modificar&id=".$row['id_proveedor']."'>Editar</a> - <a  href='abmArticulo.php?scr=eliminar&id=".$row['id_proveedor']."' onclick='confirmarEnlace(event)'>Eliminar</a> </td></tr>"; 
    
    }
} else {
    echo "<td colspan='8'>No se Encontraron Resultados<td>";
}
echo "</tbody></table></form> </div>";

}

//AGREGAR FORMULARIO PARA AGREGAR USUARIO	  
function agregar($conn){
?>
 <form action="abmArticulo.php?scr=agregardetalle" method="post" name="form1" id="form1">
  <table id="miTabla" width="1000" border="1" align="center">
    <tbody>
      <tr>
        <th colspan="4" scope="col">Agregar Datos del Articulo</th>
      </tr>
      <tr>
        <td width="109"><label for="id_articulo">Nro Id.</label></td>
        <td colspan="3"><input name="id_articulo" type="text" disabled id="id_articulo" size="5" maxlength="5"></td>
      </tr>
      <tr>
        <td><label for="cod_bar">Codigo Barra:</label></td>
        <td colspan="3"><input name="cod_bar" type="text" id="cod_bar" size="15" maxlength="15" required> 
          (*)</td>
      </tr>
      <tr>
        <td><label for="desc_corta">Desc. Corta:</label></td>
        <td width="232"><input name="desc_corta" type="text" id="desc_corta" size="20" maxlength="20" required>
        (*)</td>
        <td width="134" align="right"><label for="desc_larga">Desc. Larga:</label></td>
        <td width="497"><input name="desc_larga" type="text" id="desc_larga" size="30" maxlength="30" required>
(*)</td>
      </tr>
      <tr>
        <td><label for="rubro">Rubro:</label></td>
        <td><select name="rubro" id="rubro">
          <option value="2">Repuesto</option>
          <option value="1">Varios</option>
        </select></td>
        <td align="right"><label for="sub_rubro">Sub Rubro:</label></td>
        <td><select name="sub_rubro" id="sub_rubro">
            <option value="1">LUBRICANTES</option>
            <option value="2">ACCESORIOS</option>
            <option value="3">PEGAMENTOS</option>
            <option value="4">MOTOR</option>
            <option value="5">TRASMISION</option>
            <option value="6">RODADOS</option>
            <option value="7">VARIOS</option>
        </select></td>
      </tr>
      <tr>
        <td><label for="medida">Medida:</label></td>
        <td><select name="medida" id="medida">
            <option value="Unidad">Unidad</option>
            <option value="Litros">Litros</option>
            <option value="Kilos">Kilos</option>
            <option value="Metros">Metros</option>
        </select></td>
        <td align="right"><label for="unidadxbulto">Uni. x Bulto</label></td>
        <td><input name="unidadxbulto" type="number" id="unidadxbulto" max="100" min="1" value="1"></td>
      </tr>
      <tr>
        <td><label for="proveedor">Proveedor</label></td>
        <td><input name="proveedor" type="text" id="proveedor" size="20" maxlength="20"></td>
        <td align="right"><input name="id_provee" type="text" disabled="disabled" id="id_provee" size="5" maxlength="5"></td>
        <td><input name="desc_proveedor" type="text" disabled="disabled" id="desc_proveedor" size="20" maxlength="20"></td>
      </tr>
      <tr>
        <td><label for="cod_bar_prov">Cod. Bar. Prov.</label></td>
        <td colspan="3"><input name="cod_bar_prov" type="text" id="cod_bar_prov" size="20" maxlength="20"></td>
      </tr>
      <tr>
        <td colspan="4" align="center"><a href="abmArticulo.php" class="btn btn-outline-secondary">Cancela</a> - 
        <input name="guardar" type="submit" class="btn btn-outline-success" id="scr" formaction="abmArticulo.php?scr=agregar" value="Guardar y Volver"> - 
        <input name="guardarycosto" type="submit" class="btn btn-outline-success" id="scr2" formaction="abmArticulo.php?scr=agregarycosto" value="Guardar y Cargar Costo">  
        </td>
      </tr>
    </tbody>
  </table>
</form>

<?PHP
 }
//FUNCION INSERTAR NUEVO USUARIO

//FUNCION ELIMINA USUARIO
function elimina_art($conn, $id ){
	//CODIGO DE CONSULTA DE ELIMINACION DEL REGISTRO
	$sql = "UPDATE `articulo` SET `estado` = '0' WHERE `articulo`.`id_articulo` = '$id'";
	//EJECUTANDO CODIGO DE ELIMINACION 
	if ($conn->query($sql) === TRUE) {
		//MENSAJE EN CASO QUE SEA CORRECTO	
		echo "<div class='alert alert-success' role='alert'>Articulo deshabilitado Correctamente.</div>";
		echo "<td colspan='6' align='center'><a href='abmArticulo.php' class='btn btn-outline-secondary'>VOLVER</a>";
	   
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<div class='alert alert-danger' role='alert'>Error al deshabilitar Articulo.</div>";
    echo "<td colspan='6' align='center'><a href='abmArticulo.php' class='btn btn-outline-secondary'>VOLVER</a>";
	}
}





function agregado($conn, $consulta){
	$sql = $consulta;
	//EJECUTANDO CODIGO DE ELIMINACION 
	if ($conn->query($sql) === TRUE) {
		//MENSAJE EN CASO QUE SEA CORRECTO	
		echo "<div class='alert alert-success' role='alert'>Usuario Agregado Correctamente.</div>";
		echo "<td colspan='6' align='center'><a href='abmUsuario.php' class='btn btn-outline-secondary'>VOLVER</a>";
	   
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<div class='alert alert-danger' role='alert'>Error al agregar usuario.</div>";
    echo "<td colspan='6' align='center'><a href='abmUsuario.php' class='btn btn-outline-secondary'>VOLVER</a>";
	}
}

function modificar_art($conn, $id){
    echo 'modificar '. $id;
    

}

function costos($conn, $id){
//TRAEMOS LOS DATOS DEL FORMULRIO
              
              
?>
              
              
              
<form action="/ArticuloAlta2.php" method="post" id="form1">	
<table width="850" border="1" align="center">
  <caption>Alta Articulo</caption>
	<tbody>
    <tr>
      <td>
        <table width="849" border="1">
          <tr>
            <td width="126" align="right"><label for="cref">Cod.Referencia:</label></td>
            <td width="220" align="left"><input name="cref" type="text" id="cref" value="1" size="10" readonly="readonly"></td>
            <td width="410"><label for="modificado">Ultima Modificación</label><input name="modificado" type="text" disabled="disabled" id="modificado"></td>
            </tr>
          <tr>
            <td width="126" align="right"><label for="codbar">Cod.Barra:</label></td>
            <td width="220" align="left"><input name="codbar" type="text" disabled="disabled" id="codbar"></td>
            <td width="410"><label for="codbarprov">Cod.Provee:</label>
              <input name="codbarprov" type="text" disabled="disabled" id="codbarprov"></td>
            </tr>
          <tr>
            <td colspan="3" align="left"><label for="desc_larga">Desc. Larga</label>
              <input name="desc_larga" type="text" disabled="disabled" id="desc_larga" onkeyup="txtMayuscula('Desl')" size="50" maxlength="50" readonly="readonly"></td>
            </tr>
          </table>
        </td>
    </tr>
    <tr>
      <td>
        
        <table width="849" border="0">
          <tbody>
            <tr>
              <td width="159" align="center" ><label for="ModIva">Modalidad de I.V.A.</label></td>
              <td width="184" align="center" ><label for="TipoIva">Tipo</label></td>
              <td align="center" ><label for="ImpInterno">Imp. Internos</label></td>
              <td align="center" >&nbsp;</td>
              </tr>
            <tr>
              <td align="center"><select name="ModIva" disabled="disabled" id="ModIva">
                <option value="1" selected="selected">Grabado</option>
                <option value="2">Exento</option>
                <option value="3">No Grabado</option>
                </select></td>
              <td align="center"><select name="TipoIva" id="TipoIva" tabindex="11" oninput="calcularResultado()">
                <option value="21">21%</option>
                <option value="0">0 %</option>
                <option value="10.5">10.5%</option>
                <option value="27">27%</option>
                </select></td>
              <td width="234" align="center">
                <select name="ImpInterno" id="ImpInterno" tabindex="12">
                  <option value="0" selected="selected">0 %</option>
                  <option value="3">3 %</option>
                  <option value="5">5 %</option>
                  <option value="10">10 %</option>
                  </select>
                </td>
              <td width="175" align="left">&nbsp;</td>
              </tr>
            </tbody>
          </table>
        
        
        
        </td>
    </tr>
    <tr>
      <td><table width="849" border="0">
        <tr>
          <td colspan="2"><label for="Costo">Costo Sin Iva: $</label>
            <input name="Costo" type="number" required="required" id="Costo" placeholder="0" max="999999" min="0" tabindex="1" value="0" size="10" oninput="calcularResultado()"> 
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

          <td align="center" bgcolor="#BEBEBE">$
            <input name="Cost_siva" type="text" disabled="disabled" id="Cost_siva" tabindex="18" size="10" maxlength="10"></td>
          <td align="center" bgcolor="#BEBEBE">$
            <input name="Cost_civa" type="text" disabled="disabled" id="Cost_civa" tabindex="18" size="10" maxlength="10"></td>
          <td><label for="cargosFPor">Cargos Financ.</label>
            %
            <input name="cargosFPor" type="text" id="cargosFPor" max="5" min="5" tabindex="21" value="0" size="2" maxlength="2" oninput="calResPorCarFin()">
            $
            <input name="cargosFImp" type="text" id="cargosFImp" max="5" min="5" tabindex="22" value="0" size="10" maxlength="10" oninput="calcularResultado()"></td>
          </tr>
        
        
        </table></td>
    </tr>
    <tr>
      <td><table width="849" border="0">
        <tbody>
          <tr>
            <th colspan="3" align="left" scope="col">Precio de Venta</th>
            <th align="left" scope="col">&nbsp;</th>
            <th align="left" scope="col">&nbsp;</th>
            </tr>
          <tr>
            <td width="72" align="right">&nbsp;</td>
            <td colspan="2" align="center" bgcolor="#CACACA">Aumentos Por: </td>
            <td width="149" align="center">Precio S/IVA</td>
            <td width="321" align="center" bgcolor="#CACACA"> Precio de Venta  C/IVA Final</td>
          </tr>
          <tr>
            <td align="right">Lista 1</td>
            <td width="140" align="center" bgcolor="#CACACA">% 
              <input name="LA1" type="text" id="LA1" tabindex="22" value="0" size="10" maxlength="10"  oninput="calcularPorc('A')"></td>
            <td width="136" align="center" bgcolor="#CACACA">$
              <input name="LA2" type="text" id="LA2" tabindex="22" value="0" size="10" maxlength="10" readonly="readonly"></td>
            <td align="center"><input name="LA3" type="text" id="LA3" tabindex="22" size="10" maxlength="10" readonly="readonly"></td>
            <td align="center" bgcolor="#CACACA"><input name="LA4" type="text" id="LA4" tabindex="22" size="15" maxlength="15" oninput="calcularImp2('A')"></td>
          </tr>
    
          <tr>
            <td align="right">Lista 2</td>
            <td align="center" bgcolor="#CACACA">% 
              <input name="LB1" type="text" id="LB1" tabindex="22" value="0" size="10" maxlength="10"></td>
            <td align="center" bgcolor="#CACACA">$ 
              <input name="LB2" type="text" id="LB2" tabindex="22" value="0" size="10" maxlength="10" readonly="readonly"></td>
            <td align="center"><input name="LB3" type="text" id="LB3" tabindex="22" size="10" maxlength="10" readonly="readonly"></td>
            <td align="center" bgcolor="#CACACA"><input name="LB4" type="text" id="LB4" tabindex="22" size="15" maxlength="15"></td>
          </tr>

          <td align="right">Lista 3</td>
            <td align="center" bgcolor="#CACACA">% 
              <input name="LC1" type="text" id="LC1" tabindex="22" value="0" size="10" maxlength="10"></td>
            <td align="center" bgcolor="#CACACA">$
              <input name="LC2" type="text" id="LC2" tabindex="22" value="0" size="10" maxlength="10" readonly="readonly"></td>
            <td align="center"><input name="LC3" type="text" id="LC3" tabindex="22" size="10" maxlength="10" readonly="readonly"></td>
            <td align="center" bgcolor="#CACACA"><input name="LC4" type="text" id="LC4" tabindex="22" size="15" maxlength="15"></td>
          </tr>
       
          <tr>
            <td align="right">Lista 4</td>
            <td align="center" bgcolor="#CACACA">% 
              <input name="LD1" type="text" id="LD1" tabindex="22" value="0" size="10" maxlength="7"></td>
            <td align="center" bgcolor="#CACACA">$ 
              <input name="LD2" type="text" id="LD2" tabindex="22" value="0" size="10" maxlength="10" readonly="readonly"></td>
            <td align="center"><input name="LD3" type="text" id="LD3" tabindex="22" size="10" maxlength="10" readonly="readonly"></td>
            <td align="center" bgcolor="#CACACA"><input name="LD4" type="text" id="LD4" tabindex="22" size="15" maxlength="15"></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td align="center"><a href="abmArticulo.php" class="btn btn-outline-secondary">Cancela</a> -         <input type="submit" name="submit" id="submit" value="Guardar Costo" class="btn btn-outline-success"></td>
    </tr>
  </tbody>
</table>

<?php }
?>