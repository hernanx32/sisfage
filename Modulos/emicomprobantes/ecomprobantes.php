<?php

function abmarticulo($conn, $consulta)
{
?>    <script>
        function confirmarEnlace(event) {
            // Mostrar mensaje de confirmación
            var confirmacion = confirm("¿Estás seguro que desea Deshabilitar el Articulo?");
            if (!confirmacion) {
                // Si el usuario cancela, evitar que el enlace se abra
                event.preventDefault();
            }
        }
    </script>

            <div class="card-header">
                <h3 class="card-title">ABM Articulos</h3>
            </div>
              <!-- /.card-header -->
            
<form id="frm_articulo" method="get" action="emicomprobantes.php">   
<table id="example" class="display" border="1" width="1200px" align="center">
                  <thead>
                  <tr>
                    <th colspan="5"><label for="busqueda">Buscar:</label>
                    <input type="text" name="busqueda" id="busqueda" size="30" maxlength="30">
                    <label for="select">Filtro:</label>
                    <select name="select" id="select">
                      <option value="desc" selected="selected">Descripción</option>
                      <option value="cod_ref">Cod.Ref</option>
                      <option value="cod_bar">Codigo Barras</option>
                      <option value="prov">Cod. Proveedor</option>
                    </select>
                    </select>
                    <input type="submit" name="scr" id="scr" value="Buscar"> - <a href="emicomprobantes.php">LIMPIAR BUSQUEDA</a></th>
                    <th>&nbsp;</th>
                    <th colspan="2"><div align="center">.</div></th>
                    
                  </tr>
                  <tr>
                    <th>Cod.Ref</th>
                    <th>Cod.Barra</th>
                    <th>Cod.Bar.Prov.</th>
                    <th>Descripción</th>
                    <th>Precio1</th>
                    <th>Precio2</th>
                  </tr>
                  </thead>
                  <tbody>
<?PHP
    
$sql = $consulta;
$result = $conn->query($sql);      
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>";
        echo $row['id_articulo'];
        echo "</td><td>";
        echo $row['cod_bar'];
        echo "</td><td>";
        echo $row['cod_bar_prov'];
        echo "</td><td>";
        echo $row['desc_larga'];
        echo "</td><td>";
        echo "$" . number_format($row['precio1'], 2);
        echo "</td><td>";
        echo "$" . number_format($row['precio2'], 2);
        echo "</td></tr>"; 
    
    }
} else {
    echo "<td colspan='8'>No se Encontraron Resultados<td>";
}
?> </tbody></table></form> </div>  
 <script>
  window.onload = function() {
    document.getElementById("busqueda").focus();
  };
</script> 

<?PHP
}

//AGREGAR FORMULARIO PARA AGREGAR ARTICULO	  
function agregar($conn){
//ESTILO PARA LA BUSQUEDA 
   
?><div class="card-header">
        <h3 class="card-title">
ABM Articulos - Agregar Nuevo Articulos</h3>
        </div>
<form action="abmArticulo.php?scr=agregarnuevo" method="post" name="form1" id="form1">
  <table width="800" border="0" align="center">
    <tbody>
      <tr>
        <th colspan="2" scope="col">
        </th>
      </tr>
      <tr>
        <td width="296" bgcolor="#A1A1A1"><label for="id_arti">Cod.Ref.:</label>
        <input name="id_arti" type="number" id="id_arti" max="99999999" min="0" readonly="readonly"></td>
        <td width="488" align="right" bgcolor="#A1A1A1"><label for="id_usuario">Us. ID - F.Act.:</label>
        <input name="id_usuario" type="text" id="id_usuario" max="5" min="5" readonly="readonly"> - <input name="fecha_act" type="text" id="fecha_act" max="10" min="10" readonly="readonly"></td>
      </tr>
      <tr>
        <td><label for="cod_bar">Cod. Barra:</label>
          <input name="cod_bar" type="text" required="required" id="cod_bar" size="20" maxlength="20">
        <strong>(*)</strong></td>
        <td>Validar:</td>
      </tr>
      <tr>
        <td><label for="desc_corta">Desc. Corta:</label>
        <input name="desc_corta" type="text" required="required" id="desc_corta" size="20" maxlength="20"><strong>(*)</strong></td>
        <td><label for="desc_larga">Desc. Larga:</label>
        <input name="desc_larga" type="text" required="required" id="desc_larga" size="40" maxlength="40"><strong>(*)</strong></td>
      </tr>
      <tr>
        <td><label for="id_rubro">Rubro:</label>
          <select name="rubro" id="rubro">
            <?PHP  
            $sql = "SELECT * FROM rubro";
            $resultado = $conn->query($sql);
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<option value="' . $fila['id_rubro'] . '">' . $fila['desc_rubro'] . '</option>';
                }
            } else {
                echo '<option value="">No hay datos disponibles</option>';
            }
            ?>
        </select></td>
        <td><label for="id_rubro_sub">Sub Rubro:</label>
            <select name="rubro_sub" id="rubro_sub">
            <?PHP  
            $sql = "SELECT * FROM rubro_sub";
            $resultado = $conn->query($sql);
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<option value="' . $fila['id_rubro_sub'] . '">' . $fila['desc_rubro_sub'] . '</option>';
                }
            } else {
                echo '<option value="">No hay datos disponibles</option>';
            }
            ?>
            </select>
            </td>
      </tr>
      <tr>
        <td><label for="unidad_med">Unidad de Medida:</label>
          <select name="unidad_med" id="unidad_med">
            <option value="1" selected="selected">Unidad</option>
            <option value="2">Litros</option>
            <option value="2">Metros</option>
        </select></td>
        <td><label for="unidadxbulto">Unidad x Bulto:</label>
        <input name="unidadxbulto" type="number" id="unidadxbulto" max="1000" min="1" value="1"></td>
      </tr>
      <tr>
        <td><label for="stok_min">Stock Minimo:</label>
        <input name="stok_min" type="number" id="stok_min" max="9999999999" min="1" value="1"></td>
        <td><label for="stok_max">Stock Maximo:</label>
        <input name="stok_max" type="number" id="stok_max" max="9999999999" min="1" value="1"></td>
      </tr>
       <tr>
        <td><label for="iva">I.V.A.:</label>
          <select name="iva" id="iva" class="select2">
            <?PHP  
            $sql = "SELECT * FROM iva";
            $resultado = $conn->query($sql);
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<option value="' . $fila['id_iva'] . '">' . $fila['nombre'] . '</option>';
                }
            } else {
                echo '<option value="">No hay datos disponibles</option>';
            }
            ?> 
        </select></td>
        <td><label for="imp_int">Imp. Interno:</label>
          <select name="imp_int" id="imp_int">
            <?PHP  
            $sql = "SELECT * FROM imp_interno";
            $resultado = $conn->query($sql);
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<option value="' . $fila['id_imp_interno'] . '">' . $fila['desc_imp_int'] . '</option>';
                }
            } else {
                echo '<option value="">No hay datos disponibles</option>';
            }
            ?> 
        </select></td>
      </tr>  
      <tr>
        <td><label for="Proveedor">Proveedor:</label>
        <input type="text" id="busqueda" size="20" maxlength="35"  autocomplete="off"></td>
        <td><label for="id_prov">Datos Prov.:</label>
        <input type="text" id="id_seleccionado" placeholder="ID" size="5" maxlength="30" readonly="readonly">
        - <input type="text" id="nombre_seleccionado" size="30" maxlength="30" readonly="readonly"><strong>(*)</strong>
       </td>
      </tr>
      <tr>
        <td><label for="cod_bar_prov">Cod. Bar. Prov.:</label>
        <input name="cod_bar_prov" type="text" id="cod_bar_prov" size="10" maxlength="10" readonly="readonly"></td>
        <td><label for="estado">Estado Articulo:</label>
          <select name="estado" id="estado">
            <option value="1" selected="selected">Activo</option>
            <option value="0">Inactivo</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="center"><a href="abmArticulo.php" class="btn btn-outline-secondary">Cancela</a> - 
        <input type="submit" name="submit" id="submit" class="btn btn-outline-success" value="Agregar Articulo Nvo">
        </td>
      </tr>
    </tbody>
  </table>
</form>
</tbody></table></form> </div>  
 <script>
  window.onload = function() {
    document.getElementById("cod_bar").focus();
  };
</script> 
 

<?PHP
 }
//FUNCION INSERTAR NUEVO USUARIO

//FUNCION ELIMINA USUARIO
function elimina_art($conn, $id, $id_us, $fecha ){
	//CODIGO DE CONSULTA DE ELIMINACION DEL REGISTRO
    
    $sql = "UPDATE `articulo` SET `estado` = '0', `id_usuario` = '$id_us', `fec_act` = '$fecha' WHERE `articulo`.`id_articulo` = '$id'";
    
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
          </table>
        </td>
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
</form> <?php         
}
?>