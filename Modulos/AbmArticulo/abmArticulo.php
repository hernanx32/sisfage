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
            
<form id="form1" method="get" action="abmArticulo.php">   
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
                    <input type="submit" name="scr" id="scr" value="Buscar"> - <a href="abmArticulo.php">LIMPIAR BUSQUEDA</a></th>
                    <th>&nbsp;</th>
                    <th colspan="2"><div align="center"><a href="abmArticulo.php?scr=agregar">AGREGAR ARTICULO</a></div></th>
                    
                  </tr>
                  <tr>
                    <th>Cod.Ref</th>
                    <th>Cod.Barra</th>
                    <th>Cod.Bar.Prov.</th>
                    <th>Descripción</th>
                    <th>Costo</th>
                    <th>Precio1</th>
                    <th>Precio2</th>
                    <th>Acciones</th>
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
        echo "</td><td>";
        echo "$" . number_format($row['precio2'], 2);
        echo "</td><td align='center'>";
        echo "<a href='abmArticulo.php?scr=modificar&id=".$row['id_articulo']."'>Editar</a> - <a href='abmArticulo.php?scr=costos&id=".$row['id_articulo']."'>Costos</a> - <a  href='abmArticulo.php?scr=eliminar&id=".$row['id_articulo']."' onclick='confirmarEnlace(event)'>Eliminar</a> </td></tr>"; 
    
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


//FUNCION ELIMINA ARTICULO
function elimina_art($conn, $id, $id_us, $fecha ){
	//CODIGO DE CONSULTA DE ELIMINACION DEL REGISTRO
    
    $sql = "UPDATE `articulo` SET `estado` = '0', `id_usuario` = '$id_us', `fec_act` = '$fecha' WHERE `articulo`.`id_articulo` = '$id'";
    
	//EJECUTANDO CODIGO DE ELIMINACION 
	if ($conn->query($sql) === TRUE) {
		//MENSAJE EN CASO QUE SEA CORRECTO	
		echo "<div class='alert alert-success' role='alert'>Articulo ID: $id  deshabilitado Correctamente.</div>";
		echo "<td colspan='6' align='center'><a href='abmArticulo.php' class='btn btn-outline-secondary'>VOLVER</a>";
	   
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<div class='alert alert-danger' role='alert'>Error al deshabilitar Articulo ID: $id.</div>";
    echo "<td colspan='6' align='center'><a href='abmArticulo.php' class='btn btn-outline-secondary'>VOLVER</a>";
	}
}




//FUNCION AGREGANDO ARTICULO  
function agregado($conn, $consulta, $id){
    $sql = $consulta;
	//EJECUTANDO CODIGO  
	if ($conn->query($sql) === TRUE) {
		//MENSAJE GRABADO CORRECTO	
		echo "<div class='alert alert-success' role='alert'>Articulo ID $id Agregado correctamente</div>";
		echo "<td colspan='6' align='center'><a href='abmArticulo.php' class='btn btn-outline-secondary'>VOLVER</a>";
        echo "<td colspan='6' align='center'><a href='abmArticulo.php?scr=costos&id=$id' class='btn btn-outline-success'>Cargar Costo</a>";
	   
	} else {
		//MENSAJE ERROR
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<div class='alert alert-danger' role='alert'>Error al agregar usuario.</div>";
    echo "<td colspan='6' align='center'><a href='abmArticulo.php' class='btn btn-outline-secondary'>VOLVER</a>";
	}
}

function modificar_art($conn, $id){
    echo 'modificar '. $id;
}









//FUNCION RECIBE DATOS DE COSTO Y LOS GRABA
function modif_costo($conn, $consulta, $id, $d_larga ){
    $sql = $consulta;
	//EJECUTANDO CODIGO  
	if ($conn->query($sql) === TRUE) {
		//MENSAJE GRABADO CORRECTO	
		echo "<div class='alert alert-success' role='alert'>Articulo ID $id - $d_larga Se Actulizo Correctamente</div></br>";
		echo "<td colspan='6' align='center'><a href='abmArticulo.php' class='btn btn-outline-secondary'>VOLVER</a>";
        echo "<td colspan='6' align='center'><a href='abmArticulo.php?busqueda=$id&select=cod_ref&scr=Buscar' class='btn btn-outline-success'>Ver Articulo</a>";
	   
	} else {
		//MENSAJE ERROR
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<div class='alert alert-danger' role='alert'>Error al Actulizar el Costo.</div>";
    echo "<td colspan='6' align='center'><a href='abmArticulo.php' class='btn btn-outline-secondary'>VOLVER</a>";
	}
	
	
}


?>