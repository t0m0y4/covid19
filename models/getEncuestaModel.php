<?php

require_once "conexion.php";

class GestorEncuestasModel{
public function mostrarEcuestas(){

	$stmt = Conexion::conectar()->prepare("SELECT * FROM `Encuesta` WHERE 1");

	$stmt -> execute();

	return $stmt -> fetchAll();

	$stmt -> close();

}


}

?>
