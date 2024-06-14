<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - Remitos Internos';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("menu.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);

//cargamos valores del formulario
$sql=$conn->query("SELECT * FROM `usuario` WHERE id_usuario ='$id_us' ");
		while($row = $sql->fetch_assoc()) {
            $dusu=$row['usuario'];
            $dclave=$row['clave'];
            $did_acc=$row['id_acceso'];
            $dnombre=$row['nombre'];
            $demail=$row['email'];
            $dsuc=$row['id_sucursal'];
        }
//2024-06-13
//echo $fecha_form;
?>

<div class="container-fluid col-12 col-xxl-12 col-lg-8">
<div class="row">
    <div class="col-3">
		<label for="fec_remito" class="form-label">Fecha Remito</label>
	  	<input name="fec_remito" type="date" required class="focusNext form-control" id="fec_remito" onkeypress="return bajarEnter(this, event)" value="<?php echo $fecha_form; ?>" >
		</div>
		</div>
	<div class="row">
    <div class="col-10">
		<label for="d_nombre" class="form-label">Apellido y Nombre (*)</label>
	  	<input type="text" class="focusNext form-control" id="d_nombre" name="d_nombre" value="<?php echo $dnombre;?>" tabindex="1" size="30" maxlength="30" onkeypress="return bajarEnter(this, event)" required>
		</div>
		</div>
	</div>
<?php
$focus='d_nombre';
$conn->close();
pieprincipal($focus,$path);
?>