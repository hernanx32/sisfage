<?php

session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];
$path='';
$titulo='Sistema - ABM Articulo';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");
include("Modulos/RemIngProv/RemIngProv.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);

if (isset($_GET['scr'])){
    	$scr=$_GET['scr'];
}else{

$consulta="SELECT `id_articulo`,`cod_bar_prov`, `cod_bar`, `desc_larga`, `costo`, `precio1`, `fec_act` FROM articulo WHERE estado = 1 LIMIT 100";
abmRemIngProv($conn,$consulta);   
$focus='busqueda';    

}



$focus='s';
$conn->close();
pieprincipal($focus,$path);
?>