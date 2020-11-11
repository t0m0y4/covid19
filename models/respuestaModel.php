<?php
require_once 'conexion.php';

class SubirRespuestaModel{

public function respuestaModel($formulario_respuestas, $f_inicio){
$f_final = date("Y-m-d H:i:s");
  $count =0;
  foreach($formulario_respuestas as $key => $value)
  {
    $respuesta = $value;
    $estado = 1;
    $user = $_SESSION['id'];
    if(is_array($respuesta))
    {
      foreach($respuesta as $res)
      {
      $valor_respuesta = "";
      $valor_respuesta = explode("_", $res);
      $sql = "INSERT INTO Respuestas (respuesta, valor, usuario,preguntas_id, estado, hora_finalizada, hora_inicio) VALUES (?,?,?,?,?,?,?)";
      $stmt= Conexion::conectar()->prepare($sql);
      $stmt->execute([$valor_respuesta[0], $valor_respuesta[1], $user, $key, $estado,$f_final, $f_inicio]);
    }
    }

    else{
    $valor_respuesta = explode("_", $value);
    $sql = "INSERT INTO Respuestas (respuesta, valor, usuario, preguntas_id, estado, hora_finalizada, hora_inicio) VALUES (?,?,?,?,?,?,?)";
    $stmt= Conexion::conectar()->prepare($sql);
    $stmt->execute([$valor_respuesta[0], $valor_respuesta[1],$user, $key, $estado,$f_final, $f_inicio]);
  }

  $count++;
  }
  if($count > 0)
  {
    return 'ok';
  }
  else {
    return 'error';
  }
  $stmt ->close();
}

}
