<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - ABM Usuarios';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("menu.php");
include("Modulos/usuario/abmUsuario.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);


//Validamos si existe la Var SCR
if (isset($_GET['scr'])){
/* Pantallas
	eliminar
	edita
	editado
	agregar
	agregado  */
	$scr=$_GET['scr'];
    
	if ($scr=="agregar"){
        agregar($conn);   
    }elseif($scr=="eliminar"){
		$id_el_us=$_GET['id'];
    	elimina_usu($conn, $id_el_us);
    }


}else{
	abmUsuario($conn);
}

?>


<?PHP
$focus='buscar_us';
$conn->close();
pieprincipal($focus,$path);
?>