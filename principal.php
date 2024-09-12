<?php
session_start();

$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - Principal';
$path='';
$focus='';


include($path."Modulos/html.php");
include($path."Modulos/conex.php");
include($path."Modulos/menu.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);
echo $nro_cat;	

echo "Pag. Principal en Construcción.";



pieprincipal($focus,$path);

?>
