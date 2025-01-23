<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - ABM Sucursales';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");
include("Modulos/abmProv.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);


//Validamos si existe la Var SCR
if (isset($_GET['scr'])){
	$scr=$_GET['scr'];
    
	if ($scr=="agregar"){
        agregar($conn);   
        }
    elseif($scr=="eliminar"){
		$id_elim_prov=$_GET['id'];
    	elimina_prov($conn, $id_elim_prov);
    }
    elseif($scr=="agregarnuevo"){
        //CARGAMOS LOS DATOS DEL POST
        $Dato2=$_POST['nro_suc'];
        $Dato3=$_POST['nomb_suc'];
        $Dato4=$_POST['domic'];
        $Dato5=$_POST['estado'];
        
        $consulta="INSERT INTO `sucursales` (`id_sucursal`, `nro_suc`, `nomb_suc`, `domicilio`, `estado`) VALUES (NULL, '$Dato2', '$Dato3', '$Dato4', '$Dato5')";
        
        agregado($conn, $consulta);
        }
        
    elseif($scr=="modificar"){
        $id_usu=$_GET['id'];
        form_modi_suc($conn, $id_usu );
        }
    
    //MODIFICANDO DATOS 
    elseif($scr=="modificando"){
       
        $Dato1=$_POST['id_suc'];
        $Dato2=$_POST['nro_suc'];
        $Dato3=$_POST['nomb_suc'];
        $Dato4=$_POST['domic'];
        $Dato5=$_POST['estado'];
        
        $consulta= "       
        UPDATE `sucursales` SET `nro_suc` = '$Dato2', `nomb_suc` = '$Dato3', `domicilio` = '$Dato4', `estado` = '$Dato5'  WHERE `sucursales`.`id_sucursal` = '$Dato1'";
    
         
			modificando($conn, $consulta);		
		}
        }else{
        //PANTALLA PRINCIPAL DE USUARIO
           
    // Definir el número de registros por página (por defecto, 20)
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 20;

// Obtener el número de la página actual (por defecto, la página 1)
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Obtener el término de búsqueda (si existe)
$search = isset($_GET['Buscar']) ? $_GET['Buscar'] : '';

// Calcular el offset basado en la página y el límite
$offset = ($page - 1) * $limit;

// Modificar la consulta SQL con filtro de búsqueda
$sql = "SELECT `id_proveedor`, `nombre`, `direccion`, `localidad`, `nro_doc` 
        FROM proveedor 
        WHERE estado = '1' AND 
              (nombre LIKE '%$search%' OR 
               direccion LIKE '%$search%' OR 
               localidad LIKE '%$search%' OR 
               nro_doc LIKE '%$search%')
        LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);

// Contar el total de registros para la paginación considerando el filtro de búsqueda
$count_sql = "SELECT COUNT(*) as total 
              FROM proveedor 
              WHERE estado = '1' AND 
                    (nombre LIKE '%$search%' OR 
                     direccion LIKE '%$search%' OR 
                     localidad LIKE '%$search%' OR 
                     nro_doc LIKE '%$search%')";
$count_result = $conn->query($count_sql);
$total_rows = $count_result->fetch_assoc()['total'];

// Calcular el número total de páginas
$total_pages = ceil($total_rows / $limit);
?>
  <div class="card-header">
    <h3 class="card-title">ABM Proveedores</h3>
  </div>

  <!-- Formulario con filtro de búsqueda y límite de registros  
    clase quitada class="table table-bordered table-striped" -->
  <form method="GET" action="abmProveedores.php">
    <div>
      <table width="1200" border="0" align="center" >
        <tbody>
          <tr>
            <th align="left" scope="col"><label for="limit">Registros por página:</label>
              <select name="limit" id="limit" onChange="this.form.submit()">
                <option value="20" <?php if ($limit == 20) echo 'selected'; ?>>20</option>
                <option value="50" <?php if ($limit == 50) echo 'selected'; ?>>50</option>
                <option value="100" <?php if ($limit == 100) echo 'selected'; ?>>100</option>
                <option value="200" <?php if ($limit == 200) echo 'selected'; ?>>200</option>
                <option value="1000" <?php if ($limit == 1000) echo 'selected'; ?>>1000</option>
                <option value="999999" <?php if ($limit == 100000) echo 'selected'; ?>>TODO</option>
              </select>
-
<input name="Buscar" type="search" id="Buscar" value="<?php echo htmlspecialchars($search); ?>" placeholder="Buscar"></th>
            <th scope="col">Agregar Proveedor</th>
          </tr>
        </tbody>
      </table>
    </div>
  </form>

  <!-- Tabla de proveedores -->
  <table width="1200" border="1" align="center" >
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Localidad</th>
        <th>Cuil/Cuit</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?PHP 
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row['id_proveedor'] . "</td>";
          echo "<td>" . $row['nombre'] . "</td>";
          echo "<td>" . $row['direccion'] . "</td>";
          echo "<td>" . $row['localidad'] . "</td>";
          echo "<td>" . $row['nro_doc'] . "</td>";
          echo "<td align='center'>";
          echo "<a href='abmProveedores.php?scr=modificar&id=" . $row['id_proveedor'] . "'>Editar</a> - ";
          echo "<a href='abmProveedores.php?scr=eliminar&id=" . $row['id_proveedor'] . "' onclick='confirmarEnlace(event)'>Eliminar</a>";
          echo "</td></tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No se encontraron resultados</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <!-- Paginación -->
<table width="1200" border="0" align="center" >
    <tbody>
      <tr>
        <th align="right" scope="col"><?php
if ($page == 1){
      echo "Principio";  
        }else{
        ?>
          <a href="?page=1&limit=<?php echo $limit; ?>">Primera</a> - <a  href="?page=<?php echo $page - 1;?>&limit=<?php echo $limit; ?>">Anterior</a>
          <?PHP } 
        
        echo "- Paginas ". $page. ' de '. $total_pages ." - ";
    
        if ($page == $total_pages){
          echo "Final de Registros";  
        }elseif($total_pages==0){
            echo "Final de Registros";
        }else{ ?>
        <a href="?page=<?php echo $page + 1; ?>&limit=<?php echo $limit; ?>">Siguiente</a> - <a href="?page=<?php echo $total_pages; ?>&limit=<?php echo $limit; ?>">Última</a>          <?PHP }?>        </th>
      </tr>
    </tbody>
    </table>    
<?PHP
}

//actualizado
$conn->close();
pieprincipal($focus,$path);
?>