<?php
  require_once "models/login.php";
  require_once "models/enlaces.php";
  require_once "models/preguntasModel.php";
  require_once "models/respuestaModel.php";
  require_once "models/conexion.php";
  require_once "models/gestorEncuestaModel.php";
  require_once "models/json_db.php";
  //include_once "getEncuestaController.php"

  require_once "controllers/login.php";
  require_once "controllers/enlaces.php";
  require_once "controllers/preguntasController.php";
  require_once "controllers/templateController.php";
  require_once "controllers/gestorEncuestaController.php";
  require_once "controllers/destroy_session.php";
  require_once "controllers/api_covid19.php";



  $new_template = new CovidTemplateController();
  $new_template->templateController();

/*
<form action="respuestaController.php" method="post">
<?php  include_once "getPreguntasController.php"  ?>
<input type="submit" name="btnRespuesta" value="Submit Respuesta">
</form>
*/
?>
