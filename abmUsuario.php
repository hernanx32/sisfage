
<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - Remitos Internos';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("menu.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);
    include("Modulos/usuario/abmUsuario.php");


if (isset($_GET['scr'])){
    echo $_GET['scr'];    
}else{
    abm_Usuario($conn);
    
    
}



?>


<?PHP
$focus='buscar_us';
$conn->close();
pieprincipal($focus,$path);
?>