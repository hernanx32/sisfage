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
        
//BUSCA UN ID NO TAN ALTO PARA POBLA NUMEROS BAJOS         
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
        `cod_bar_prov`, `id_iva`, `iva`, `id_imp_int`, `porc_imp_int`, `costo`, `proc_bonific`, `porc_flete`, `porc_cargo_finan`, `proc_precio1`, `proc_precio2`, `proc_precio3`, `proc_precio4`, `precio1`, `precio2`, `precio3`, `precio4`, `id_usuario`, `fec_act`) 
        VALUES ('$id_art', '$dato1', '$dato2', '$dato3', '$dato4', '$dato5', '$dato6', '$dato7', '$dato14', '$dato8', 
        '$dato9', '1', '$dato12', '$dato13', '$dato10', '$valorIva', '$dato11', '$porce_imp_int', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$id_us', '$fecha')";
        
        agregado($conn, $consulta, $id_art);
    
    }
    
    //ELIMINAR 
    elseif($scr=="eliminar"){
		$id_art=$_GET['id'];
        $focus='';
        elimina_art($conn, $id_art, $id_us, $fecha);
    }

        
	//FORMULARIO DE EDICION
    elseif($scr=="costos"){
    include("Modulos/abmArticulo/costos.php");
    $focus='Costo';
    $id=$_GET['id'];    
    costos($conn, $id);
    }     
    //MODIFICANDO DATOS 
    elseif($scr=="modificando"){
    
    }
    }else{
        //PANTALLA PRINCIPAL DE USUARIO
    $consulta="SELECT `id_articulo`,`cod_bar_prov`, `cod_bar`, `desc_larga`, `costo`, `precio1`, `precio2` FROM articulo WHERE estado = 1";
    abmArticulo($conn, $consulta);
    $focus='busqueda';
            
     }
$conn->close();
pieprincipal($focus,$path);
?>