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
    elseif($scr=="agregarnuevo"){
        //CARGAMOS LOS DATOS DEL POST
		$nombre=$_POST['nombre'];
		$dir_prov=$_POST['dir_prov'];
		$prov_prove=$_POST['prov_prove'];
		$local_prov=$_POST['local_prov'];        
        $transporte=$_POST['transporte'];
		$cp_prov=$_POST['cp_prov'];
		$tipo_doc=$_POST['tipo_doc'];
		$Nro_doc=$_POST['Nro_doc'];
		$telprov1=$_POST['telprov1'];
		$telprov2=$_POST['telprov2'];
		$telprov3=$_POST['telprov3'];
		$otros=$_POST['otros'];

		
        $consulta="INSERT INTO `proveedor` 
        (`id_proveedor`, `nombre`, `direccion`, `provincia`, `localidad`, `codPostal`, `tel1`, `tel2`, `tel3`, `id_transporte`, `id_doc`, `nro_doc`, `otros`, `fec_act`) VALUES
        (NULL, '$nombre', '$dir_prov', '$prov_prove', '$local_prov', '$cp_prov', '$telprov1', '$telprov2', '$telprov3', '$transporte', '$tipo_doc', '$Nro_doc', '$otros', '$fecha')";
        
      /*  $consulta="INSERT INTO `proveedor` (`id_sucursal`, `nro_suc`, `nomb_suc`, `domicilio`, `estado`) VALUES (NULL, '$Dato2', '$Dato3', '$Dato4', '$Dato5')";*/
        
        
        agregado($conn, $consulta); 
        }
        
	
    elseif($scr=="modificar"){
        $id_usu=$_GET['id'];
        form_modi_usu($conn, $id_usu );
        }
    
    //MODIFICANDO DATOS 
    elseif($scr=="modificando"){
       
        $id_usu=$_GET['id_usu'];
        $n_usuario=$_POST['usuario'];
        $id_acces=$_POST['acceso'];
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $id_sucursal=$_POST['sucursal'];
            
        $clave=$_POST['clave'];
        echo $fecha; 
        echo "<br>"; 
  
          
      if ($clave=='XXXXXXXXXXXXXXXX'){
                $consulta= "UPDATE `usuario` SET `usuario` = '$n_usuario', `id_acceso` = '$id_acces', `nombre` = '$nombre', `id_sucursal` = '$id_sucursal' WHERE `usuario`.`id_usuario` = '$id_usu'";
            }else{
                $clave=md5($_POST['clave']);
                $consulta= "UPDATE `usuario` SET `usuario` = '$n_usuario', `clave` = '$clave', `id_acceso` = '$id_acces', `nombre` = '$nombre', `id_sucursal` = '$id_sucursal' WHERE `usuario`.`id_usuario` = '$id_usu'";
         }
			modificando($conn, $consulta);		
		}
        }else{
        //PANTALLA PRINCIPAL DE USUARIO
            abmproveedor($conn);
        }
//actualizado
$focus='buscar_us';
$conn->close();
pieprincipal($focus,$path);
?>