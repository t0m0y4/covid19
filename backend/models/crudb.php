<?php
	require_once "conexion.php";

	class Datos extends Conexion
	{

		public function consulta($consulta)
		{
			$result = Conexion3::conectar()->query($consulta);

			return $result;

			$result->close();

			Conexion::conectar()->close();
		}
	}
?>
