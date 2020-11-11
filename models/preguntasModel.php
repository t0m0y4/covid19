<?php

require_once "conexion.php";

class GestorPreguntasModel{

public function mostrarPreguntas(){

	$stmt = Conexion::conectar()->prepare("SELECT * FROM `Preguntas` WHERE estado=1");

	$stmt -> execute();

	return $stmt -> fetchAll();

	$stmt -> close();

}

}
