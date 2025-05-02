<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - Ventas';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");
//include("Modulos/abmProv/abmProv.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);


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
$sql = "SELECT `id_articulo`, `cod_bar`, `desc_larga`, `precio1`, fec_act 
        FROM `articulo`
        WHERE estado = '1' AND 
              (id_articulo LIKE '%$search%' OR 
               cod_bar LIKE '%$search%' OR 
               desc_larga LIKE '%$search%')
        ORDER BY `desc_larga` ASC
        LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);

// Contar el total de registros para la paginación considerando el filtro de búsqueda
$count_sql = "SELECT COUNT(*) as total 
              FROM `articulo` 
              WHERE estado = '1' AND 
                    (id_articulo LIKE '%$search%' OR 
                     cod_bar = '%$search%' OR 
                     desc_larga LIKE '%$search%')";
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
  <form id="form_prov" method="GET" action="ventas.php">
    <div>
      <table width="1200" border="0" align="center" >
        <tbody>
          <tr>
              <th><label for="limit"><h2>Articulos</h2></label></th>
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
<input name="Buscar" type="search" id="Buscar" placeholder="Buscar" autocomplete="on" value="<?php echo htmlspecialchars($search); ?>"></th>
            <th scope="col" >-</th>
          </tr>
        </tbody>
      </table>
    </div>
  </form>

  <!-- Tabla de proveedores -->
  <table width="1000" border="1" align="center" >
    <thead>
      <tr>
        <th>COD.INT</th>
        <th>Cod.Barra</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Fec. Act.</th>  
      </tr>
    </thead>
    <tbody>
      <?PHP 
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row['id_articulo'] . "</td>";
          echo "<td>" . $row['cod_bar'] . "</td>";
          echo "<td>" . $row['desc_larga'] . "</td>";
          echo "<td  align='right'>$" . number_format($row['precio1'], 2). "</td>";
        
        $fec_modifica =$row['fec_act'];
        if($fecha==$fec_modifica){
        echo "<td align='right' bgcolor='#09D320'>";    
        }else{
        echo "<td align='right'>";    
        }
        
        $fechaOriginal = $fec_modifica; // Fecha en formato ISO
        $timestamp = strtotime($fechaOriginal);
        echo date("d/m/Y", $timestamp) ."</td>";
                     
        //echo "<td align='right'>" . $row['fec_act'] . "</td>";
    
        
            echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No se encontraron resultados</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <!-- Paginación -->
<table width="1200" border="0" >
    <tbody align="center">
      <tr>
        <th align="center"><?php
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