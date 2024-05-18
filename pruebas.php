<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $titulopag; ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="comp/google.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="comp/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="comp/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="comp/dist/css/adminlte.min.css">
  </head>
  
 
    
    
<table width="100" border="1" align="center">
  <tbody>
    <tr>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
    
<form action="/Sisfage/micuenta.php" method="post" name="form1" id="form1" accept-charset="UTF-8">

    
    
    
</form>  
    
    
    
<!-- jQuery -->    
<script src="comp/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="comp/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="comp/dist/js/adminlte.min.js"></script>

<script>
document.form1.<?php echo $focus;?>.focus();

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
	}</script>


  <!-- Main Footer -->
  <footer class="main-header">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Junco SAS.
     </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023-2024 <a href="https://stiformosa.ddns.net">Sistema de Gestion</a>.</strong> Todos los derechos reservados.
  </footer>   
</body>
</html>