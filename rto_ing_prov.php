<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - ABM Articulo';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");
//include("Modulos/abmArticulo/abmArticulo.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);

?>
<form action="rto_ing_prov.php" method="post">
<table border="1">
    <tr>
        <td>
    Ing
    </td>    
    </tr>
    
    
    </table>

</form>
<?PHP 
if (!isset($focus)){
    $focus='';
}

$conn->close();
pieprincipal($focus,$path);
?>