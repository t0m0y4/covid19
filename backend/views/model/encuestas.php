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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Encuesta Ver/Editar</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form method="post">
    <div id="EditParrafo" class="modal fade">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
             <div class="modal-header" style="border:1px solid #eee">
               <h3 class="modal-title">Editar Parrafo Num: </h3><input type="hidden" id="edit_parrafo_id" name="edit_parrafo_id">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
              <div class="modal-body" style="border:1px solid #eee;">
                  <div class="form-group column">
                      <label>Titulo</label>
                      <input type="text" id="edit_parrafo_titulo" class="form-control" placeholder="Evento" name ="edit_parrafo_titulo"value="Evento">
                    </div>
                    <div class="form-group column">
                      <label>Descripcion</label>
                      <textarea class="form-control"id="edit_parrafo_descripcion" rows="7" name="edit_parrafo_descripcion"></textarea>
                    </div>
                    <?php
                    $gestor_encuesta->updateParrafoController();
                    ?>

              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="update_cambios" name="update_parrafo">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              </div>
          </div>
      </div>
    </div>
</form>



    <section class="content">
        <div class="card card-secondary">
          <div class="card-header">

            <h3 class="card-title">Encuesta de:</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div><div class="card-body">

          <div class="form-group">

      <form method="POST">
              <?php

                    $gestor_encuesta->encuestaIntroduccionController();
                ?>

                <?php

                  $gestor_encuesta->updateEncuestaController();
                  ?>


              </form>


  <form method="POST">
          <?php

                $gestor_encuesta->encuestaParrafosController();
            ?>
          </form>



  </div></div>
</div>
</section>

    <!-- /.content -->

  <!-- /.content-wrapper -->
  <?php
  include_once "footer.php";
  ?>
