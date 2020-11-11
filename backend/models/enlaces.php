<?php
class EnlacesBackendModel{

  public function enlaceModel($enlaces){

    if($enlaces == "inicio" ||
       $enlaces == "login" ||
       $enlaces == "encuestas" ||
       $enlaces == "verUsuariosEncuestas" ||
       $enlaces == "visualizarResultados" ||
       $enlaces == "perfile_usuario" ||
       $enlaces == "modificarPreguntas")
    {
      $module = "views/model/".$enlaces.".php";
    }

    else{
      $module = "views/model/login.php";
    }

    return $module;
  }
}



 ?>
