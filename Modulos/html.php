<?PHP

function cabeza($titulopag, $path)
{
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $titulopag; ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?php echo $path;?>comp/google.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $path;?>comp/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo $path;?>comp/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $path;?>comp/dist/css/adminlte.min.css">

  </head>
<?PHP }


function pieindex($focus,$path)
{
?>
<!-- jQuery -->    
<script src="<?php echo $path;?>comp/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $path;?>comp/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $path;?>comp/dist/js/adminlte.min.js"></script>


	
</body>
</html>
<?php }


function pieprincipal($focus,$path){
?>
<!-- jQuery -->    
<script src="<?php echo $path;?>comp/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $path;?>comp/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $path;?>comp/dist/js/adminlte.min.js"></script>

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