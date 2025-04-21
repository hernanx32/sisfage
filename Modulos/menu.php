<?PHP

function menu($nro_cat, $nom_completo)
{

   if (!isset($_SESSION['id_usuario'])) {
    // Si no está logueado, redirigir a la página de inicio de sesión
    header("Location:index.php");
    exit(); // Asegúrate de que no se ejecute el resto del código
} 

//SUPERVISOR   -  TODOS LOS MENUS
if ($nro_cat=='1'){ 
?> 
<!-- Navbar -->
  <nav class="navbar-expand-md navbar-light navbar" >
    <div class="container-fluid">
      <a href="/sisfage/principal.php" class="navbar-brand">
      <h5><img src="/sisfage/img/LOGO.png" width="30" height="30" alt="<?PHP echo $nom_completo; ?>" class="brand-image img-circle elevation-3" style="opacity:0.8">
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
            <li><a href="/sisfage/micuenta.php" class="dropdown-item">Mi Cuenta</a></li>
            <li><a href="/sisfage/abmUsuario.php" class="dropdown-item">Usuarios</a></li>
			<li><a href="/sisfage/abmSucursales.php" class="dropdown-item">Sucursales</a></li>
			<li><a href="/sisfage/abmProveedores.php" class="dropdown-item">Proveedores</a></li>
            <li><a href="#" class="dropdown-item">Rubros - Sub-Rubros</a></li>
			<li><a href="/sisfage/prueba.php" class="dropdown-item">Opciones del Sistema</a></li>
			<li class="dropdown-divider"></li>
			<li><a href="/sisfage/Modulos/login/salir.php" class="dropdown-item">Salir</a></li>
		</ul>
		</li><!-- Fin Menu1  -->
		<!-- Inicio Menu2 -->	
		<li class="nav-item dropdown"><!-- Menu2  -->
		<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Precios</a>
			<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="/sisfage/abmArticulo.php" class="dropdown-item">Centro de Costos</a></li>
              <li><a href="#" class="dropdown-item">Actualizacion Masiva</a></li>
			</ul>
		</li><!-- Fin Menu2  -->
        <!-- Inicio Menu3 -->	
		<li class="nav-item dropdown"><!-- Menu2  -->
		<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Stock</a>
			<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="/sisfage/abmRem_ing_prov.php" class="dropdown-item">Remitos Proveedores</a></li>
                <li><a href="/sisfage/remito_interno.php" class="dropdown-item">Remitos Internos</a></li>
                <li><a href="#" class="dropdown-item">Listados</a></li>
                <li><a href="#" class="dropdown-item">Inventario</a></li>
                <li><a href="#" class="dropdown-item">Historial</a></li>
			</ul>
		</li><!-- Fin Menu3  -->	
            <!-- Inicio Menu4 -->	
		<li class="nav-item dropdown"><!-- Menu2  -->
		<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Configuraciones</a>
			<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
               
            <li><a href="/sisfage/iva.php" class="dropdown-item">IVA</a></li>
            <li><a href="/sisfage/unimedida.php" class="dropdown-item">Unidad de Medida</a></li>
            <li><a href="/sisfage/impinterno.php" class="dropdown-item">Impuesto Interno</a></li>
            </ul>
		</li><!-- Fin Menu4  -->
          <!-- Inicio Menu5 -->	
		<li class="nav-item dropdown"><!-- Menu2  -->
		<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Ventas</a>
			<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="/sisfage/emicomprobantes.php" class="dropdown-item">Emision de Comprobantes</a></li>
              <li><a href="#" class="dropdown-item">Rectificados</a></li>
              <li><a href="#" class="dropdown-item">Cierre de Caja</a></li>        
			</ul>
		</li><!-- Fin Menu5  -->
          
          
     </ul>
    </div>

      </ul>
    </div>Categoria:<?PHP echo $nro_cat."<br>"; echo date('d\/m\/Y'); ?>
  </nav>
<?PHP   

}elseif($nro_cat=='2'){
//ADMINISTRATIVA      
?> 
<!-- Navbar -->
  <nav class="navbar-expand-md navbar-light navbar" >
    <div class="container-fluid">
      <a href="/sisfage/principal.php" class="navbar-brand">
      <h5><img src="/sisfage/img/LOGO.png" width="30" height="30" alt="<?PHP echo $nom_completo; ?>" class="brand-image img-circle elevation-3" style="opacity:0.8">
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
              <li><a href="/sisfage/micuenta.php" class="dropdown-item">Mi Cuenta</a></li>
              <li><a href="/sisfage/abmUsuario.php" class="dropdown-item">Usuarios</a></li>
			  <li><a href="#" class="dropdown-item">Sucursales</a></li>
			  <li><a href="#" class="dropdown-item">Proveedores</a></li>
			  <li><a href="#" class="dropdown-item">Familias</a></li>                
			  <li><a href="#" class="dropdown-item">Rubros - Sub-Rubros</a></li>
			  <li><a href="#" class="dropdown-item">Opciones del Sistema</a></li>
			  <li class="dropdown-divider"></li>
			  <li><a href="/sisfage/Modulos/login/salir.php" class="dropdown-item">Salir</a></li>
			</ul>
		</li><!-- Fin Menu1  -->
		<!-- Inicio Menu2 -->	
		<li class="nav-item dropdown"><!-- Menu2  -->
		<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Precios</a>
			<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
			<li><a href="/sisfage/abmArticulo.php" class="dropdown-item">Centro de Costos</a></li>
			<li><a href="#" class="dropdown-item">Actualizacion Masiva</a></li>
			</ul>
		</li><!-- Fin Menu2  -->
        <!-- Inicio Menu3 -->	
		<li class="nav-item dropdown"><!-- Menu2  -->
		<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Stock</a>
			<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="/sisfage/remito_provee.php" class="dropdown-item">Remitos Proveedores</a></li>
                <li><a href="/sisfage/remito_interno.php" class="dropdown-item">Remitos Internos</a></li>
                <li><a href="#" class="dropdown-item">Listados</a></li>
                <li><a href="#" class="dropdown-item">Inventario</a></li>
                <li><a href="#" class="dropdown-item">Historial</a></li>
			</ul>
		</li><!-- Fin Menu2  -->	
    </ul>
    </div>

      </ul>
    </div>Categoria:<?PHP echo $nro_cat."<br>"; echo date('d\/m\/Y'); ?>
  </nav>
<?PHP   
           
}elseif($nro_cat=='3'){
//VENTAS
?> 
<!-- Navbar -->
  <nav class="navbar-expand-md navbar-light navbar" >
    <div class="container-fluid">
      <a href="/sisfage/principal.php" class="navbar-brand">
      <h5><img src="/sisfage/img/LOGO.png" width="30" height="30" alt="<?PHP echo $nom_completo; ?>" class="brand-image img-circle elevation-3" style="opacity:0.8">
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
              <li><a href="/sisfage/micuenta.php" class="dropdown-item">Mi Cuenta</a></li>
			  <li class="dropdown-divider"></li>
			  <li><a href="/sisfage/Modulos/login/salir.php" class="dropdown-item">Salir</a></li>
			</ul>
		</li><!-- Fin Menu1  -->
		<!-- Inicio Menu2 -->	
		<li class="nav-item dropdown"><!-- Menu2  -->
		<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Ventas</a>
			<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="/sisfage/ventas.php" class="dropdown-item">Emision de Comprobantes</a></li>
              <li><a href="#" class="dropdown-item">Rectificados</a></li>
              <li><a href="#" class="dropdown-item">Cierre de Caja</a></li>        
			</ul>
		</li><!-- Fin Menu2  -->
        <!-- Inicio Menu3 -->	
		<li class="nav-item dropdown"><!-- Menu2  -->
		<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Stock</a>
			<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="/sisfage/remito_provee.php" class="dropdown-item">Recepcion de Mercaderia</a></li>
                <li><a href="/sisfage/remito_interno.php" class="dropdown-item">Remitos Internos</a></li>
    			</ul>
		</li><!-- Fin Menu2  -->	
    </ul>
    </div>

      </ul>
    </div>Categoria:<?PHP echo $nro_cat."<br>"; echo date('d\/m\/Y'); ?>
  </nav>
<?PHP
}elseif($nro_cat=='4'){
//    
echo "asdasdasdasdasdasdasdsa 2";           

}
}
