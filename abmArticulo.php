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
    elseif($scr=="Buscar"){
            $filtroBus=$_GET['select'];
            $Busqueda=$_GET['busqueda'];
        
            if($filtroBus=='desc'){
            $consulta="SELECT `id_articulo`,`cod_bar_prov`, `cod_bar`, `desc_larga`, `costo`, `precio1`, `fec_act` FROM articulo 
            WHERE `desc_larga` LIKE '%$Busqueda%' OR `desc_corta` LIKE '%$Busqueda%' ";    
                
            }elseif($filtroBus=='cod_bar'){
            $consulta="SELECT `id_articulo`,`cod_bar_prov`, `cod_bar`, `desc_larga`, `costo`, `precio1`, `fec_act` FROM articulo 
            WHERE `cod_bar` LIKE '%$Busqueda%' OR `cod_bar_prov` LIKE '%$Busqueda%' ";    
                
            }elseif($filtroBus=='cod_ref'){
            $consulta="SELECT `id_articulo`,`cod_bar_prov`, `cod_bar`, `desc_larga`, `costo`, `precio1`, `fec_act` FROM articulo 
            WHERE `id_articulo` LIKE '%$Busqueda%' ";    
            
            }elseif($filtroBus=='prov'){
            $consulta="SELECT `id_articulo`,`cod_bar_prov`, `cod_bar`, `desc_larga`, `costo`, `precio1`, `fec_act` FROM articulo 
            WHERE `id_proveedor` = '%$Busqueda%' ";    
            }
            
            abmArticulo($conn, $consulta);
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

//TRAEMOS EL VALOR SEGUN EL ID DEL IVA        
$query = "SELECT porcentaje FROM iva WHERE id_iva = '$dato10'";
$stmt = $conn->prepare($query);
$stmt->execute();
$stmt->bind_result($valorIva);
$stmt->fetch();
$stmt->close();
//VALOR RETORNADO $valorIva;

//TRAEMOS EL VALOR SEGUN EL ID DEL IMP_INTERNO   
$query = "SELECT porcen_imp_int FROM imp_interno WHERE id_imp_interno = '$dato11'";
$stmt = $conn->prepare($query);
$stmt->execute();
$stmt->bind_result($porce_imp_int);
$stmt->fetch();
$stmt->close();
//VALOR RETORNADO $porce_imp_int;
        
//BUSCA UN ID NO TAN ALTO PARA POBLAR NUMEROS BAJOS         
$query = "SELECT MIN(t1.id_articulo + 1) AS next_id
FROM articulo t1
LEFT JOIN articulo t2
ON t1.id_articulo + 1 = t2.id_articulo
WHERE t2.id_articulo IS NULL";
$stmt = $conn->prepare($query);
$stmt->execute();
$stmt->bind_result($id_art);
$stmt->fetch();
$stmt->close();

        
        $consulta="INSERT INTO `articulo` 
        (`id_articulo`, `cod_bar`, `desc_corta`, `desc_larga`, `id_rubro`, `id_rubro_sub`, 
        `uni_med`, `uni_bulto`, `estado`, `stockmin`, `stockmax`, `stocktotal`, `id_proveedor`, 
        `cod_bar_prov`, `id_iva`, `iva`, `id_imp_int`, `porc_imp_int`, `costo`, `porc_bonific`, `porc_flete`, `porc_cargo_finan`, `porc_precio1`, `porc_precio2`, `porc_precio3`, `porc_precio4`, `precio1`, `precio2`, `precio3`, `precio4`, `id_usuario`, `fec_act`) 
        VALUES ('$id_art', '$dato1', '$dato2', '$dato3', '$dato4', '$dato5', '$dato6', '$dato7', '$dato14', '$dato8', 
        '$dato9', '1', '$dato12', '$dato13', '$dato10', '$valorIva', '$dato11', '$porce_imp_int', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$id_us', '$fecha')";
        
        agregado($conn, $consulta, $id_art);
    
    }
    //ELIMINAR 
    elseif($scr=="eliminar"){
		$id_art=$_GET['id'];
        $focus='';
        elimina_art($conn, $id_art, $id_us, $fecha);
    }
    //AGREGAR FORMULARIO DE MODIFICACION DE COSTOS
    elseif($scr=="costos"){
        include("Modulos/abmArticulo/costos.php");
        $id=$_GET['id'];   
        costos($conn, $id);
        $focus='costo';   

		
    }elseif($scr=="costosmodif"){
        $cost_id = $_POST['cod_ref'];
		$cost_d_larga = $_POST['desc_larga'];
		$cost_cost = $_POST['costo'];
		$cost_p_bonif = $_POST['porc_bonif'];
		$cost_p_flete = $_POST['porc_flete'];
		$cost_p_cfin = $_POST['porc_cfin'];
        $cost_pa1 = $_POST['PA1'];
		$cost_pv1 = $_POST['PV1'];
		$cost_pa2 = $_POST['PA2'];
		$cost_pv2 = $_POST['PV2'];
		$cost_pa3 = $_POST['PA3'];
		$cost_pv3 = $_POST['PV3'];
		$cost_pa4 = $_POST['PA4'];
		$cost_pv4 = $_POST['PV4'];

        
        $fecha_costo="2024-12-23";
		$cost_consulta="UPDATE `articulo` SET 
		`costo` = $cost_cost, 
		`porc_bonific` = $cost_p_bonif, 
		`porc_flete` = $cost_p_flete, 
		`porc_cargo_finan` = $cost_p_cfin, 
		`porc_precio1` = $cost_pa1, 
		`porc_precio2` = $cost_pa2, 
		`porc_precio3` = $cost_pa3, 
		`porc_precio4` = $cost_pa4, 
		`precio1` = $cost_pv1,
		`precio2` = $cost_pv2,		
		`precio3` = $cost_pv3,
		`precio4` = $cost_pv4,
        `fec_act` =  '$fecha',
        `id_usuario` = $id_us 
		 WHERE `articulo`.`id_articulo` = $cost_id";


		modif_costo($conn, $cost_consulta, $cost_id, $cost_d_larga);

    }
    //MODIFICANDO DATOS 
    elseif($scr=="modificar"){
            include("Modulos/abmArticulo/modificar.php");
			$id=$_GET['id']; 
            $focus='desc_corta';
            modificar($conn, $id);
	}elseif($scr=="modificando"){
    $focus='desc_corta';
    echo 'modificando';
        $dato0=$_POST['cod_ref'];
        $dato1=$_POST['cod_bar'];
        $dato2=$_POST['desc_corta'];
        $dato3=$_POST['desc_larga'];
        $dato4=$_POST['rubro'];
        $dato5=$_POST['rubro_sub'];
        $dato6=$_POST['unidad_med'];
        $dato7=$_POST['uni_bulto'];
        $dato8=$_POST['stok_min'];
        $dato9=$_POST['stok_max'];
        $dato10=$_POST['iva'];
        $dato11=$_POST['imp_int'];
        $dato12=$_POST['BuscaProveedor'];
        $dato13=$_POST['cod_bar_prov'];
        $dato14=$_POST['estado'];
        
        //TRAEMOS EL VALOR SEGUN EL ID DEL IVA        
$query = "SELECT porcentaje FROM iva WHERE id_iva = '$dato10'";
$stmt = $conn->prepare($query);
$stmt->execute();
$stmt->bind_result($valorIva);
$stmt->fetch();
$stmt->close();
//VALOR RETORNADO $valorIva;

//TRAEMOS EL VALOR SEGUN EL ID DEL IMP_INTERNO   
$query = "SELECT porcen_imp_int FROM imp_interno WHERE id_imp_interno = '$dato11'";
$stmt = $conn->prepare($query);
$stmt->execute();
$stmt->bind_result($porce_imp_int);
$stmt->fetch();
$stmt->close();
//VALOR RETORNADO $porce_imp_int;
           
		 $consulta="UPDATE `articulo` SET 
		`cod_bar` = '$dato1',
        `desc_corta`= '$dato2',
        `desc_larga`= '$dato3',
        `id_rubro`= '$dato4',
        `id_rubro_sub`= '$dato5',
        `uni_med`= '$dato6',
        `uni_bulto`= '$dato7',
        `estado`= '$dato14',
        `stockmin`= '$dato8',
        `stockmax`= '$dato9',
		`id_proveedor`= '$dato12',
        `cod_bar_prov`= '$dato13',
		`id_iva`= '$dato10',
		`iva`= '$valorIva',
		`id_imp_int`= '$dato11',
		`porc_imp_int`= '$porce_imp_int',
		`id_usuario`= '$id_us',
		`fec_act`= '$fecha'
		 WHERE `articulo`.`id_articulo` = $dato0";
		
        agregado($conn, $consulta, $dato0);
    }
    }else{
        //PANTALLA PRINCIPAL DE USUARIO
    $consulta="SELECT `id_articulo`,`cod_bar_prov`, `cod_bar`, `desc_larga`, `costo`, `precio1`, `fec_act` FROM articulo WHERE estado = 1 LIMIT 100";
    abmArticulo($conn, $consulta);
    $focus='busqueda';
            
     }

if (!isset($focus)){
    $focus='';
}

$conn->close();
pieprincipal($focus,$path);
?>