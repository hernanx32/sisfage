<?PHP
function abmRemIngProv($conn, $consulta)
{
    global $fecha;
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
  <h3 class="card-title">Remitos Ingreso Proveedor</h3>
</div>
            
<form id="form1" method="get" action="RemitoProv.php">   
<table id="example" class="display" border="1" width="1200px" align="center">
                  <thead>
                  <tr>
                    <th colspan="5"><label for="busqueda">Buscar:</label>
                    <input type="text" name="busqueda" id="busqueda" size="30" maxlength="30">
                    <label for="select">Filtro:</label>
                    <select name="select" id="select">
                      <option value="Provee" selected="selected">Proveedor</option>
                      <option value="NroPed">Nro.Pedido</option>
                      <option value="NroFac">Nro Fac Prov</option>
                      </select>
                    </select>
                    <input type="submit" name="scr" id="scr" value="Buscar"> - <a href="RemitoProv.php">LIMPIAR BUSQUEDA</a></th>
                    <th>&nbsp;</th>
                    <th colspan="2"><div align="center"><a href="RemitoProv.php?scr=agregar">AGREGAR REMITO DE PROV.</a></div></th>
                    
                  </tr>
                  <tr>
                    <th scope="col">Nro Pedido</th>
                    <th scope="col">Nro Fac. Prov</th>
                    <th scope="col">Fecha Ing</th>
                    <th scope="col">ID_Prov</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Importe</th>
                    <th scope="col">Acciones</th>
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
        echo "$" . number_format($row['costo'], 2);
        echo "</td><td>";
        echo "$" . number_format($row['precio1'], 2);
        
  
        $fec_modifica =$row['fec_act'];
        if($fecha==$fec_modifica){
        echo "</td><td bgcolor='#09D320'>";    
        }else{
        echo "</td><td>";    
        }
        
        $fechaOriginal = $fec_modifica; // Fecha en formato ISO
        $timestamp = strtotime($fechaOriginal);
        echo date("d/m/Y", $timestamp);
        
                
        echo "</td><td align='center'>";
        echo "<a href='abmArticulo.php?scr=modificar&id=".$row['id_articulo']."'>Editar</a> - <a href='abmArticulo.php?scr=costos&id=".$row['id_articulo']."'>Costos</a> - <a  href='abmArticulo.php?scr=eliminar&id=".$row['id_articulo']."' onclick='confirmarEnlace(event)'>Eliminar</a> </td></tr>"; 
    
    }
} else {
    echo "<td colspan='7'>No se Encontraron Resultados<td>";
}
?> </tbody></table></form> </div>  
 
<?PHP
}