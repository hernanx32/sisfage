<?php

session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - ABM Articulo';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");
include("Modulos/RemitoProv/editar.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);
echo 'Prueba';

$focus='s';
$conn->close();
pieprincipal($<<<<<<<<<<ccvbnm -][_ñ.,mnb z,$path);
?>