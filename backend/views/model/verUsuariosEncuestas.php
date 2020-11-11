<?php
  if (empty($_SESSION['usuario']) && empty($_SESSION["validarIngreso"]))
     {
          echo '<script>alert("Es necesario iniciar sesión"); location.href = "login";</script>';
      }



include_once "nav_bar_top.php";
include_once "nav_menu_side.php";

$gestor_encuesta = new GestorEncuestaController;
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Encuestas Realizadas</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row"id="encuesta">
        <div class="col-md col-lg">
          <div class="card" >
            <div class="card-header">
              <h3 class="card-title">Datos de los usuarios que realizaron la encuesta</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Carnet</th>
                  <th>Sexo</th>
                  <th>Telefono</th>
                  <th>Correo</th>
                  <th>Ver Estadisticas</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $gestor_encuesta->datosUsuariosController();
                 ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Carnet</th>
                  <th>Sexo</th>
                  <th>Telefono</th>
                  <th>Correo</th>
                  <th>Ver Estadisticas</th>
                </tr>
                </tfoot>
              </table>
            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->



</div>
</div>

<div class="row">
  <div class="col-md col-lg">
<?php $gestor_encuesta->resultUsuarioController(); ?>
</div>
</div>

</section>
</div>






          <?php
          include_once "footer.php";
          ?>
