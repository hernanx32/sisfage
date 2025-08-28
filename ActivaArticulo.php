<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - Activar Articulos';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");
//include("Modulos/abmProv/abmProv.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);

if (!empty($_GET['scr'])){
	$codBar=$_GET['buscar'];	
	echo $codBar;
	
}

?>
<form id="form1" name="form1" method="get" action="ActivaArticulo.php">
  <table width="345" border="1" align="center">
    <tbody>
      <tr>
        <td width="335">Reactivacion de Articulos.</td>
      </tr>
      <tr>
        <td align="center"><input name="buscar" type="text" autofocus="autofocus" required="required" id="buscar" placeholder="Ingrese Cod. Barra" tabindex="1" size="20" maxlength="20">
        <input type="submit" name="scr" id="scr" value="Buscar"></td>
      </tr>
      </tbody>
  </table>
</form>

<?PHP
$focus='Buscar';
$conn->close();
pieprincipal($focus,$path);
?>