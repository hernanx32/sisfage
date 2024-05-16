<?php
session_start();

$id_us=$_SESSION['id_usuario'];
$usuario=$_SESSION['usuario'];
$nro_cat=$_SESSION['id_acceso'];
$nom_completo=$_SESSION['nombre'];

$titulo='Sistema - Mi Cuenta';
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

if (isset($_GET['scr'])){
    //VERIFICAMOS QUE LOS CAMPOS SEAN DIFERENTE AL QUE TENIAMOS
	//CAMPO NOMBRE
	if($dnombre == $_POST['d_nombre']){
		echo 'nombre igual, ';
	}else {
		echo 'nombre Modificado, ';
	} 
	//CAMPO CLAVE	
	if($_POST['d_clave'] == 'XXXXXXXXXXXXXXXXXXXX'){
		echo 'clave igual, ';
		echo $_POST['d_clave'];
	}else {
		echo 'clave Modificado, ';
	} 
		//CAMPO Email	
	if($demail == $_POST['d_email']){
		echo 'Correo igual, ';
			}else {
		echo 'Correo Modificado, ';
	}
		//CAMPO Suc	
	if($dsuc == $_POST['d_sucursal']){
		echo 'Sucursal igual, ';
			}else {
		echo 'Sucursal Modificado, ';
	}
	
	
	
	
	
	
	/*
	$_POST['d_nombre'];
	$_POST['d_clave'];
	$_POST['d_email'];
	$_POST['d_sucursal'];

	d_nombre
	d_clave
	d_email
	d_sucursal	
	*/
	
	
}






$resultado1=
	"<div class='row'><div class='col-10'>
		<div class='alert alert-success' role='alert'>Guardado Correctamente..</div>
	</div></div>";
$resultado2=
	"<div class='row'><div class='col-10'>
		<div class='alert alert-danger' role='alert'> Error. No se actualizo.</div>
	</div></div>";
$resultado3="";	

$mensaje_res=$resultado3;	
?>

<form action="/Sisfage/micuenta.php?scr=actuliza" method="post" name="form1" id="form1" accept-charset="UTF-8">
    
<div class="container-fluid col-12 col-xxl-6 col-lg-6">
	<?php echo $mensaje_res; ?>
	
	<div class="row">
	<div class="col-2">
		<label for="d_id" class="form-label">ID</label>
    	<input name="d_id" type="text" class="form-control" id="d_id" value="<?php echo $id_us;?>" disabled>
    </div>
    <div class="col-8">
		<label for="d_usuario" class="form-label">Usuario</label>
    	<input name="d_usuario" type="text" class="form-control" id="d_usuario" value="<?php echo $dusu;?>" disabled>
	</div>
	</div>	
    <div class="row">
	<div class="col-10">
		<label for="d_nombre" class="form-label">Apellido y Nombre (*)</label>
	  	<input type="text" class="focusNext form-control" id="d_nombre" name="d_nombre" value="<?php echo $dnombre;?>" tabindex="1" size="30" maxlength="30" onkeypress="return bajarEnter(this, event)" required>
		</div>		
	<div class="col-10">
		<label for="d_clave" class="form-label">Clave(* debe contener minimo 4 a 20 Caracteres)</label>
		<input type="password" class="form-control focusNext" id="d_clave" name="d_clave" value="XXXXXXXXXXXXXXXXXXXX" tabindex="2" size="20" maxlength="20" required>
		</div>		
	<div class="col-10">
		<label for="d_email" class="form-label">Correo Electronico - Email</label>
		<input type="email" class="form-control focusNext" id="d_email" name="d_email" value="<?php echo $demail;?>" tabindex="3" size="30" maxlength="30">
		</div>
	<div class="col-10">
	
<label for="d_sucursal" class="form-label">Sucursal(*)</label>
         <select class="form-control" name="d_sucursal" id="d_sucursal" tabindex="4" >
<?php       
    $sql1=$conn->query("SELECT * FROM `SUCURSALES`");

    if ($sql1->num_rows > 0) {
        // Generar opciones del select con los datos de la base de datos
    while($row = $sql1->fetch_assoc()) {
        if($row["nro_suc"]==$dsuc){
        echo '<option value="' . $row["nro_suc"] . '" selected="selected" >' . $row["nomb_suc"] . '</option>';
        }else{
        echo '<option value="' . $row["nro_suc"] . '" >' . $row["nomb_suc"] . '</option>';
        }
    }
    
    // Cerrar el elemento select
    echo '</select>';
} else {
    echo "No se encontraron resultados.";
}
   ?>     
        
        
</div>	
        
<div class="col-10">
	<label for="d_foto" class="form-label">Foto</label>
	<input type="file" class="form-control-file" id="d_email" name="d_email" value="aaaa@asda" tabindex="3" size="30" maxlength="30" disabled>
</div>		

<div class="col-12" align="center">        
    <div class="badge text-wrap" style="width: 6rem;">
      (*)Campos Obligatorios
    </div>
</div>            
	<div class="col-12" align="center">
	  <button class="btn btn-primary" type="submit" tabindex="5">Guardar Cambios</button>
	</div>		
				
	</div>
</div>
<!--<div class="col-12 col-m-6 col-lg-8">-->	

</form>
</br>
</br>
</br>

<?php
$focus='d_nombre';
$conn->close();

pieprincipal($focus,$path);

?>
