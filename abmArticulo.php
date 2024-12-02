<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - ABM Articulo';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");
include("Modulos/abmArticulo/abmArticulo.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);


//Validamos si existe la Var SCR
if (isset($_GET['scr'])){
	$scr=$_GET['scr'];
 
    //AGREGAR FORMULARIO AGREGAR ARTICULO NVO
    if ($scr=="agregar"){
        agregar($conn);   
        }
    //VALIDAR FORMULARIO DE AGREGAR Y INSERTAR EN BASES DE DATOS EL NVO ART.
    elseif($scr=="agregarnuevo"){
        agregado($conn, $consulta); 
  
    
    
    }
    
    //ELIMINAR 
    elseif($scr=="eliminar"){
		$id_art=$_GET['id'];
    	elimina_art($conn, $id_art, $id_us, $fecha);
    }

        
	//FORMULARIO DE EDICION
    elseif($scr=="modificar"){
        
        
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
  
		modificando($conn, $consulta);
        
        }elseif($scr=="costo"){
        costos($conn, $id);
        
        }elseif($scr=="mofifica_costo"){
        modifica_costo($conn, $id);
              
        //BUSQUEDA Y FILTROS 
		}elseif($scr=="Buscar"){
            $filtroBus=$_GET['select'];
            $Busqueda=$_GET['busqueda'];
        
            if($filtroBus=='desc'){
            $consulta="SELECT `id_articulo`,`cod_bar_prov`, `cod_bar`, `desc_larga`, `costo`, `precio1`, `precio2` FROM articulo 
            WHERE `desc_larga` LIKE '%$Busqueda%' OR `desc_corta` LIKE '%$Busqueda%' ";    
                
            }elseif($filtroBus=='cod_bar'){
            $consulta="SELECT `id_articulo`,`cod_bar_prov`, `cod_bar`, `desc_larga`, `costo`, `precio1`, `precio2` FROM articulo 
            WHERE `cod_bar` LIKE '%$Busqueda%' OR `cod_bar_prov` LIKE '%$Busqueda%' ";    
                
            }elseif($filtroBus=='cod_ref'){
            $consulta="SELECT `id_articulo`,`cod_bar_prov`, `cod_bar`, `desc_larga`, `costo`, `precio1`, `precio2` FROM articulo 
            WHERE `id_articulo` LIKE '%$Busqueda%' ";    
            
            }elseif($filtroBus=='prov'){
            $consulta="SELECT `id_articulo`,`cod_bar_prov`, `cod_bar`, `desc_larga`, `costo`, `precio1`, `precio2` FROM articulo 
            WHERE `id_proveedor` LIKE '%$Busqueda%' ";    
            }
            
            abmArticulo($conn, $consulta);
        }
        }else{
        //PANTALLA PRINCIPAL DE USUARIO
            
            
            $consulta="SELECT `id_articulo`,`cod_bar_prov`, `cod_bar`, `desc_larga`, `costo`, `precio1`, `precio2` FROM articulo WHERE estado = 1";
            abmArticulo($conn, $consulta);
    
            
        }
//actualizado
$focus='buscar_us';
$conn->close();
pieprincipal($focus,$path);
?>