<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1"><b>Verificando datos </b> Aguarde unos minutos....</a>
    </div>
    <div class="card-body">
<?php 
    $usuario=$_POST["usuario"];
	$clave=$_POST["clave"];    
    $clave=md5($clave);
      	 

			$sql=$conn->query("SELECT * FROM `usuario` WHERE usuario='$usuario' AND clave='$clave' ");
			if ($sql->num_rows > 0) {
    			while($row = $sql->fetch_assoc()) {
					$_SESSION['id_usuario'] = $row["id_usuario"];
					$_SESSION['usuario'] = $row["usuario"];
					$_SESSION['id_acceso'] = $row["id_acceso"];
					$_SESSION['nombre'] = $row["nombre"];
					}
    			/* liberar el conjunto de resultados */
    			$sql->close();
            $conn->close();
			header("location:principal.php");
			exit();
			}else{
			$mensaje='Error al Logearse';
            header("location:index.php?msj=error");
			}
			$mensaje='<p style="color:red;">Datos Incorrectos!</p>';
		
		
		
        ?>      

      <a class="h1">Est Conn: <B><?php echo $EstCon; ?></B></a>
 
      <p class="mb-1">
        <a href="index.php">Cancelar</a>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>