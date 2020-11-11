<?php
class adminEnlaceController{

  public function enlaceController()
  {

    if(isset($_GET['action']))
    {
      if(isset($_SESSION['validarIngreso']) && $_GET['action'] == 'login')
      {
        header('location:inicio');
      }
      else {
            $enlaces = $_GET['action'];
          }
    }


    else
    {
      if(isset($_SESSION['validarIngreso']))
      {
        $_GET['action'] = 'inicio';
        $enlaces = $_GET['action'];
      }
      else
      {
      $_GET['action'] = 'login';
      $enlaces = $_GET['action'];
      }
    }

    $respuesta = EnlacesBackendModel::enlaceModel($enlaces);
    include $respuesta;
  }
  }


 ?>
