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
  
 
    
    
    
<form action="/Sisfage/micuenta.php" method="post" name="form1" id="form1" accept-charset="UTF-8">
    
<div class="container-fluid col-12 col-xxl-6 col-lg-6">
  	<div class="row">
    <div class="col-2">
		<label for="d_id" class="form-label">ID</label>
    	<input name="d_id" type="text" class="form-control" id="d_id" value="1" disabled>
    </div>
    <div class="col-8">
		<label for="d_usuario" class="form-label">Usuario</label>
    	<input name="d_usuario" type="text" disabled class="form-control" id="d_usuario" value="1" >
	</div>
	</div>	
    <div class="row">
	<div class="col-10">
		<label for="d_nombre" class="form-label">Apellido y Nombre (*)</label>
	  	<input type="text" class="form-control" id="d_nombre" name="d_nombre" value="Hernan" tabindex="1" size="30" maxlength="30" required>
		</div>		
	<div class="col-10">
		<label for="d_clave" class="form-label">Clave</label>
		<input type="password" class="form-control" id="d_clave" name="d_clave" value="32499297" tabindex="2" size="20" maxlength="20" required>
		</div>		
	<div class="col-10">
		<label for="d_email" class="form-label">Correo Electronico - Email</label>
		<input type="email" class="form-control" id="d_email" name="d_email" value="aaaa@asda" tabindex="3" size="30" maxlength="30">
		</div>
	<div class="col-10">
	<label for="d_sucursal" class="form-label">Sucursal</label>
      <select class="form-control" name="d_sucursal" id="d_sucursal" tabindex="4">
        <option value="javascript">JavaScript</option>
        <option value="php" selected>PHP</option>
        <option value="java">Java</option>
        <option value="golang">Golang</option>
        <option value="python">Python</option>
        <option value="c#">C#</option>
        <option value="C++">C++</option>
        <option value="erlang">Erlang</option>
      </select>
    </div>	
	<div class="col-10">
		<label for="d_foto" class="form-label">Foto</label>
		<input type="file" class="form-control-file" id="d_email" name="d_email" value="aaaa@asda" tabindex="3" size="30" maxlength="30" disabled>
		</div>		
		
		<div class="col-12" align="center">
		    <button class="btn btn-primary" type="submit">Guardar Cambios</button>
  		</div>		
				
	</div>
</div>
<!--<div class="col-12 col-m-6 col-lg-8">-->	

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