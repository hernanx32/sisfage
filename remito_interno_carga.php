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

$sql_suc=$conn->query("SELECT nro_suc, nomb_suc FROM sucursales");
$suc_array=array();

while($row = $sql_suc->fetch_assoc()) {
        $suc_array[$row['nro_suc']] = $row['nomb_suc'];
    }

// print_r($suc_array);

echo  $suc_array[$dsuc];

?>
<body class="hold-transition sidebar-mini">
 <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nuevo Remito Interno</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="principal.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="remito_interno.php">Remitos Internos</a></li>                
              <li class="breadcrumb-item active">Nuevo Remitos Internos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
     
     
     
<div class="container-fluid col-12 col-xxl-12 col-lg-8">
<div class="row">
    <div class="col-4">
		<label for="fec_remito" class="form-label">Fecha</label>
	  	<input name="fec_remito" type="date" disabled required class="focusNext form-control-sm" id="fec_remito" onkeypress="return bajarEnter(this, event)" value="<?php echo $fecha_form; ?>" >
		</div>
    <div class="col-3">    
    	</div>
    <div class="col-4">
		<label for="fec_envio" class="form-label-sm">F. de Envio</label>
	  	<input name="fec_envio" type="date" required class="focusNext form-control-sm" id="fec_envio" tabindex="1" onkeypress="return bajarEnter(this, event)" value="<?php echo $fecha_form; ?>" >
		</div>
		</div>

  <label for="d_nombre" class="form-label">Numero de Remito</label>
  <div class="row">
    <div class="col-8">    
		<input type="text" class="focusNext form-control-sm" id="nroRem1" name="nroRem1" value="0001" size="5" maxlength="5" disabled>
		<input type="text" class="focusNext form-control-sm" id="nroRem2" name="nroRem2" value="00000010" size="8" maxlength="8" disabled>
    <a title="El Nro de Remito de varia si otro usuario esta haciendo la carga">(!!!)</a>

      </div>

     </div>

<div class="row">
    <div class="col-12">
    <label for="fec_remito" class="form-label-sm">Suc Origen</label>
    </div>
    <div class="col-6">
    <input name="sucOrigen" type="text" disabled class="focusNext form-control-sm" id="sucOrigen"  value="<?php echo $dsuc; ?>" >
	<input name="sucOrigen" type="text" disabled class="focusNext form-control-sm" id="sucOrigen"  value="<?php echo $dsuc; ?>" >

    </div>

    <div class="col-4">
		<label for="fec_envio" class="form-label">F. de Envio</label>
	  	<input name="fec_envio" type="date" required class="focusNext form-control" id="fec_envio" tabindex="1" onkeypress="return bajarEnter(this, event)" value="<?php echo $fecha_form; ?>" >
		</div>
		</div>    
    
    
    
    
	</div>
<?php
$focus='fec_envio';
$conn->close();
pieprincipal($focus,$path);
?>