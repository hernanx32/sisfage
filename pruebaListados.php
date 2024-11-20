<?php
session_start();

$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - ABM Proveedor';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");
include("Modulos/ABMProveedor/abmProveedor.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);

$pag_principal='pruebaListados.php';
$dato1='id';
$dato2='Cod.Barra';
$dato3='desc_larga';
$dato4='precio1';
$dato5='precio2';



?>

<form action="<?php echo $pag_principal;?>?scr=buscar">
<table width="1200" border="1" align="center">
  <tbody>
    <tr>
        <th colspan="6" scope="col">ABM Proveedor</th>
    </tr>
      <tr>
      <th colspan="5" scope="col">
        <label for="buscar">Buscar</label>
        <input type="text" id="buscar" name="buscar">
        <input name="Buscar" type="submit" id="Buscar" value="Buscar">  
       </th>
      <th colspan="1" align="center" scope="col"><div align="center"><a href="abmProveedores.php?scr=agregar">AGREGAR PROVEEDOR</a></div></th>
      </tr>
    <tr align="center" bgcolor="#8E9EFD">
      <td width="60"><?PHP echo $dato1;?></td>
      <td width="200"><?PHP echo $dato2;?></td>
      <td width="200"><?PHP echo $dato3;?></td>
      <td width="120"><?PHP echo $dato4;?></td>
      <td width="60"><?PHP echo $dato5;?></td>
      <td width="150">Acciones</td>
    </tr>
      
<?PHP  
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$results_per_page = 15;
$offset = ($page - 1) * $results_per_page;

// Consulta SQL con límite y desplazamiento
//$sql = "SELECT * FROM articulo LIMIT $offset, $results_per_page";
$sql = "SELECT * FROM articulo where id_articulo = '2' LIMIT $offset, $results_per_page";
$result = $conn->query($sql);
      
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        echo "<tr><td>";
        echo $row['id_articulo'];
        echo "</td><td>";
        echo $row['cod_bar'];
        echo "</td><td>";
        echo $row['desc_larga'];
        echo "</td><td>";
        echo $row['precio1'];
        echo "</td><td>";
        echo $row['precio2'];
        echo "</td><td align='center'>";
        echo "<a href='abmProveedores.php?scr=modificar&id=".$row['id_proveedor']."'>Editar</a> - <a  href='abmProveedores.php?scr=eliminar&id=".$row['id_proveedor']."' onclick='confirmarEnlace(event)'>Eliminar</a> </td></tr>"; 
    
    }
} else {
    echo "<td colspan='8'>No se Encontraron Resultados<td>";
}
echo "</tbody></table></form> </div>";

      
$sql_total = "SELECT COUNT(*) as total FROM articulo";
$result_total = $conn->query($sql_total);
$total_rows = $result_total->fetch_assoc()['total'];
$total_pages = ceil($total_rows / $results_per_page);

// Botón "Anterior"
if ($page > 1) {
    echo "<a href='?page=" . ($page - 1) . "'> <<<<< Anterior - </a>";
}

// Botón "Siguiente"
if ($page < $total_pages) {
    echo "<a href='?page=" . ($page + 1) . "'>Siguiente >>>>></a>";
}
      
      echo "<p>Página $page de $total_pages</p>";
//actualizado
$focus='buscar';
$conn->close();
pieprincipal($focus,$path);
?>