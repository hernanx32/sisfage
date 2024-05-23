<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1"><b>Sistema de</b> Gestión</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><?php echo $mensaje; ?></p>

      <form id="form1" name="form1"  action="index.php?scr=ingresar" method="post">
        <div class="input-group mb-3">
          <input name="usuario" type="text" required="required" class="form-control" id="usuario" placeholder="Usuario" onkeypress="return bajarEnter(this, event)" size="20" maxlength="20">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="clave" type="password" required="required" class="form-control" id="clave" placeholder="Contraseña" size="20" maxlength="20">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
  <div class="row">
          <!-- /.col -->
    <div class="col-5">
    <a href="index.php?scr=olvidoclave">¿Olvido Su Clave?</a>
   </div>         
    <div class="col-7">
    <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
    </div>

          <!-- /.col -->
        </div>
      </form>
 
   
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
