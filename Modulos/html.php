<?PHP
function cabeza($titulopag, $path)
{
 
global $fecha_form;

/*
<link rel="stylesheet" href="<?PHP echo $path;?>comp/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?PHP echo $path;?>comp/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
*/
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="<?PHP echo $path;?>comp/google.css">
  	<link rel="stylesheet" href="<?PHP echo $path;?>comp/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?PHP echo $path;?>comp/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?PHP echo $path;?>comp/dist/css/adminlte.min.css">	
    <link rel="stylesheet" href="<?PHP echo $path;?>comp/plugins/select2/css/select2.min.css">
	<script src="<?PHP echo $path;?>js/formularios.js"></script>
    <script src="<?PHP echo $path;?>js/jquery-3.6.0.min.js"></script>

    <link href="../comp/plugins/bootstrap/js/bootstrap.bundle.min.js.css" rel="stylesheet" type="text/css" media="screen">
	
	<title><?php echo $titulopag; ?></title>

	
<!-- Link Anulados
<link rel="stylesheet" href="comp/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

-->	
	
  </head>
	  <!-- Preloader 
  <div class="preloader">
   <a href="principal.php"> 
	<img src="img/cargando.gif" alt="Cargando...." height="100" width="100">
	<img  src="img/cargando.png" alt="Cargando...." height="100" width="180"></a>
	
  </div>  -->
<?PHP 
date_default_timezone_set('America/Argentina/Buenos_Aires');

	
$fecha_form = date('Y-m-d');
}


function pieindex($focus,$path)
{
?>
<script src="<?PHP echo $path;?>comp/plugins/jquery/jquery.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/bootstrap/js/bootstrap.bundle.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables-responsive/js/dataTables.responsive.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables-responsive/js/responsive.bootstrap4.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables-buttons/js/dataTables.buttons.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables-buttons/js/buttons.bootstrap4.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/jszip/jszip.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/pdfmake/pdfmake.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables-buttons/js/buttons.html5.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables-buttons/js/buttons.print.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables-buttons/js/buttons.colVis.js"></script>
<script src="<?PHP echo $path;?>comp/dist/js/adminlte.min.js"></script>

	
</body>
</html>
<?php }


function pieprincipal($focus,$path){
?>
<!-- jQuery -->    
<script src="<?PHP echo $path;?>comp/plugins/jquery/jquery.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/bootstrap/js/bootstrap.bundle.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables-responsive/js/dataTables.responsive.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables-responsive/js/responsive.bootstrap4.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables-buttons/js/dataTables.buttons.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables-buttons/js/buttons.bootstrap4.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/jszip/jszip.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/pdfmake/pdfmake.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables-buttons/js/buttons.html5.js"></script>
<script src="<?PHP echo $path;?>comp/plugins/datatables-buttons/js/buttons.print.js"></script>

<script src="<?PHP echo $path;?>comp/plugins/datatables-buttons/js/buttons.colVis.js"></script>

<script src="<?PHP echo $path;?>comp/dist/js/adminlte.min.js"></script>

<script>

//SCRREM BAJAR CON ENTER
document.addEventListener('keypress', function(evt) {
  // Si el evento NO es una tecla Enter
  if (evt.key !== 'Enter') {
    return;
  }
  let element = evt.target;
  // Si el evento NO fue lanzado por un elemento con class "focusNext"
  if (!element.classList.contains('focusNext')) {
    return;
  }
  // AQUI logica para encontrar el siguiente
  let tabIndex = element.tabIndex + 1;
  var next = document.querySelector('[tabindex="'+tabIndex+'"]');
  // Si encontramos un elemento
  if (next) {
    next.focus();
    event.preventDefault();
  }
});
	
	

document.form1.<?php echo $focus;?>.focus();
/*
function bajarEnter (field, event) {
	var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
	if (keyCode == 13) {
		var i;
		for (i = 0; i < field.form.elements.length; i++)
			if (field == field.form.elements[i])
				break;
		i = (i + 1) % field.form.elements.length;
		field.form.elements[i].value=''; 
		field.form.elements[i].focus();
		return false;
		} 
		else
	return true;
	}*/
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
	
</script>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Junco SAS.
        </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023-2024 <a href="https://stiformosa.ddns.net">Sistema de Gestion</a>.</strong> Todos los derechos reservados.
  </footer>
	
</body>
</html>
<?PHP	}