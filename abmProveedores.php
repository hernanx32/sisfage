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


//Validamos si existe la Var SCR
if (isset($_GET['scr'])){
	$scr=$_GET['scr'];
    
	if ($scr=="agregar"){
        agregar($conn);   
        }
    elseif($scr=="eliminar_prov"){
		$id_el_us=$_GET['id'];
    	elimina_prov($conn, $id_el_us);
    }	
}else{
    //PANTALLA PRINCIPAL
}
        
//actualizado
$focus='buscar_us';
$conn->close();
pieprincipal($focus,$path);
?>