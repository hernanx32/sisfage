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
include("Modulos/abmProv/abmProv.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);


//Validamos si existe la Var SCR
if (isset($_GET['scr'])){
	$scr=$_GET['scr'];
    
	if ($scr=="agregar"){
        agregar($conn);   
        }

    elseif($scr=="agregarnuevo"){
        //CARGAMOS LOS DATOS DEL POST
        $Dato2=$_POST['nombre'];
        $Dato3=$_POST['prov_prove'];
        $Dato4=$_POST['local_prov'];
        $Dato5=$_POST['cp_prov'];
        $Dato6=$_POST['telprov1'];
        $Dato7=$_POST['telprov2'];
        $Dato8=$_POST['telprov3'];
        $Dato9=$_POST['fec_prov'];
        $Dato10=$_POST['dir_prov'];
        $Dato11=$_POST['transporte'];
        $Dato12=$_POST['tipo_doc'];
        $Dato13=$_POST['nro_doc'];
        $Dato14=$_POST['otros'];
        
        
        
        $consulta="INSERT INTO `proveedor`
        (`id_proveedor`,`nombre`,`direccion`,`provincia`,`localidad`,`codPostal`,`tel1`,`tel2`,`tel3`,`id_transporte`,`id_doc`,`nro_doc`,`otros`,`estado`,`fec_act`) VALUES 
        (NULL,          '$Dato2', '$Dato10', '$Dato3', '$Dato4',    '$Dato5',    '$Dato6', '$Dato7', '$Dato8', '$Dato11', '$Dato12', '$Dato13', '$Dato14', '1', '$fecha')";
        
        agregado($conn, $consulta);
        }
        
    elseif($scr=="modificar"){
        $id_prov=$_GET['id'];
        form_modi_prov($conn, $id_prov );
        }
    
    //MODIFICANDO DATOS 
    elseif($scr=="modificando"){
        $Dato1=$_POST['id_prov'];
        $Dato2=$_POST['nombre'];
        $Dato3=$_POST['prov_prove'];
        $Dato4=$_POST['local_prov'];
        $Dato5=$_POST['cp_prov'];
        $Dato6=$_POST['telprov1'];
        $Dato7=$_POST['telprov2'];
        $Dato8=$_POST['telprov3'];

        $Dato10=$_POST['dir_prov'];
        $Dato11=$_POST['transporte'];
        $Dato12=$_POST['tipo_doc'];
        $Dato13=$_POST['nro_doc'];
        $Dato14=$_POST['otros'];
        
        $consulta= "       
        UPDATE `proveedor` SET `nombre` = '$Dato2', `provincia` = '$Dato3', `localidad` = '$Dato4', `codPostal` = '$Dato5', `tel1` = '$Dato6', `tel2` = '$Dato7', `tel3` = '$Dato8', `fec_act` = '$fecha', `direccion` = '$Dato10', `id_transporte` = '$Dato11', `id_doc` = '$Dato12', `nro_doc` = '$Dato13', `otros` = '$Dato14'  WHERE `id_proveedor` = '$Dato1'";
    
         
			modificando($conn, $consulta);		
		}
        //ELIMINA REGISTRO 
        elseif($scr=="eliminar"){
		$id_elim_prov=$_GET['id'];
    	elimina_prov($conn, $id_elim_prov, $fecha);
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
               id_proveedor LIKE '%$search%' OR 
               nro_doc LIKE '%$search%')
        ORDER BY `nombre` ASC
        LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);

// Contar el total de registros para la paginación considerando el filtro de búsqueda
$count_sql = "SELECT COUNT(*) as total 
              FROM proveedor 
              WHERE estado = '1' AND 
                    (nombre LIKE '%$search%' OR 
                     direccion LIKE '%$search%' OR 
                     id_proveedor LIKE '%$search%' OR 
                     nro_doc LIKE '%$search%')";
$count_result = $conn->query($count_sql);
$total_rows = $count_result->fetch_assoc()['total'];

// Calcular el número total de páginas
$total_pages = ceil($total_rows / $limit);
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
  <div class="card-header">
    <h3 class="card-title"></h3>
  </div>

  <!-- Formulario con filtro de búsqueda y límite de registros  
    clase quitada class="table table-bordered table-striped" -->
  <form id="form_prov" method="GET" action="abmProveedores.php">
    <div>
      <table width="1200" border="0" align="center" >
        <tbody>
          <tr>
              <th><label for="limit"><h2>ABM Proveedores</h2></label></th>
            </tr>
            <tr>
            <th align="left" scope="col"><label for="limit">Registros:</label>
              <select name="limit" id="limit" onChange="this.form.submit()">
                <option value="20" <?php if ($limit == 20) echo 'selected'; ?>>20</option>
                <option value="50" <?php if ($limit == 50) echo 'selected'; ?>>50</option>
                <option value="100" <?php if ($limit == 100) echo 'selected'; ?>>100</option>
                <option value="200" <?php if ($limit == 200) echo 'selected'; ?>>200</option>
                <option value="1000" <?php if ($limit == 1000) echo 'selected'; ?>>1000</option>
                <option value="999999" <?php if ($limit == 100000) echo 'selected'; ?>>TODO</option>
              </select>
-
<input type="text" name="Buscar" id="Buscar" value="<?php echo htmlspecialchars($search); ?>" placeholder="Buscar"></th>
            <th scope="col" ><a class="btn btn-primary" href="abmProveedores.php?scr=agregar">Agregar Proveedor</a></th>
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
$focus='Buscar';
$conn->close();
pieprincipal($focus,$path);
?>
 <script>
  window.onload = function() {
    document.getElementById("Buscar").focus();
  };
</script> 