<?php
session_start();
class Ingreso{

public function ingresoController(){
	if(isset($_POST["usuarioIngreso"])){

		if(preg_match('/^[a-zA-Z0-9.]+$/', $_POST["usuarioIngreso"])){

			$user = $_POST["usuarioIngreso"];
			$pass = $_POST["passwordIngreso"];

			$respuesta = IngresoModels::userIngresoModel($user, $pass);

				if($respuesta["carnet"] == $_POST["usuarioIngreso"] && $respuesta['password'] == $_POST["passwordIngreso"]){

					$_SESSION["validarUsuario"] = true; #variable de sesion para el usuario
					$_SESSION["usuario"] = $respuesta["user"];
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["gt"] = null;
								header("location:formularioPreguntas");
                    }
					else{
					//	header("location:Visualizar_Calificaciones");
					}


				}

				else {

					echo '<div class="d-flex justify-content-center"><div style="width: 80%" class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button>Número de carnet o PIN incorrectos </div></div>';
				}


		}

	}

}

 ?>
