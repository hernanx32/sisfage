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
        include("Modulos/abmArticulo/agregar.php");
        agregar($conn);   
        $focus='cod_bar';

        }
    //VALIDAR FORMULARIO DE AGREGAR Y INSERTAR EN BASES DE DATOS EL NVO ART.
    elseif($scr=="agregarnuevo"){
        $focus='';
   
        
        $dato1=$_POST['cod_bar'];
        $dato2=$_POST['desc_corta'];
        $dato3=$_POST['desc_larga'];
        $dato4=$_POST['rubro'];
        $dato5=$_POST['rubro_sub'];
        $dato6=$_POST['unidad_med'];
        $dato7=$_POST['unidadxbulto'];
        $dato8=$_POST['stok_min'];
        $dato9=$_POST['stok_max'];
        $dato10=$_POST['iva'];
        $dato11=$_POST['imp_int'];
        $dato12=$_POST['BuscaProveedor'];
        $dato13=$_POST['cod_bar_prov'];
        $dato14=$_POST['estado'];
        
        echo "$dato1 - $dato2 - $dato3 - $dato4 - $dato5 - $dato6 - $dato7 - $dato8 - $dato9 - $dato10 - $dato11 - $dato12 - $dato13 - $dato14";
        
        
        
        // agregado($conn, $consulta); 
        
    
    
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
            WHERE `id_proveedor` = '%$Busqueda%' ";    
            }
            
            abmArticulo($conn, $consulta);
        }
        }else{
        //PANTALLA PRINCIPAL DE USUARIO
            
            
            $consulta="SELECT `id_articulo`,`cod_bar_prov`, `cod_bar`, `desc_larga`, `costo`, `precio1`, `precio2` FROM articulo WHERE estado = 1";
            abmArticulo($conn, $consulta);
            $focus='busqueda';
            
        }
//actualizado

$conn->close();
pieprincipal($focus,$path);
?>