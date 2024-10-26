<?php
session_start();

$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - AbmProveedores';
$path='';
$focus='buscarPovee';

include($path."Modulos/html.php");
include($path."Modulos/conex.php");
include($path."Modulos/menu.php");

include($path."Modulos/abmProv.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);

if (isset($_GET['scr'])){

	$scr=$_GET['scr'];
    
	if ($scr=="agregar"){
        $id_el_art=$_GET['id'];
        agregar($conn, $id_el_art);
     }elseif($scr=="modificar"){
		$id_el_art=$_GET['id'];
    	modificar_prov($conn, $id_el_art);        
    }elseif($scr=="eliminar"){
		$id_el_art=$_GET['id'];
    	elimina_art($conn, $id_el_art);
        
    }elseif($scr=="agregarnuevo"){
        //CARGAMOS LOS DATOS DEL POST
        $usuario=$_POST['usuario'];
        $clave=md5($_POST['clave']);
        $id_acces=$_POST['acceso'];
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $id_sucursal=$_POST['sucursal'];
      
        $consulta="INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`, `id_acceso`, `nombre`, `email`, `editable`, `id_sucursal`, `fec_act`) VALUES (NULL, '$usuario', '$clave', '$id_acces', '$nombre', '$email', '1', '$id_sucursal', '$fecha')";
        
        agregado($conn, $consulta);
    
    }


}else{
	abmaprov($conn);
}



pieprincipal($focus,$path);

?>
