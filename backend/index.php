<?php
require_once "models/enlaces.php";
require_once "models/conexion.php";
require_once "models/login.php";
require_once "models/encuestasModel.php";
require_once "models/funciones.php";
require_once "models/userProfileModel.php";
require_once "models/inicioModel.php";

require_once "controllers/enlaces.php";
require_once "controllers/login.php";
require_once "controllers/AdminTemplate.php";
require_once "controllers/encuestasController.php";
require_once "controllers/destroy_session.php";
require_once "controllers/userProfileController.php";
require_once "controllers/inicioController.php";


$new_template = new CovidAdminTemplateController();
$new_template->templateController();

 ?>
