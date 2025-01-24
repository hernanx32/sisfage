<?php
function abmproveedor($conn)
{
?>
    <script>
        function confirmarEnlace(event) {
            // Mostrar mensaje de confirmación
            var confirmacion = confirm("¿Estás seguro que desea Eliminar el Proveedor?");
            if (!confirmacion) {
                // Si el usuario cancela, evitar que el enlace se abra
                event.preventDefault();
            }
        }
    </script>


<form action="abmProveedores.php" method="get" id="Buscar">
<table width="1200" border="1" align="center">
  <tbody>
    <tr>
      <th colspan="4" scope="col">
        <label for="buscar_us">ABM Proveedor</label>
       </th>
      <th colspan="2" align="center" scope="col"><div align="center"><a href="abmProveedores.php?scr=agregar">AGREGAR PROVEEDOR</a></div></th>
      </tr>
    <tr>
      <th colspan="6" scope="col">
         
  <input name="Buscar" type="text" autofocus="autofocus" id="Buscar">
  Filtro de Busqueda 
  <select name="select" id="select">
    <option value="nombre" selected="selected">Nombre</option>
    <option value="nrodoc">Nro Documento</option>
  </select>
  <input type="submit" value="Buscar">
     </th>
      </tr>      
    <tr align="center" bgcolor="#8E9EFD">
      <td width="40">ID</td>
      <td width="200">Proveedor</td>
      <td width="200">Direccion</td>
      <td width="120">Localidad</td>
      <td width="60">CUIT/CUIL</td>
      <td width="150">Acciones</td>
    </tr>
      
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
        echo "<a href='abmProveedores.php?scr=modificar&id=".$row['id_proveedor']."'>Editar</a> - <a  href='abmProveedores.php?scr=eliminar&id=".$row['id_proveedor']."' onclick='confirmarEnlace(event)'>Eliminar</a> </td></tr>"; 
    
    }
} else {
    echo "<td colspan='8'>No se Encontraron Resultados<td>";
}
echo "</tbody></table></form> </div>";

}
//--------------------------------
//FORMULARIO AGREGAR PROVEEDORES
//--------------------------------

function agregar($conn){
?>
 <form action="abmProveedores.php?scr=agregarnuevo" method="post" name="form1" id="form1">
  <table width="825" border="1" align="center">
    <tbody>
      <tr>
        <th colspan="5" scope="col">Alta Proveedor</th>
      </tr>
      <tr>
        <td colspan="2" align="left"><label for="id_prov">ID:</label>
        <input name="id_prov" type="number" id="id_prov" max="5" min="5" value="-" readonly="readonly"></td>
        <td colspan="3" align="right">
          <label for="fec_prov">Ultima Act:</label>
        <input name="fec_prov" type="date" id="fec_prov" readonly="readonly"></td>
      </tr>
      <tr>
        <td colspan="2"><label for="nombre">Proveedor:</label>
        <input name="nombre" type="text" autofocus="autofocus" required="required" id="nombre" tabindex="1" size="30" maxlength="30"> 
        (*)</td>
        <td colspan="3"><label for="dir_prov">Dirección:</label>
        <input name="dir_prov" type="text" required="required" id="dir_prov" tabindex="2" size="30" maxlength="30">
        (*)</td>
      </tr>
      <tr>
        <td width="292"><label for="prov_prove">Provincia:</label>
        <input name="prov_prove" type="text" required="required" id="prov_prove" tabindex="3" size="15" maxlength="15">
        (*)</td>
        <td colspan="2"><label for="telprov1">Tel 1:</label>
        <input name="telprov1" type="number" id="telprov1" tabindex="6" size="20" maxlength="20"></td>
        <td width="281" colspan="2"><label for="transporte">Transporte:</label>
        <select name="transporte" id="transporte" tabindex="9">
          <option value="1">Varios</option>
        </select></td>
      </tr>
      <tr>
        <td><label for="local_prov2">Localidad:</label>
          <input name="local_prov" type="text" required="required" id="local_prov2" tabindex="4" size="20" maxlength="20">
          (*)</td>
        <td colspan="2"><label for="telprov2">Tel 2:</label>
        <input name="telprov2" type="number" id="telprov2" tabindex="7" size="20" maxlength="20"></td>
        <td colspan="2"><label for="tipo_doc">Tipo de Doc.:</label>
        <select name="tipo_doc" id="tipo_doc" tabindex="10">
          <option value="1">CUIT</option>
          <option value="2">CUIL</option>
          <option value="3">DNI</option>
        </select>
(*)</td>
      </tr>
      <tr>
        <td><label for="cp_prov">Cod. Postal:</label>
          <input name="cp_prov" type="number" required="required" id="cp_prov" tabindex="5" size="5" maxlength="5">
          (*)</td>
        <td colspan="2"><label for="telprov3">Tel 3:</label>
          <input name="telprov3" type="number" id="telprov3" tabindex="8" size="20" maxlength="20">
        </td>
        <td colspan="2"><label for="Nro_doc">Nro. Doc:</label>
        <input name="Nro_doc" type="number" id="Nro_doc" max="99999999999" tabindex="11" onkeypress="if (event.key < '0' || event.key > '9') event.preventDefault();" inputmode="numeric" oninput="if (this.value.length > 11) this.value = this.value.slice(0, 11);" />
(*)</td>
      </tr>
      <tr>
        <td colspan="5" align="center" valign="middle"><label for="otros">Comentarios / Otros:</label>
        <textarea name="otros" cols="30" rows="2" maxlength="60" id="otros" tabindex="12"></textarea></td>
      </tr>
      <tr>
        <td colspan="2" align="right"><a href="abmProveedores.php" class="btn btn-outline-secondary">Cancela</a></td>
        <td colspan="3"><input class="btn btn-outline-success" type="submit" name="scr" id="scr" value="agregado" tabindex="13"></td>
      </tr>
    </tbody>
  </table>
</form>

 <script>
  window.onload = function() {
    document.getElementById("nombre").focus();
  };
</script>   
<?PHP }

//----------------------------------
//FUNCION INSERTAR NUEVO PROVEEDOR
//----------------------------------
function agregado($conn, $consulta){
	$sql = $consulta;
	//EJECUTANDO CODIGO DE ELIMINACION 
	if ($conn->query($sql) === TRUE) {
		//MENSAJE EN CASO QUE SEA CORRECTO	
		echo "<div class='alert alert-success' role='alert'>Proveedor Agregado Correctamente.</div>";
		echo "<td colspan='6' align='center'><a href='abmProveedores.php' class='btn btn-outline-secondary'>VOLVER</a>";
	   
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<div class='alert alert-danger' role='alert'>Error al agregar Proveedor.</div>";
    echo "<td colspan='6' align='center'><a href='abmProveedores.php' class='btn btn-outline-secondary'>VOLVER</a>";
	}
}























//FUNCION ELIMINA USUARIO
function elimina_prov($conn, $id ){
	//CODIGO DE CONSULTA DE ELIMINACION DEL REGISTRO
	$sql = "DELETE FROM proveedor WHERE `proveedor`.`id_proveedor` = '$id'";
	//EJECUTANDO CODIGO DE ELIMINACION 
	if ($conn->query($sql) === TRUE) {
		//MENSAJE EN CASO QUE SEA CORRECTO	
		echo "<div class='alert alert-success' role='alert'>Proveedor Eliminado Correctamente.</div>";
		echo "<td colspan='6' align='center'><a href='abmProveedores.php' class='btn btn-outline-secondary'>VOLVER</a>";
	   
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<div class='alert alert-danger' role='alert'>Error Al eliminar el Proveedor.</div>";
    echo "<td colspan='6' align='center'><a href='abmProveedores.php' class='btn btn-outline-secondary'>VOLVER</a>";
	}
}













//FORMULARIO DE MODIFICAR USUARIO 
function form_modi_usu($conn, $id ){

    $sql="SELECT * FROM `usuario` WHERE `id_usuario` = $id";
    $result = $conn->query($sql); 
    
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $usuario=$row['usuario'];
        $nombre=$row['nombre'];
        $acceso=$row['id_acceso'];
        $email=$row['email'];
        $sucursal=$row['id_sucursal'];
        $fec_act=$row['fec_act'];
        
    }
    }else{
    echo "<div class='alert alert-danger' role='alert'>Error al buscar al usuario .</div>";
    echo "<td colspan='6' align='center'><a href='abmUsuario.php' class='btn btn-outline-secondary'>VOLVER</a>";
    }

    
?>    
<form action="abmUsuario.php?scr=modificando&id_usu=<?php echo $id;?>" method="post" name="form1" id="form1">
  <table width="507" border="1" align="center">
    <tbody>
      <tr>
        <th colspan="2" scope="col">Agregar Usuario - Ultima Actualizacion: <?PHP echo $fec_act;?> </th>
      </tr>
      <tr>
        <td width="135"><label for="id_usu">Nro Id. Usuario:</label></td>
        <td width="356"><input name="id_usu" type="text" disabled id="id_usu" size="5" maxlength="5" value="<?php echo $id;?>"></td>
        
    
        </tr>
      <tr>
        <td><label for="usuario">Usuario:</label></td>
        <td><input name="usuario" type="text" id="usuario" size="10" maxlength="10" value="<?php echo $usuario; ?>" required>
        (*)</td>
      </tr>
      <tr>
        <td><label for="clave">Clave:</label></td>
        <td><input name="clave" type="password" id="clave" size="10" maxlength="10" value="XXXXXXXXXXXXXXXX" required>
        (*)</td>
      </tr>
      <tr>
        <td><label for="acceso">Sector/Acceso:</label></td>
        <td><select name="acceso" id="acceso">
          <option value="2" <?PHP echo ($acceso == 2) ? 'selected="selected"':''; ?>>Administracion</option>
          <option value="3" <?PHP echo ($acceso == 3) ? 'selected="selected"':''; ?>>Ventas</option>
          <option value="4" <?PHP echo ($acceso == 4) ? 'selected="selected"':''; ?>>Deposito</option>
          <option value="5" <?PHP echo ($acceso == 5) ? 'selected="selected"':''; ?>>Rectificadora</option>
        </select></td>
      </tr>
      <tr>
        <td><label for="nombre">Apellido y Nomb.:</label></td>
        <td><input name="nombre" type="text" id="nombre" size="20" maxlength="20" value="<?php echo $nombre; ?>" required>
          (*)</td>
      </tr>
      <tr>
        <td><label for="email">Email:</label></td>
        <td><input name="email" type="text" id="email" size="20" maxlength="20" value="<?php echo $email; ?>"></td>
      </tr>
      <tr>
        <td><label for="sucursal">Sucursal:</label></td>
        <td>
         <select name="sucursal" id="sucursal">
          <option value="1" <?PHP echo ($sucursal == 1) ? 'selected="selected"':''; ?>>Central</option>
          <option value="2" <?PHP echo ($sucursal == 2) ? 'selected="selected"':''; ?>>Italia</option>
          <option value="3" <?PHP echo ($sucursal == 3) ? 'selected="selected"':''; ?>>Moreno</option>
          <option value="4" <?PHP echo ($sucursal == 4) ? 'selected="selected"':''; ?>>Nva. Formosa</option>
          <option value="6" <?PHP echo ($sucursal == 5) ? 'selected="selected"':''; ?>>Deposito Central</option>
        </select>
      </td>
      </tr>
      <tr>
        <td><label for="foto">Foto:</label></td>
        <td><input name="foto" type="file" id="foto" disabled></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
        <a href="abmUsuario.php" class="btn btn-outline-secondary">Cancela</a> - 
        <input class="btn btn-outline-success" type="submit" name="scr" id="scr" value="Modificar Usuario"></td>
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
		echo "<div class='alert alert-success' role='alert'>Usuario Actualizado Correctamente.</div>";
		echo "<td colspan='6' align='center'><a href='abmUsuario.php' class='btn btn-outline-secondary'>VOLVER</a>";
	   
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<div class='alert alert-danger' role='alert'>Error al Actualizar usuario.</div>";
    echo "<td colspan='6' align='center'><a href='abmUsuario.php' class='btn btn-outline-secondary'>VOLVER</a>";
	}

}


?>