<?php
require_once "conexion.php";
date_default_timezone_set("America/Managua");
class IngresoModels{

	public function userIngresoModel($user, $pass){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM `User_log` WHERE carnet = :usuario AND password =:pass");

		$stmt -> bindParam(":usuario", $user, PDO::PARAM_STR);
		$stmt -> bindParam(":pass", $pass, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}
}
