<section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1>Iniciar Sesión</h1>
    </div>
    <div class="login-box">


      <form class="login-form" method="post" id="formIngreso" onsubmit="return validarIngreso()">
<!-- <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>-->
         <div class="form-group">
          <label class="control-label">Usuario</label>
          <input class="form-control" type="text" placeholder="Usuario" autofocus id="usuarioIngreso" name="usuarioIngreso">
        </div>
        <div class="form-group">
          <label class="control-label">Contraseña</label>
          <input class="form-control" type="password" placeholder="Contraseña" id="passwordIngreso" name="passwordIngreso">
        </div>



        <div class="form-group btn-container">

         <?php
    $ingreso = new Ingreso();
    $ingreso -> ingresoController();

     ?>

          <input class="form-control formIngreso btn btn-primary btn-block" type="submit" value="Entrar">

        </div>
      </form>



    </div>
  </section>
