<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
       <a class="h1"><b>Sistema de</b> Gestión</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">
¿Olvidaste tu contraseña? Aquí puede generar una nueva contraseña.</p>
      <form action="recover-password.html" method="post" id="form1" name="form1">
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="correo" name="correo" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Pedir Nueva Clave</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="index.php">Ingresar</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>