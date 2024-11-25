<?php
function abmSuc($conn)
{
?>
    <script>
        function confirmarEnlace(event) {
            // Mostrar mensaje de confirmación
            var confirmacion = confirm("¿Estás seguro que desea Eliminar?");
            if (!confirmacion) {
                // Si el usuario cancela, evitar que el enlace se abra
                event.preventDefault();
            }
        }
    </script>
<form>
<table width="750" border="1" align="center">
  <tbody>
    <tr>
      <th colspan="4" scope="col">
        <label>ABM Sucursales</label>
       </th>
      <th colspan="2" align="center" scope="col"><div align="center"><a href="abmSucursales.php?scr=agregar">AGREGAR SUCURSALES</a></div></th>
      </tr>
    <tr align="center" bgcolor="#8E9EFD">
      <td width="40">ID</td>
      <td width="103">Nro Suc</td>
      <td width="184">Nombre</td>
      <td width="191">Domicilio</td>
      <td width="150">Acciones</td>
    </tr>
      
<?PHP  
$sql = "SELECT * from Sucursales where estado = '1'";
      
$result = $conn->query($sql);      
      

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        echo "<tr><td>";
        echo $row['id_sucursal'];
        echo "</td><td>";
        echo $row['nro_suc'];
        echo "</td><td>";
        echo $row['nomb_suc'];
        echo "</td><td>";
        echo $row['domicilio'];
        echo "</td><td align='center'>";
        echo "<a href='abmSucursales.php?scr=modificar&id=".$row['id_sucursal']."'>Modificar</a> </td></tr>"; 
    
    }
} else {
	  echo "<tr><td colspan='6'>0 resultados</td></tr>";
}
echo "</tbody></table></form>";

} 
//AGREGAR FORMULARIO PARA AGREGAR USUARIO	  
function agregar($conn){
?>
    
    <form action="abmSucursales.php?scr=agregarnuevo" method="post" name="form1" id="form1">
  <table width="507" border="1" align="center">
    <tbody>
      <tr>
        <th colspan="2" scope="col">Agregar Sucursal</th>
      </tr>
      <tr>
        <td width="135"><label for="id_suc">Id. Suc:</label></td>
        <td width="356"><input name="id_suc" type="text" id="id_suc" size="5" maxlength="5" readonly="readonly"></td>
      </tr>
      <tr>
        <td><label for="nro_suc">Nro Suc:</label></td>
        <td><input name="nro_suc" type="number" autofocus="autofocus" required id="nro_suc" size="10" maxlength="10"> 
          (*)
          
          
           <script>
            document.getElementById('nro_suc').addEventListener('input', function (event) {
                if (this.value < 0) {
                this.value = ''; // Borra el valor si es negativo
                alert('No se permiten valores negativos.');
                }
                });
            </script>
                
          
        </td>
      </tr>
      <tr>
        <td><label for="nomb_suc">Nombre:</label></td>
        <td><input name="nomb_suc" type="text" id="nomb_suc" size="30" maxlength="30" required>
        (*)</td>
      </tr>
      <tr>
        <td><label for="domic">Domicilio:</label></td>
        <td><input name="domic" type="text" id="Domic" size="30" maxlength="30" required>
        (*)</td>
      </tr>
      <tr>
        <td><label for="estado">Estado:</label></td>
        <td>
         <select name="estado" id="estado">
          <option value="1" selected="selected">Activo</option>
          <option value="0">Inactivo</option>
          </select>
      </td>
      </tr>

      <tr>
        <td colspan="2" align="center"><a href="abmSucursales.php" class="btn btn-outline-secondary">Cancela</a> - 
        <input class="btn btn-outline-success" type="submit" name="scr" id="scr" value="agregado"></td>
      </tr>
    </tbody>
  </table>
</form>
<?PHP
}

//FUNCION INSERTAR NUEVA Sucursal
function agregado($conn, $consulta){
	$sql = $consulta;
	//EJECUTANDO CODIGO DE ELIMINACION 
	if ($conn->query($sql) === TRUE) {
		//MENSAJE EN CASO QUE SEA CORRECTO	
		echo "<div class='alert alert-success' role='alert'>Sucursal Agregado Correctamente.</div>";
		echo "<td colspan='6' align='center'><a href='abmSucursales.php' class='btn btn-outline-secondary'>VOLVER</a>";
	   
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<div class='alert alert-danger' role='alert'>Error al agregar Nueva Sucursal.</div>";
    echo "<td colspan='6' align='center'><a href='abmSucursales.php' class='btn btn-outline-secondary'>VOLVER</a>";
	}
}







//FORMULARIO DE MODIFICAR Sucursal 
function form_modi_suc($conn, $id ){

    $sql="SELECT * FROM `Sucursales` WHERE `id_sucursal` = $id";
    $result = $conn->query($sql); 
    
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $Dato1=$row['id_sucursal'];
        $Dato2=$row['nro_suc'];
        $Dato3=$row['nomb_suc'];
        $Dato4=$row['domicilio'];
        $Dato5=$row['estado'];
        
        
    }
    }else{
    echo "<div class='alert alert-danger' role='alert'>Error al buscar la Susursal .</div>";
    echo "<td colspan='6' align='center'><a href='abmSucursales.php' class='btn btn-outline-secondary'>VOLVER</a>";
    }

//FORMULARIO DE MODIFICACION DE SUCURSAL    
?>    
  
   <form action="abmSucursales.php?scr=modificando&id_suc=<?php echo $Dato1;?>" method="post" name="form1" id="form1">
  <table width="507" border="1" align="center">
    <tbody>
      <tr>
        <th colspan="2" scope="col">Agregar Sucursal</th>
      </tr>
      <tr>
        <td width="135"><label for="id_suc">Id. Suc:</label></td>
        <td width="356"><input name="id_suc" type="text" id="id_suc" value="<?php echo $Dato1;?>" size="5" maxlength="5" readonly="readonly"></td>
      </tr>
        <td><label for="nro_suc">Nro Suc:</label></td>
        <td><input name="nro_suc" type="number" autofocus="autofocus" required id="nro_suc" value="<?php echo $Dato2;?>" size="10" maxlength="10"> 
          (*)
          
          
           <script>
            document.getElementById('nro_suc').addEventListener('input', function (event) {
                if (this.value < 0) {
                this.value = ''; // Borra el valor si es negativo
                alert('No se permiten valores negativos.');
                }
                });
            </script>        
            
      <tr>
        <td><label for="nomb_suc">Nombre:</label></td>
        <td><input name="nomb_suc" type="text" id="nomb_suc" size="30" maxlength="30" value="<?php echo $Dato3;?>" required>
        (*)</td>
      </tr>
      <tr>
        <td><label for="domic">Domicilio:</label></td>
        <td><input name="domic" type="text" id="Domic" size="30" maxlength="30" value="<?php echo $Dato4;?>" required>
        (*)</td>
      </tr>
      <tr>
        <td><label for="est">Estado:</label></td>
        <td>
        <select name="estado" id="estado">
          <option value="0" <?PHP echo ($Dato5 == 0) ? 'selected="selected"':''; ?>>Inactivo</option>
          <option value="1" <?PHP echo ($Dato5 == 1) ? 'selected="selected"':''; ?>>Activo</option>
          </select>
      </td>
      </tr>

      <tr>
        <td colspan="2" align="center"><a href="abmSucursales.php" class="btn btn-outline-secondary">Cancela</a> - 
        <input class="btn btn-outline-success" type="submit" name="scr" id="scr" value="Modificar"></td>
      </tr>
    </tbody>
  </table>
</form>      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
<?PHP

}

//FUNCION DE MODIFICAR USUARIO
function modificando($conn, $consulta){
	$sql = $consulta;
	//EJECUTANDO CODIGO DE ELIMINACION 
	if ($conn->query($sql) === TRUE) {
		//MENSAJE EN CASO QUE SEA CORRECTO	
		echo "<div class='alert alert-success' role='alert'>Sucursa Actualizada Correctamente.</div>";
		echo "<td colspan='6' align='center'><a href='abmSucursales.php' class='btn btn-outline-secondary'>VOLVER</a>";
	   
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<div class='alert alert-danger' role='alert'>Error al Actualizar Sucursal.</div>";
    echo "<td colspan='6' align='center'><a href='abmSucursales.php' class='btn btn-outline-secondary'>VOLVER</a>";
	}

}


?>