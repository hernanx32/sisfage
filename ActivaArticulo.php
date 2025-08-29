<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - Activar Articulos';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");
//include("Modulos/abmProv/abmProv.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);


$mensaje ='';
$valorCampo=''; 

if (!empty($_GET['scr'])){
	$codBar=$_GET['buscar'];	
	
	// $consulta="SELECT id_articulo, cod_bar, desc_larga, id_usuario, fec_act FROM articulo WHERE `cod_bar` = '$codBar' and estado = '0' ";    
	$consulta="SELECT a.id_articulo, a.cod_bar, a.desc_larga, u.usuario AS id_usuario, a.fec_act FROM articulo a INNER JOIN usuario u ON a.id_usuario = u.id_usuario WHERE `cod_bar` = '$codBar' and estado = '0' "; 

	$sql = $consulta;
	$result = $conn->query($sql); 
	
	if ($result->num_rows == 1) {
    	
		while($row = $result->fetch_assoc()) {
    		
			$mensaje .= "<strong>ID Articulo: </strong>".$row['id_articulo'].'<br>';
        	$mensaje .= "<strong>Cod. Barra: </strong>".$row['cod_bar'].'<br>';
        	$mensaje .= "<strong>Descripcion: </strong>".$row['desc_larga'].'<br>';
        	$mensaje .= "<strong>Usuario Modifico: </strong>".$row['id_usuario'].'<br>';
			
			$fechaOriginal=$row['fec_act'];
			$fechaOriginal = strtotime($fechaOriginal);
			$fechaOriginal = date("d/m/Y", $fechaOriginal);
			
        	$mensaje .= "<strong>Fecha Modificación: </strong>".$fechaOriginal.'<br>';
			$mensaje .= "<a href='ActivaArticulo.php' class='btn btn-outline-secondary'>Cancelar</a> ";
			$mensaje .= " <a href='ActivaArticulo.php?scr=activar&idart=".$row['id_articulo']."' class='btn btn-outline-success'>Habilitar</a>";
			$valorCampo="value='$codBar'";
			
			}
	}elseif ($result->num_rows > 1){
			$mensaje ="<div class='alert alert-danger' role='alert'>ERROR EL CODIGO SE ENCUENTA DUPLICADO</div>";
			$valorCampo="value='$codBar'";
	}elseif ($result->num_rows == 0){
			$mensaje ="<div class='alert alert-danger' role='alert'>ERROR No se encontro el codigo o se encuentra Habilitado</div>";	
			$valorCampo="value='$codBar'";
	}
	}



?>
<form id="form1" name="form1" method="get" action="ActivaArticulo.php">
  <table width="365" border="1" align="center">
    <tbody>
      <tr>
        <td width="365" align="center"><h2>Reactivacion de Articulos</h2></td>
      </tr>
      <tr>
        <td align="center"><input name="buscar" type="text" autofocus="autofocus" required="required" id="buscar" <?php echo $valorCampo; ?> placeholder="Ingrese Cod. Barra" tabindex="1" size="20" maxlength="20">
        <input type="submit" name="scr" id="scr" value="Buscar"></td>
      </tr>
      <tr>
        <td align="center"><?php echo $mensaje; ?></td>
      </tr>
      </tbody>
  </table>
</form>

<?PHP
$focus='Buscar';
$conn->close();
pieprincipal($focus,$path);
?>