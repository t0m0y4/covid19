
<?php

require_once "conexion.php";


if(isset($_POST['type']))
{
  $type = $_POST["type"];

  ///Introduccion de la encuesta-- Inicio
  if($type == 'get_parrafo')
  {
    $sub = Conexion::conectar()->prepare("SELECT encabezado,descripcion FROM `parrafos` WHERE `id` = ".$_POST['id']);
    $sub->execute();

    $data = $sub->fetch();

    echo $data['encabezado']."|".$data['descripcion'];
  }

elseif($type == 'ocul_parrafo')
{
  $stmt = Conexion::conectar()->prepare("UPDATE parrafos SET estado =0 where id=:id");
  $stmt->bindParam(":id", $_POST["id"], PDO::PARAM_INT);

  $stmt->execute();

  $stmt->close();

}

elseif($type == 'mos_parrafo')
{
  $stmt = Conexion::conectar()->prepare("UPDATE parrafos SET estado = 1 where id=:id");
  $stmt->bindParam(":id", $_POST["id"], PDO::PARAM_INT);
  $stmt->execute();

  $stmt->close();
}

elseif($type == 'delete')
{
  $stmt = Conexion::conectar()->prepare("DELETE from parrafos where id=:id");
  $stmt->bindParam(":id", $_POST['id'], PDO::PARAM_INT);

  $stmt->execute();
  $stmt->close();
}
//Introduccion de la Encuesta -- Final
//Incio de Preguntas
elseif($type == "ocul_pregunta")
{
  $stmt = Conexion::conectar()->prepare("UPDATE Preguntas SET  estado=0 where id=:id");
  $stmt->bindParam(":id",$_POST["id"], PDO::PARAM_INT);
  $stmt->execute();

  $stmt->close();
}

elseif($type == "mos_pregunta")
{
  $stmt = Conexion::conectar()->prepare("UPDATE Preguntas SET estado=1 where id=:id");
  $stmt->bindParam(":id",$_POST["id"], PDO::PARAM_INT);
  $stmt->execute();

  $stmt->close();
}

elseif ($type == 'count') {
   $sub = Conexion::conectar()->prepare("SELECT DISTINCT hora_finalizada FROM `Respuestas`");
    $sub->execute();

   $data = $sub->fetchAll();

   $json = array("result" => $data);

  echo json_encode($json);
}


elseif($type == 'count_user'){
   $sub = Conexion::conectar()->prepare("SELECT count(id) as 'cantidad' FROM `User_log` WHERE 1");
    $sub->execute();

   $data = $sub->fetch();

   $json = array("result" => $data);

    echo json_encode($json);
}

elseif($type == 'cantidad_casos_nic'){
    $casos_nic = fopen('../../models/covid19_json/nicaragua.json','r');

    $j_json = fread($casos_nic, filesize("../../models/covid19_json/nicaragua.json"));

    echo $j_json;
}
}
?>
