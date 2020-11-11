<?php
require_once "conexion.php";
class GestorEncuestaModel{

  public function introduccionEncuesta()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM `Encuesta` WHERE id=1");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
  }

  public function parrafosEncuesta()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM `parrafos` WHERE encuesta_id=1 and estado = 1 ORDER BY orden");
    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
  }
}


 ?>
