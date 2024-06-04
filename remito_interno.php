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

?>

 
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader">
    <img src="img/Cargando.png" alt="Cargando...." height="60" width="150">
  </div>
</div> 
	
<body class="hold-transition sidebar-mini">
 <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Remitos Internos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="principal.php">Inicio</a></li>
              <li class="breadcrumb-item active">Remitos Internos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	 

     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Nuevo Remito</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Nro</th>
                    <th>Remito</th>
                    <th>Origen</th>
                    <th>Destino</th>
					<th>Fecha Env.</th>
                  </tr>
                  </thead>
					<tbody>
<?PHP	
$sql = "SELECT * FROM remito_int_enc";
$result = $conn->query($sql);
						
   while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['fecha_rem']}</td>
                <td>{$row['suc_remito']}</td>
                <td>{$row['nro_remito']}</td>
                <td>{$row['origen']}</td>
                <td>{$row['destino']}</td>
				<td>{$row['fecha_env']}</td>
              </tr>";
    }
?>                  
                 
					</tbody>
                  <tfoot>
                  <tr>
                    <th>Fecha</th>
                    <th>Nro</th>
                    <th>Remito</th>
                    <th>Origen</th>
                    <th>Destino</th>
					<th>Fecha Env.</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
   

<?php
$focus='d_nombre';
$conn->close();

pieprincipal($focus,$path);

?>

