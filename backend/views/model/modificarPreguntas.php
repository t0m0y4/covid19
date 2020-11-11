<?php
if (empty($_SESSION['usuario']) && $_SESSION["validarIngreso"] == false)
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
            <h1>Preguntas de la Encuesta</h1>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row"id="preguntas">
        <div class="col-md col-lg">
          <div class="card" >
            <div class="card-header">
              <h3 class="card-title">Edicion de Preguntas</h3>
              <?php include_once "ingresarPreguntaNueva.php";?>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Num</th>
                  <th>Orden</th>
                  <th>Pregunta</th>
                  <th>Tipo</th>
                  <th>Editar</th>
                  <th>Visible</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $gestor_encuesta->preguntasEncuestaController();
                 ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>Num</th>
                  <th>Orden</th>
                  <th>Pregunta</th>
                  <th>Tipo</th>
                  <th>Editar</th>
                  <th>Visible</th>
                </tr>
                </tfoot>
              </table>
            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->



</div>
</div>

<form method="post">
<div class="row">
  <div class="col-md col-lg" id="show_preg_valores">

</div>
</div>
  <?php $gestor_encuesta->guardarCambiosPreguntaController();?>
</form>
</section>
</div>

<div class="container">
  <button class="btn btn-primary" style="float:right;"type="button" data-toggle="modal" data-target="#myValPregModal"><i class="fas fa-database"></i> Agregar Pregunta</button>

<div class="modal fade" id="myValPregModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title">Respuesta y Valor Nuevo</h4>
      </div>

      <!-- Modal Body -->
      <form method="post">
      <div class="modal-body">
        <input type="text" name="id_preg" id="id_preg">
        <div class="form-group">
        <label for="respuesta">Respuesta Nueva</label>
        <input type="text" name="preg_respuesta" id="respuesta">

        <label for="valor">Valor</label>
        <input type="text" name="preg_valor" id="valor">
      </div>
      </div>
      <?php
      $gestor_encuesta->guardarRespuestaValorController();
      ?>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-success" value="Guardar" name="nueva_res_val">
      </div>
</form>
    </div>
  </div>
</div>
</div>




<?php
include_once "footer.php";
?>
