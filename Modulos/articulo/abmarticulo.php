<?php
function abmarticulo($conn)
{
?>
    <script>
        function confirmarEnlace(event) {
            // Mostrar mensaje de confirmación
            var confirmacion = confirm("¿Estás seguro que desea deshabilitar el Articulo?");
            if (!confirmacion) {
                // Si el usuario cancela, evitar que el enlace se abra
                event.preventDefault();
            }
        }
    </script>
<form id="form1" name="form1" method="post">
  <table width="1010" border="1" align="center">
    <tbody>
      <tr>
        <th colspan="3" scope="col">ABM ARTICULOS</th>
        <th colspan="2" scope="col"><div align="center"><a href="abmArticulo.php?scr=agregar">AGREGAR ARTICULO</a></div></th>
      </tr>
      <tr>
        <td width="162"><label for="BuscarArt">
          <input name="BuscarArt" type="text" id="BuscarArt" size="20" maxlength="20">
        </label></td>
        <td width="132"><input type="submit" name="submit" id="submit" value="Buscar"></td>
        <td width="237" align="center"><a>Filtro por Proveedor</a></td>
        <td width="61" align="center"><input name="cod_provee" type="text" disabled id="cod_provee" size="5" maxlength="5"></td>
        <td width="184" align="center"><input name="nomb_provee" type="text" disabled id="nomb_provee" size="30" maxlength="30"></td>
      </tr>
      <tr>
        <td colspan="5" align="center">
            <table width="100%" border="1">
          <tbody>
            <tr>
              <th scope="col">Ref.</th>
              <th scope="col">C.Prov</th>
              <th scope="col">Cod.Barra</th>
              <th scope="col">Descripción </th>
              <th scope="col">Costo</th>
              <th scope="col">Precio 1</th>
              <th scope="col">Precio 2 </th>
              <th scope="col">Acciones</th>
          </tr>
        <?PHP 
$sql = "SELECT id_articulo, cod_prov, cod_bar, desc_larga, costo, precio1, precio2 FROM articulo WHERE estado = 1 LIMIT 20";
$result = $conn->query($sql);      
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        echo "<tr><td>";
        echo $row['id_articulo'];
        echo "</td><td>";
        echo $row['cod_prov'];
        echo "</td><td>";
        echo $row['cod_bar'];
        echo "</td><td>";
        echo $row['desc_larga'];
        echo "</td><td>";
        echo "$" . number_format($row['costo'], 2);
        echo "</td><td>";
        echo "$" . number_format($row['precio1'], 2);
        echo "</td><td>";
        echo "$" . number_format($row['precio2'], 2);
        echo "</td><td align='center'>";
        echo "<a href='abmArticulo.php?scr=modificar&id=".$row['id_articulo']."'>Modificar</a> - <a  href='abmArticulo.php?scr=eliminar&id=".$row['id_articulo']."' onclick='confirmarEnlace(event)'>Eliminar</a> </td></tr>"; 
    
    }
} else {
    echo "<td colspan='8'>No se Encontraron Resultados<td>";
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
?>