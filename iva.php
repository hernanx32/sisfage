<?php
session_start();
$fecha=date('Y-m-d');
$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - ABM IVA';
$path='';

include("Modulos/html.php");
include("Modulos/conex.php");
include("Modulos/menu.php");

cabeza($titulo,$path);
menu($nro_cat, $nom_completo);


$resultado1="<div class='alert alert-success' role='alert'>Guardado Correctamente..</div>";
$resultado2="<div class='alert alert-danger' role='alert'> Error. No se actualizo.</div>";
$resultado3="";	

$mensaje_res=$resultado3;	
?>
<div class="col-12" align="center">
        <?php echo $mensaje_res; ?>
</div>
<form id="form-iva">    
<!-- <div class="container-fluid col-6 col-xxl-6 col-lg-10"> -->
	<div class="row align-items-end justify-content-center">
	<div class="row">
    
    </div>
	<div class="row">
	<div class="col-4">
        <label for="nombre" class="form-label">Nombre de IVA</label>
    	<input type="text" class="form-control" name="nombre" tabindex="1"required>
    </div>
    <div class="col-2">
		<label for="porcentaje" class="form-label">Porcentaje</label>
    	<input type="number" class="form-control" step="0.01" id="porcentaje" name="porcentaje" tabindex="2" required>
	</div>
	<div class="col-4 d-flex align-items-end">
		<button class="btn btn-primary d-inline-block" type="submit" tabindex="3">Agregar Iva</button>
	</div>	
	</div>
</div>
	
	
	
<div class="container" style="max-width: 600px; margin-top: 30px;">
<table class="table table-bordered mt-1">
  <thead class="table-light">
    <tr>
      <th>Nombre</th>
      <th>Porcentaje</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>IVA General</td>
      <td>21%</td>
      <td>
        <button class="btn btn-sm btn-warning">Editar</button>
        <button class="btn btn-sm btn-danger">Eliminar</button>
      </td>
    </tr>
    <tr>
      <td>IVA Reducido</td>
      <td>10.5%</td>
      <td>
        <button class="btn btn-sm btn-warning">Editar</button>
        <button class="btn btn-sm btn-danger">Eliminar</button>
      </td>
    </tr>
  </tbody>
</table>

</div>	
	
</form>
</br>
</br>
</br>

<?php
$focus='d_nombre';
$conn->close();

pieprincipal($focus,$path);

?>
