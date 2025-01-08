<?PHP
session_start();
$fecha=date('Y-m-d');
$id_us='1';
$usuario='Hernan';
$nro_cat='1';
$nom_completo='Ayala Hernan';

$titulo='Sistema - ABM Articulo';
$path='../';

include($path."Modulos/html.php");
include($path."Modulos/conex.php");
include($path."Modulos/menu.php");
include($path."Modulos/abmArticulo/abmArticulo.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);


//actualizado
$focus='buscar_us';
$conn->close();
pieprincipal($focus,$path);
?>