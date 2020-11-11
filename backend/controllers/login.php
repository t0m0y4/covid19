<?php
session_start();

class AdminIngresoController{

  public function adminIngresoController(){
    if(isset($_POST["usuarioIngreso"]))
    {
      if(preg_match('/^[a-zA-Z0-9.]+$/', $_POST['usuarioIngreso']))
      {
        $datosController = array();
        $datosController[0] = $_POST['usuarioIngreso'];
        $datosController[1] = $_POST['passwordIngreso'];

        $respuesta = AdminIngresoModel::ingresoModel($datosController);

        if($respuesta['user'] == $datosController[0] && $respuesta['password'] == $datosController[1])
        {
          $_SESSION['validarIngreso'] = true;
          $_SESSION['tipoUsuario'] = $respuesta["tipo_usuario"];
          $_SESSION['usuario'] = $respuesta['user'];
          $_SESSION['usuarioId'] = $respuesta['id'];
          $_SESSION['usuarioNombre'] = $respuesta['nombre'].' '.$respuesta['apellido'];
          $_SESSION['usuarioCorreo'] = $respuesta['correo'];

          header('location:inicio');
        }
        else {

          echo '<div class="d-flex justify-content-center"><div style="width: 80%" class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Número de carnet o PIN incorrectos </div></div>';
        }
      }
    }
  }
}
 ?>
