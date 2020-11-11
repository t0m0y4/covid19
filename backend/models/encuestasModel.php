<?php
require_once "conexion.php";

class GestorEncuestaModel{

  public function introEncuesta(){
    //$usuarioId = $_SESSION['usuarioId'];
    $stmt = Conexion::conectar()->prepare("SELECT * FROM `Encuesta` WHERE id=1");

    $stmt->execute();

    return $stmt ->fetchAll();

    $stmt->close();
  }

  public function parrafosEncuesta()
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM `parrafos` WHERE encuesta_id=1 ORDER BY orden");

    $stmt->execute();

    return $stmt->fetchAll();

    $stmt->close();
  }

  public function updateEncuestaIntroduccionModel($informacion)
  {
      $stmt = Conexion::conectar()->prepare("UPDATE `Encuesta` SET Descripcion=:descrip, titulo=:titulo, introduccion=:intro");

      $stmt->bindParam(":descrip", $informacion['nombre'],PDO::PARAM_STR);
      $stmt->bindParam(":titulo", $informacion['titulo'],PDO::PARAM_STR);
      $stmt->bindParam(":intro", $informacion['intro'],PDO::PARAM_STR);


      if($stmt->execute())
      {
        return "ok";
      }
      else {
        return "error";
      }

      $stmt->close();
  }

public function updateParrafoModel($encanezado, $descripcion, $id)
{
  $stmt = Conexion::conectar()->prepare("UPDATE `parrafos` SET encabezado =:encabezado, descripcion=:descripcion WHERE id=:id");

  $stmt->bindParam(":encabezado", $encanezado,PDO::PARAM_STR);
  $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
  $stmt->bindParam(":id", $id, PDO::PARAM_INT);

  if($stmt->execute())
  {
    return "ok";
  }
  else {
    return "error";
  }
  $stmt->close();
}

public function datosUsuariosModel()
{
  $stmt = Conexion::conectar()->prepare("SELECT DISTINCT User_log.id,nombre,apellido,carnet,sexo,telefono,correo from User_log inner join Respuestas on User_log.id = Respuestas.usuario where tipo_usuario != 'admin' GROUP by hora_finalizada DESC ");

  $stmt->execute();

  return $stmt->fetchAll();

  $stmt->close();
}

public function resultadoEncuestaModel($fecha){
  $stmt = Conexion::conectar()->prepare("SELECT DISTINCT Preguntas.id, preguntas from Preguntas inner join Respuestas on Respuestas.preguntas_id = Preguntas.id where Respuestas.hora_finalizada =:fecha");
  $stmt->bindParam(':fecha',$fecha, PDO::PARAM_STR);

  $stmt->execute();

  return $stmt->fetchAll();

  $stmt->close();
}

public function cantidadEncuestasController($id)
{
  $stmt = Conexion::conectar()->prepare("SELECT DISTINCT hora_finalizada from Respuestas where usuario = :id GROUP by hora_finalizada;");
  $stmt->bindParam(":id",$id,PDO::PARAM_INT);

  $stmt->execute();

  return $stmt->fetchAll();

  $stmt->close();
}

public function respuestaValorEncuestaController($pregunta_id, $usuario_id, $fecha)
{
  $stmt = Conexion::conectar()->prepare("SELECT respuesta, Respuestas.valor from Preguntas inner join Respuestas on Respuestas.preguntas_id = Preguntas.id inner join User_log on User_log.id = Respuestas.usuario where Respuestas.hora_finalizada =:fecha and Respuestas.usuario = :user and Respuestas.preguntas_id = :pregunta");

  $stmt->bindParam(':fecha',$fecha,PDO::PARAM_STR);
  $stmt->bindParam(':user',$usuario_id, PDO::PARAM_INT);
  $stmt->bindParam(':pregunta', $pregunta_id,PDO::PARAM_INT);

  $stmt->execute();

  return $stmt->fetchAll();

  $stmt->close();
}

public function preguntasEncuestaModel()
{
  $stmt = Conexion::conectar()->prepare("SELECT * from Preguntas WHERE encuesta_id = 1");
  $stmt->execute();

  return $stmt->fetchAll();

  $stmt->close();
}

public function getPreguntaActualizarModel($id)
{
  $stmt = Conexion::conectar()->prepare("SELECT id,preguntas,respuestas_a_generar from Preguntas where id=:id");

  $stmt->bindParam(':id',$id,PDO::PARAM_INT);

  $stmt->execute();

  return $stmt->fetch();
  $stmt->close();
}

public function guardarCambiosPreguntaController($id, $pregunta, $respuesta)
{
  $stmt = Conexion::conectar()->prepare("UPDATE Preguntas SET preguntas=:pregunta, respuestas_a_generar =:respuesta where id=:id");

  $stmt->bindParam(':pregunta',$pregunta, PDO::PARAM_STR);
  $stmt->bindParam(':respuesta', $respuesta, PDO::PARAM_STR);
  $stmt->bindParam(':id',$id,PDO::PARAM_INT);

  if($stmt->execute())
  {
    return 'ok';
  }
  else
  {
    return 'error';
  }

  $stmt->close();
}

public function guardarPreguntaNuevaModel($pregunta, $tipo_pregunta)
{
  $order = GestorEncuestaModel::nuevoOrdenPreguntaModel();
  $nuevo_array = array();
  #Numero de Orden para pregunta Nueva
  foreach ($order as $key => $value) {
    array_push($nuevo_array, $value["num_pregunta"]);
  }
  $nueva_orden = max($nuevo_array)+ 1;

  $stmt = Conexion::conectar()->prepare("INSERT INTO Preguntas (preguntas, tipo_de_preguntas, num_pregunta, encuesta_id,estado) values(:pregunta, :tipo, :orden, 1,1)");

  $stmt->bindParam(':pregunta', $pregunta, PDO::PARAM_STR);
  $stmt->bindParam(':tipo', $tipo_pregunta, PDO::PARAM_STR);
  $stmt->bindParam(':orden', $nueva_orden, PDO::PARAM_INT);

  if($stmt->execute())
  {
    return "ok";
  }
  else
  {
      return "error";
  }

  $stmt->close();
}

public function nuevoOrdenPreguntaModel()
{
  $stmt = Conexion::conectar()->prepare("SELECT num_pregunta from `Preguntas` WHERE 1");

  $stmt->execute();

  return $stmt->fetchAll();

  $stmt->close();
}

public function guardarRespuestaValorModel($id, $respuesta)
{
  $stmt = Conexion::conectar()->prepare("UPDATE Preguntas set respuestas_a_generar=:resVal where id=:id");
  $stmt->bindParam(":resVal", $respuesta,PDO::PARAM_STR);
  $stmt->bindParam(":id", $id, PDO::PARAM_INT);

  if($stmt->execute())
  {
    return "ok";
  }
  else
  {
    return "error";
  }
}
}


 ?>
