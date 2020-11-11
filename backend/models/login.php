<?php
require_once 'conexion.php';

class AdminIngresoModel{
  public function ingresoModel($datosModel){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM `User_log` WHERE user =:user AND password = :pass AND estado=1 AND tipo_usuario='admin'");

    $stmt-> bindParam(":user", $datosModel[0], PDO::PARAM_STR);
    $stmt-> bindParam(":pass", $datosModel[1], PDO::PARAM_STR);

    $stmt-> execute();

    return $stmt -> fetch();

    $stmt->close();
  }
}
 ?>
