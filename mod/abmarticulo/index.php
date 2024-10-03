<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - ABM Articulo';
$path='';

include("/sisfage/Modulos/html.php");
include("/sisfage/Modulos/conex.php");
include("/sisfage/Modulos/menu.php");
//include("Modulos/articulo/abmArticulo.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);

$focus='buscar_us';
$conn->close();
pieprincipal($focus,$path);
?>