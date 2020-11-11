<?php
class FormularioPreguntasController{

public function formularioPreguntas(){
$echo_formulario_preguntas ='';

$preguntas = GestorPreguntasModel::mostrarPreguntas();
$count= 1;
foreach ($preguntas as $row => $value) {
  if($value["preguntas"] != "")
  {
  $echo_formulario_preguntas .= '<div class="container"><div class="row">';
  $echo_formulario_preguntas .= '<div class="col-sm-10 col-lg-10 col-md-10">
                                <legend>'.$count.'.'.$value["preguntas"].'</legend>';

  $cont_respuesta ='';
  if($value["tipo_de_preguntas"] == "chbox")
  {
      $options_select = explode(",", $value["respuestas_a_generar"]);
      $echo_formulario_preguntas .= '<div class ="row">';

      $count_items = count($options_select);
      $items_count = 0;

      $echo_formulario_preguntas .='<div class="col-md-12 col-sm-12>"';

     foreach ($options_select as $option) {
        $quitar_valor = explode("_", $option);

        $echo_formulario_preguntas .= '<div class="col-sm-12 col-md-12"><input type="checkbox" name="'.$value['id'].'[]'.'" value="'.$option.'" id="'.$option.'"/><label for="'.$option.'">'.$quitar_valor[0].'</label></div>';
        }
      $echo_formulario_preguntas .='</div></div>';

    }


  elseif($value["tipo_de_preguntas"] == "radio")
  {
    $options_select = explode(",", $value["respuestas_a_generar"]);

      $echo_formulario_preguntas .= '<div class ="row">';
      foreach ($options_select as $option) {
        $quitar_valor = explode("_", $option);
        $echo_formulario_preguntas .= '<div class="col-sm col-md text_size"><input required type="radio" name="'.$value["id"].'" value="'.$option.'" id="'.$option.'"/><label for="'.$option.'">'.$quitar_valor[0].'</label></div>';
      }
      $echo_formulario_preguntas .='</div>';
  }


elseif($value["tipo_de_preguntas"] == "ddown")
{
  $options_select = explode(",", $value["respuestas_a_generar"]);

  $echo_formulario_preguntas .= '<div class="row"><select class="inputstl" name="'.$value["id"].'">';
  foreach ($options_select as $option) {
    $quitar_valor = explode("_",$option);
    $echo_formulario_preguntas .= '<div class="col-sm-12 col-md-12" text_size><option value="'.$option.'">'.$quitar_valor[0].'</option>';
  }
  $echo_formulario_preguntas .= '</select></div>';
}

  $echo_formulario_preguntas .='</div>';
  $echo_formulario_preguntas .= '</div></div>';

  $count++;
}
}

echo $echo_formulario_preguntas;
}


public function guardarFormulatioController($fecha_inicio)
{
  if(isset($_POST['btnRespuesta']))
  {

    unset($_POST['btnRespuesta']);

    $filer_empty_values = array_filter($_POST);

    if(!empty($filer_empty_values))
    {
      $respuesta = SubirRespuestaModel::respuestaModel($_POST, $fecha_inicio);

      if($respuesta == 'ok')
      {
        echo '<script type="text/javascript">
          swal({
            title: "Encuesta Finalizada",
            text: "Gracias por realizar la encuesta, Seras notificad@ si los resultados son positivos.",
            icon: "success",
            button: "Cerrar"}).then((value) => {window.location = "inicio";

          });

        </script>';
      }
      else
      {

      }

    }

  }
}
}
?>
