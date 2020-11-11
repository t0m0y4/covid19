<?php
if (!empty($_SESSION['usuario']))
 {
    session_destroy();
  }
      include "navbar.php";
    ?>
<div class="container">
<div class="row">

      <?php
       $informacion =new GestorEncuestaController;
       $informacion->detallesEncuesta();
        ?>
</div>

<div class="column">
  <?php include_once "carusel.php";?>
</div>

</div>
</div>







<!--

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Card title</h4>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text"></p>
  </div>
</div>

-->
