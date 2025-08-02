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



if (empty($_POST['accion'])){
	
}else{
	
if ($_POST['accion'] == 'agregar') {
    $nombre = $_POST['nombre'];
    $porcentaje = $_POST['porcentaje'];
    $conn->query("INSERT INTO iva (nombre, porcentaje) VALUES ('$nombre', '$porcentaje')");
 	
	}

if ($_POST['accion'] == 'editar') {
    $id = $_POST['id'];
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];
    $conn->query("UPDATE iva SET $campo = '$valor' WHERE id_iva = $id");
   
}

if ($_POST['accion'] == 'borrar') {
    $id = $_POST['id'];
    $conn->query("DELETE FROM iva WHERE id_iva = $id");
  
}
}

?>	
<div id="mensaje-exito" style="display:none; background: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border: 1px solid #c3e6cb; border-radius: 5px;">
    Acción realizada correctamente.
</div>	


<div class="col-12" align="center">
        <?php echo $mensaje_res; ?>
</div>
<form id="form-iva" method="post">    
<!-- <div class="container-fluid col-6 col-xxl-6 col-lg-10"> -->
	<div class="row align-items-end justify-content-center">
	<div class="row">
    
    </div>
	<div class="row">
	<div class="col-4">
        <label for="nombre" class="form-label">Nombre de IVA</label>
    	<input type="text" class="form-control" name="nombre" id='nombre' tabindex="1"required>
    </div>
    <div class="col-2">
		<label for="porcentaje" class="form-label">Porcentaje</label>
    	<input name="porcentaje" type="number" required class="form-control" id="porcentaje" max="100" min="0" step="0.01" tabindex="2">
	</div>
	<div class="col-4 d-flex align-items-end">
		<button class="btn btn-primary d-inline-block" type="submit" tabindex="3">Agregar Iva</button>
	</div>	
	</div>
</div>
	
</form>
	
	
<div class="container" style="max-width: 600px; margin-top: 0px;">
<table class="table table-bordered mt-1">
  <thead class="table-light">
    <tr>
      <th>Nombre</th>
      <th>Porcentaje</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
  	  <?PHP
	 $res = $conn->query("SELECT * FROM iva");
      while ($row = $res->fetch_assoc()) {
          echo "<tr data-id='{$row['id_iva']}'>
            <td contenteditable='true' class='edit-nombre'>{$row['nombre']}</td>
            <td contenteditable='true' class='edit-porcentaje'>{$row['porcentaje']}</td>
            <td><button class='borrar btn btn-sm btn-danger'>Eliminar</button></td>
        </tr>";
        }

	  ?>
	  
  </tbody>
</table>

</div>	
	



<script>
	
	$(document).ready(function () {
    // Alta
    $('#form-iva').on('submit', function (e) {
        e.preventDefault();
        $.post('iva.php', $(this).serialize() + '&accion=agregar', function () {
            location.reload(); // O podés agregar la fila dinámicamente

        });
    });

    // Modificación en tiempo real
    $('.edit-nombre, .edit-porcentaje').on('blur', function () {
        let campo = $(this).hasClass('edit-nombre') ? 'nombre' : 'porcentaje';
        let valor = $(this).text();
        let id = $(this).closest('tr').data('id');

        $.post('iva.php', {
            accion: 'editar',
            id: id,
            campo: campo,
            valor: valor
			
        });
    });

	
    // Baja
		
	 $('.borrar').on('click', function () {
        if (!confirm("¿Seguro que querés eliminar este registro?")) return;
        let id = $(this).closest('tr').data('id');
        $.post('iva.php', { accion: 'borrar', id: id }, function () {
			
             location.reload(); // si querés recargar después de borrar
        });
    });
		
		
		
		
		
});
	
	
function mostrarMensaje(mensaje) {
    $('#mensaje-exito').text(mensaje).fadeIn();

    setTimeout(function () {
        $('#mensaje-exito').fadeOut();
    }, 3000); // Se oculta después de 3 segundos
}	
	
	
	
	
</script>






<?php
$focus='nombre';
$conn->close();

pieprincipal($focus,$path);

?>
