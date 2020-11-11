<?php include "navbar.php";
if (!empty($_SESSION['usuario']))
 {
    session_destroy();
  }
?>
<div class="container" id="detalles">
<div class="row">

<div class="col-md-3 col-lg-3"></div>


<div class="col-md-6 col-lg-6 col-sm-6 rounded" id="content">
<h4 class="modal-title" id="title">Acerca de la encuesta de AutdoPestizaje COVID-19</h4>

<p>Esta encuesta de la Universidad de Bluefields Indian & Caribbean University (BICU) le preguntará sobre temas de salud y su participación es voluntaria.</p>
<h5>Por qué ayuda?</h5>
<p>Esta encuesta ayudará a BICU a monitorear y pronosticar la propagación del coronavirus (COVID-19) para mejorar la preparación y la respuesta.</p>
<h5>Recolección de datos y su privacidad</h5>


<p><i class="fas fa-briefcase-medical fa-lg"></i>  Esta encuesta es realizada por la BICU. Tardará unos 3-5 minutos.</p>
<p><i class="fas fa-lock fa-lg"></i> BICU no compartirá información sobre quién eres.</p>
<p><i class="fas fa-list-alt fa-lg"></i> BICU utilizará sus respuestas en la encuesta para fines de investigación de COVID-19.</p>
<p><i class="fas fa-lock fa-lg"></i> BICU no compartirá las respuestas de su encuesta con otras entidades.</p>

<h5>Parametros</h5>
<p><i class="fas fa-lock fa-lg"></i> Pertenecer a la comunidad BICU.</p>
<a id="back" class="btn btn-secondary" href="inicio">Volver</a>
<a id="foward" class="btn btn-success" href="login3">Comenzar Encuesta</a>
</div>


</div>
</div>
