<?php
function abmUsuario($conn)
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
<form action="abmUsuario.php?scr=buscar">
<table width="750" border="1" align="center">
  <tbody>
    <tr>
      <th colspan="4" scope="col">
        <label for="buscar_us">ABM Usuarios</label>
       </th>
      <th colspan="2" align="center" scope="col"><div align="center"><a href="abmUsuario.php?scr=agregar">AGREGAR USUARIO</a></div></th>
      </tr>
    <tr align="center" bgcolor="#8E9EFD">
      <td width="40">ID</td>
      <td width="103">Usuario</td>
      <td width="184">Nombre</td>
      <td width="191">Sucursal</td>
      <td width="56">Acceso</td>
      <td width="150">Acciones</td>
    </tr>
      
<?PHP  
$sql = "
SELECT 
usuario.id_usuario, usuario.usuario, usuario.nombre,
sucu.nomb_suc AS nomb_suc,
acc.nombre AS acc_nombre
  FROM usuario
JOIN sucursales AS sucu 
	ON usuario.id_sucursal = sucu.id_sucursal
JOIN acceso AS acc
  ON usuario.id_acceso = acc.id_acceso
    WHERE id_usuario != 1 
";
      
$result = $conn->query($sql);      
      

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        echo "<tr><td>";
        echo $row['id_usuario'];
        echo "</td><td>";
        echo $row['usuario'];
        echo "</td><td>";
        echo $row['nombre'];
        echo "</td><td>";
        echo $row['nomb_suc'];
        echo "</td><td>";
        echo $row['acc_nombre'];
        echo "</td><td align='center'>";
        echo "<a href='abmUsuario.php?scr=modificar&id=".$row['id_usuario']."'>Modificar</a> - <a  href='abmUsuario.php?scr=eliminar&id=".$row['id_usuario']."' onclick='confirmarEnlace(event)'>Eliminar</a> </td></tr>"; 
    
    }
} else {
	  echo "<tr><td colspan='6'>0 resultados</td></tr>";
}
echo "</tbody></table></form>";

} 
//AGREGAR FORMULARIO PARA AGREGAR USUARIO	  
function agregar($conn){
?>
 <form action="abmUsuario.php?scr=agregarnuevo" method="post" name="form1" id="form1">
  <table width="507" border="1" align="center">
    <tbody>
      <tr>
        <th colspan="2" scope="col">Agregar Usuario</th>
      </tr>
      <tr>
        <td width="135"><label for="id_usu">Nro Id. Usuario:</label></td>
        <td width="356"><input name="id_usu" type="text" disabled id="id_usu" size="5" maxlength="5"></td>
      </tr>
      <tr>
        <td><label for="usuario">Usuario:</label></td>
        <td><input name="usuario" type="text" id="usuario" size="10" maxlength="10" required> 
          (*)</td>
      </tr>
      <tr>
        <td><label for="clave">Clave:</label></td>
        <td><input name="clave" type="password" id="clave" size="10" maxlength="10" required>
        (*)</td>
      </tr>
      <tr>
        <td><label for="acceso">Sector/Acceso:</label></td>
        <td><select name="acceso" id="acceso">
          <option value="2">Administracion</option>
          <option value="3">Ventas</option>
          <option value="4">Deposito</option>
          <option value="5">Rectificadora</option>
        </select></td>
      </tr>
      <tr>
        <td><label for="nombre">Apellido y Nomb.:</label></td>
        <td><input name="nombre" type="text" id="nombre" size="20" maxlength="20" required>
          (*)</td>
      </tr>
      <tr>
        <td><label for="email">Email:</label></td>
        <td><input name="email" type="text" id="email" size="20" maxlength="20"></td>
      </tr>
      <tr>
        <td><label for="sucursal">Sucursal:</label></td>
        <td>
         <select name="sucursal" id="sucursal">
          <option value="1">Central</option>
          <option value="2">Italia</option>
          <option value="3">Moreno</option>
          <option value="4">Nva. Formosa</option>
          <option value="6">Deposito Central</option>
        </select>
      </td>
      </tr>
      <tr>
        <td><label for="foto">Foto:</label></td>
        <td><input name="foto" type="file" id="foto" disabled></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><a href="abmUsuario.php" class="btn btn-outline-secondary">Cancela</a> - 
        <input class="btn btn-outline-success" type="submit" name="scr" id="scr" value="agregado"></td>
      </tr>
    </tbody>
  </table>
</form>
<?PHP
 }
//FUNCION INSERTAR NUEVO USUARIO
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

//FUNCION ELIMINA USUARIO
function elimina_usu($conn, $id ){
	//CODIGO DE CONSULTA DE ELIMINACION DEL REGISTRO
	$sql = "DELETE FROM usuario WHERE `usuario`.`id_usuario` = '$id'";
	//EJECUTANDO CODIGO DE ELIMINACION 
	if ($conn->query($sql) === TRUE) {
		//MENSAJE EN CASO QUE SEA CORRECTO	
		echo "<div class='alert alert-success' role='alert'>Usuario Eliminado Correctamente.</div>";
		echo "<td colspan='6' align='center'><a href='abmUsuario.php' class='btn btn-outline-secondary'>VOLVER</a>";
	   
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<div class='alert alert-danger' role='alert'>Error Al eliminar usuario.</div>";
    echo "<td colspan='6' align='center'><a href='abmUsuario.php' class='btn btn-outline-secondary'>VOLVER</a>";
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