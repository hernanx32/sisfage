<?php
function abmUsuario($conn)
{
?>

<form>
<table width="650" border="1" align="center">
  <tbody>
    <tr>
      <th colspan="4" scope="col">
        <label for="buscar_us">Buscar:</label>
        <input type="text" name="buscar_us" id="buscar_us">
        <input type="button" name="button" id="button" value="Buscar"></th>
      <th colspan="2" align="center" scope="col"><div align="center"><a href="../abmUsuario.php?scr=agregar">AGREGAR USUARIO</a></div></th>
      </tr>
    <tr align="center" bgcolor="#8E9EFD">
      <td width="40">ID</td>
      <td width="103">Usuario</td>
      <td width="184">Nombre</td>
      <td width="91">Sucursal</td>
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
        echo "<a href='abmUsuario.php?scr=modificar&id=".$row['id_usuario']."'>Modificar</a> - <a href='abmUsuario.php?scr=eliminar&id=".$row['id_usuario']."'>Eliminar</a> </td></tr>"; 
    
    }
} else {
    echo "0 resultados";
}
echo "</tbody></table></form>";

} 
	  
	  
	  
	  
	  
	  
	  ?>