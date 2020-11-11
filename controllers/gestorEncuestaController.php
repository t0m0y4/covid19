<?php
class GestorEncuestaController{

  public function detallesEncuesta()
  {
    $respuesaIntroduccion = GestorEncuestaModel::introduccionEncuesta();
    $respuestaParrafos = GestorEncuestaModel::parrafosEncuesta();

    $echo_informacion_encuesta ="";

    foreach ($respuesaIntroduccion as $key => $value) {

    $echo_informacion_encuesta .='

      <h2>'.$value['titulo'].'</h2>
      <p>'.$value['introduccion'].'.</p>
     <div class="column">';
}
foreach ($respuestaParrafos as $key => $value) {

    $echo_informacion_encuesta .= '<h4>'.$value['encabezado'].'</h4>
    <p>'.$value['descripcion'].'</p>';
}
$echo_informacion_encuesta .= '<hr style="background:black;">';
$echo_informacion_encuesta .= '<div class="rounded" style="background:#4d79ff;"><p style="color:white; font-weight:bold;">Ayuda a la Universidad BICU a predecir los puntos críticos de COVID-19</p>
                              <p style="color:white">Realice una encuesta rápida sobre cómo se siente, incluso si se siente bien, para ayudar a la BICU a rastrear la propagación del coronavirus (COVID-19).</p></div>';
$echo_informacion_encuesta .= '<a class="btn btn-primary" href="detallesEncuesta" style="color:white;">Ver detalles de Encuesta</a>';
echo $echo_informacion_encuesta;
  }

}

 ?>
