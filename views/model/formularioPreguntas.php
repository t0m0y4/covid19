<?php
    if (empty($_SESSION['usuario']))
     {
          echo '<script>alert("Es necesario iniciar sesión"); location.href = "login";</script>';
      }
      include "navbar.php";

?>
<?php
  $inicio = date("Y-m-d H:i:s");
 ?>
  <section class="container">
  <div class="logo">
    <h2>AutoDiagnostico Covid19</h2>
  </div>
<hr>
  <form class="form" method="post">
<?php
  $formulario = new FormularioPreguntasController;
  $formulario->formularioPreguntas();

?>

<div class="form-group btn-container">

 <?php
$respuesta = new FormularioPreguntasController;
$respuesta -> guardarFormulatioController($inicio);

?>
</div>
  <input class="form-control formIngreso btn btn-primary btn-block" type="submit" value="SubirEcuesta" name="btnRespuesta">
</form>

</section>
