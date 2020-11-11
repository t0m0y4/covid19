<?php
//session_start();
class Enlaces{

    public function enlacesController(){
// action nos traera el nombre del enlace que queremos mostrar
    if (isset($_GET["action"])){

         $enlaces = $_GET["action"];
     }
     else{
        if(isset($_SESSION['validarUsuario']))
        {
          $_GET['action'] = 'inicio';
          $enlaces = $_GET['action'];
        }
        else{
          $_GET['action'] = 'inicio';
          $enlaces = $_GET['action'];
          }
      }

 $respuesta = EnlacesModels::enlaceModel($enlaces);
include $respuesta;
}

}
