<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - ABM Ingreso Proveedor';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");
include("Modulos/ABMRemIngProv/rem_ing_prov.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);


//Validamos si existe la Var SCR
if (isset($_GET['scr'])){
	$scr=$_GET['scr'];

}else{
  //ABM PRINCIPAL

// Definir el número de registros por página (por defecto, 20)
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 20;

// Obtener el número de la página actual (por defecto, la página 1)
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Obtener el término de búsqueda (si existe)
$search = isset($_GET['Buscar']) ? $_GET['Buscar'] : '';
    
// Obtener el término de búsqueda (si existe)
$proveedor = isset($_GET['proveedor']) ? $_GET['proveedor'] : '';    

// Calcular el offset basado en la página y el límite
$offset = ($page - 1) * $limit;

// Modificar la consulta SQL con filtro de búsqueda

if($proveedor > 0){
$sql = "SELECT `id_articulo`,`cod_bar_prov`, `cod_bar`, `desc_larga`, `costo`, `precio1`, `fec_act`
        FROM articulo 
        WHERE estado = '1' AND 
              id_proveedor = '$proveedor' AND	   
              (desc_larga LIKE '%$search%' OR 
               id_articulo LIKE '%$search%' OR 
               cod_bar_prov LIKE '%$search%' OR 
               cod_bar LIKE '%$search%')
        ORDER BY `desc_larga` ASC
        LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);

// Contar el total de registros para la paginación considerando el filtro de búsqueda
$count_sql = "SELECT COUNT(*) as total 
              FROM articulo 
              WHERE estado = '1' AND 
                    id_proveedor = '$proveedor' AND
              (desc_larga LIKE '%$search%' OR 
                     id_articulo LIKE '%$search%' OR 
                     cod_bar_prov LIKE '%$search%' OR 
                     cod_bar LIKE '%$search%')";
$count_result = $conn->query($count_sql);
$total_rows = $count_result->fetch_assoc()['total'];

// Calcular el número total de páginas
$total_pages = ceil($total_rows / $limit);}else{
    
 $sql = "SELECT `id_articulo`,`cod_bar_prov`, `cod_bar`, `desc_larga`, `costo`, `precio1`, `fec_act`
        FROM articulo 
        WHERE estado = '1' AND 
              (desc_larga LIKE '%$search%' OR 
               id_articulo LIKE '%$search%' OR 
               cod_bar_prov LIKE '%$search%' OR 
               cod_bar LIKE '%$search%')
        ORDER BY `desc_larga` ASC
        LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);

// Contar el total de registros para la paginación considerando el filtro de búsqueda
$count_sql = "SELECT COUNT(*) as total 
              FROM articulo 
              WHERE estado = '1' AND 
                    (desc_larga LIKE '%$search%' OR 
                     id_articulo LIKE '%$search%' OR 
                     cod_bar_prov LIKE '%$search%' OR 
                     cod_bar LIKE '%$search%')";
$count_result = $conn->query($count_sql);
$total_rows = $count_result->fetch_assoc()['total'];

// Calcular el número total de páginas
$total_pages = ceil($total_rows / $limit);   
} 

?>
    <script>
        function confirmarEnlace(event) {
            // Mostrar mensaje de confirmación
            var confirmacion = confirm("¿Estás seguro que desea Eliminar el Articulo?");
            if (!confirmacion) {
                // Si el usuario cancela, evitar que el enlace se abra
                event.preventDefault();
            } 
        }
    </script>    
<form id="form1" name="form1" method="post">

<table width="1200" border="0" align="center">
      <tbody>0
        <tr>
          <th colspan="2" scope="col">ABM Ingreso de Proveedor</th>
        </tr>
        <tr>
          <td width="1028"><input name="buscar" type="search" id="buscar" value="<?php echo htmlspecialchars($search); ?>" placeholder="Buscar" tabindex="1">
            <label for="proveedor">-Filtro por Proveedor:</label>
              <select name="proveedor" id="proveedor" onChange="this.form.submit()">      
      <option value="0" <?php if ($proveedor == 0) echo 'selected'; ?>>Todos</option>      
      <?PHP
            $sql_prov = "SELECT * FROM proveedor ORDER BY nombre ";
            $resultado = $conn->query($sql_prov);
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<option value="'; 
                    echo $fila['id_proveedor'];
                    echo '" ';
                    if ($proveedor == $fila['id_proveedor']) echo 'selected'; 
                    echo '>' . $fila['nombre'] . '</option>';
                }
            } else {
                echo '<option value="">No hay datos disponibles</option>';
            }
            ?>			 
          </select>
            <label for="select"> - Registros:</label>
            <select name="limit" id="limit" onChange="this.form.submit()">
                <option value="20" <?php if ($limit == 20) echo 'selected'; ?>>20</option>
                <option value="50" <?php if ($limit == 50) echo 'selected'; ?>>50</option>
                <option value="100" <?php if ($limit == 100) echo 'selected'; ?>>100</option>
                <option value="200" <?php if ($limit == 200) echo 'selected'; ?>>200</option>
                <option value="1000" <?php if ($limit == 1000) echo 'selected'; ?>>1000</option>
                <option value="999999" <?php if ($limit == 100000) echo 'selected'; ?>>TODO</option>
            </select></td>
          <td width="162"><a class="btn btn-primary" href="abmRem_ing_prov.php?scr=agregar">Nuevo Ingreso</a></td>
        </tr>
        <tr>
          <td colspan="2"><table width="1190" border="1" align="center">
            <tbody>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Sucursal</th>
                <th scope="col">Nro. Remito</th>
                <th scope="col">Fecha Ing</th>
                <th scope="col">Nro. Fac</th>
                <th scope="col">Acciones</th>
              </tr>
             
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
                
                
            </tbody>
          </table></td>
        </tr>
      </tbody>
</table>
</form>
    
    
<?PHP
$focus='buscar';

}

if (!isset($focus)){
    $focus='';
}

$conn->close();
pieprincipal($focus,$path);
?>