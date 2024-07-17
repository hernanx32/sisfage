<?PHP

function menu($nro_cat, $nom_completo)
{
?>
<!-- Navbar -->
  <nav class="navbar-expand-md navbar-light navbar" >

    <div class="container-fluid">
      <a href="principal.php" class="navbar-brand">
      <h5><img src="img/LOGO.png" width="30" height="30" alt="<?PHP echo $nom_completo; ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-light"><?PHP echo $nom_completo; ?></span> </h5>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
		<ul class="navbar-nav">
		</br>

		<!-- Inicio Menu1 -->	
		<li class="nav-item dropdown"><!-- Menu1  -->
		<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Archivos</a>
			<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="micuenta.php" class="dropdown-item">Mi Cuenta</a></li>
              <li><a href="abmUsuario.php" class="dropdown-item">Usuarios</a></li>
			  <li><a href="#" class="dropdown-item">Sucursales</a></li>
			  <li><a href="#" class="dropdown-item">Proveedores</a></li>
			  <li><a href="#" class="dropdown-item">Familias</a></li>                
			  <li><a href="#" class="dropdown-item">Rubros - Sub-Rubros</a></li>
			  <li><a href="#" class="dropdown-item">Opciones del Sistema</a></li>
			  <li class="dropdown-divider"></li>
			  <li><a href="modulos/login/salir.php" class="dropdown-item">Salir</a></li>
			</ul>
		</li><!-- Fin Menu1  -->


		<!-- Inicio Menu2 -->	
		<li class="nav-item dropdown"><!-- Menu2  -->
		<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Precios</a>
			<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Centro de Costos</a></li>
              <li><a href="#" class="dropdown-item">Actualizacion Masiva</a></li>
			</ul>
		</li><!-- Fin Menu2  -->
		
	
        <!-- Inicio Menu3 -->	
		<li class="nav-item dropdown"><!-- Menu2  -->
		<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Stock</a>
			<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="remito_provee.php" class="dropdown-item">Remitos Proveedores</a></li>
                <li><a href="remito_interno.php" class="dropdown-item">Remitos Internos</a></li>
                <li><a href="#" class="dropdown-item">Listados</a></li>
                <li><a href="#" class="dropdown-item">Inventario</a></li>
                <li><a href="#" class="dropdown-item">Historial</a></li>
			</ul>
		</li><!-- Fin Menu2  -->	
			
        </ul>

        </div>

      </ul>
    </div>
  </nav>
<?PHP }