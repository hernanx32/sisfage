<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - ABM Sucursales';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");
include("Modulos/ABMSucursal/AbmSucursal.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);


//Validamos si existe la Var SCR
if (isset($_GET['scr'])){
	$scr=$_GET['scr'];
    
	if ($scr=="agregar"){
        agregar($conn);   
        }
    elseif($scr=="eliminar"){
		$id_el_us=$_GET['id'];
    	elimina_usu($conn, $id_el_us);
    }
    elseif($scr=="agregarnuevo"){
        //CARGAMOS LOS DATOS DEL POST
        $Dato2=$_POST['nro_suc'];
        $Dato3=$_POST['nomb_suc'];
        $Dato4=$_POST['domic'];
        $Dato5=$_POST['estado'];
        
        $consulta="INSERT INTO `sucursales` (`id_sucursal`, `nro_suc`, `nomb_suc`, `domicilio`, `estado`) VALUES (NULL, '$Dato2', '$Dato3', '$Dato4', '$Dato5')";
        
        agregado($conn, $consulta);
        }
        
    elseif($scr=="modificar"){
        $id_usu=$_GET['id'];
        form_modi_suc($conn, $id_usu );
        }
    
    //MODIFICANDO DATOS 
    elseif($scr=="modificando"){
       
        $Dato1=$_POST['id_suc'];
        $Dato2=$_POST['nro_suc'];
        $Dato3=$_POST['nomb_suc'];
        $Dato4=$_POST['domic'];
        $Dato5=$_POST['estado'];
        
        $consulta= "       
        UPDATE `sucursales` SET `nro_suc` = '$Dato2', `nomb_suc` = '$Dato3', `domicilio` = '$Dato4', `estado` = '$Dato5'  WHERE `sucursales`.`id_sucursal` = '$Dato1'";
    
         
			modificando($conn, $consulta);		
		}
        }else{
        //PANTALLA PRINCIPAL DE USUARIO
            abmSuc($conn);
        }
//actualizado
$focus='buscar_us';
$conn->close();
pieprincipal($focus,$path);
?>