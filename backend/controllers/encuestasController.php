<?php

class GestorEncuestaController{

  public function encuestaIntroduccionController(){

    $respuesta_encuesta = GestorEncuestaModel::introEncuesta();
foreach ($respuesta_encuesta as $key => $value) {

$echo_encuesta_intro ='
<div class="column">
    <div class="card card-primary">

      <div class="card-header">
        <h3 class="card-title">Datos Generales</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
        </div>
      </div>

      <div class="card-body">

        <div class="form-group">
          <label for="inputName">Nombre de Encuesta</label>
          <input type="text" id="inputName" class="form-control" value="'.$value['Descripcion'].'" name="descripcion">
        </div>

        <div class="form-group">
          <label for="inputDescription">Titulo de la Encuesta</label>
          <textarea id="inputDescription" class="form-control" rows="2" name="titulo">'.$value['titulo'].'</textarea>
        </div>

        <div class="form-group">
          <label for="inputDescription">Introduccion de la Encuesta</label>
          <textarea id="inputDescription" class="form-control" rows="8" name="introduccion">'.$value['introduccion'].'</textarea>
        </div>

      </div>



      <!-- /.card-body -->
    </div>
    <div class="row">
       <div class="col-12">
         <a href="encuestas" class="btn btn-secondary">Cancel</a>
         <input type="submit" value="Save Changes" class="btn btn-success float-right" name="updateIntroduccion">
       </div>
     </div>
  </div>';



echo $echo_encuesta_intro;
}
}

public function encuestaParrafosController(){
  $respuesta_parrafos = GestorEncuestaModel::parrafosEncuesta();
    $echo_encuesta_parrafo = '
    <div class="column">
      <div class="card card-primary">

        <div class="card-header">
          <h3 class="card-title">Parrafos de la Encuesta</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>

        <div class="card-body">';
      $count= 1;
  foreach ($respuesta_parrafos as $key => $value) {

        $echo_encuesta_parrafo .='<div class="form-group">
          <label for="inputName">Titulo del Parrafo - '.$count.'</label>
          <input type="text" readonly="readonly"id="inputName" class="form-control" value="'.$value['encabezado'].'" name="'.$value['encuesta_id'].'_'.$key[0].'_'.$value['id'].'">
        </div>
        <div class="form-group">
          <label for="inputDescription">Descripcion del Parrafo</label>
          <textarea id="inputDescription" readonly="readonly"class="form-control" rows="5" name="'.$value['encuesta_id'].'_'.$key[1].'_'.$value['id'].'">'.$value['descripcion'].'</textarea>
        </div>
        <i class="fas fa-edit btn btn-primary" onclick = "editarParrafo('.$value["id"].')"></i>
        <i class="fas fa-window-close btn btn-danger delParrafo" data-id="'.$value["id"].'"></i>';
        if($value["estado"] == 1)
        {
          $echo_encuesta_parrafo .= '<a class="visible" data-id="'.$value["id"].'" style="padding:10px;"><i class="fas fa-eye btn btn-primary"></i></a>';

        }
        elseif($value["estado"] == 0){
            $echo_encuesta_parrafo .= '<a class="novisible"  data-id="'.$value["id"].'" style="padding:10px;"><i class="fas fa-eye-slash btn btn-warning"></i></a>';
          }

        $echo_encuesta_parrafo .= '<hr>';
        $count++;
}

$echo_encuesta_parrafo .='</div>
                        <!-- /.card-body -->
                        </div>
                        </div>';

echo $echo_encuesta_parrafo;
}



public function updateEncuestaController()
{
if(isset($_POST['updateIntroduccion']))
{
  $encuesta_information = array('nombre' =>$_POST['descripcion'] ,
                                'titulo' =>$_POST['titulo'],
                                'intro' =>$_POST['introduccion']);

  $respuesta_update = GestorEncuestaModel::updateEncuestaIntroduccionModel($encuesta_information);
  if($respuesta_update == "ok"){

    echo '<script type="text/javascript">
      swal({
        title: "Guardado",
        text: "La encuesta ha sido creado correctamente",
        icon: "success",
        button: "Cerrar"}).then((value) => {window.location = "encuestas";

      });

    </script>';
  }
  else
  {
    echo '<script type="text/javascript">
      swal({
        title: "Error",
        text: "Hubo un Error",
        icon: "error",
        button: "Cerrar"}).then((value) => {window.location = "encuestas";

      });

    </script>';
  }
}

}

public function updateParrafoController()
{
  if(isset($_POST['update_parrafo']))
  {
    //unset($_POST['update_parrafo']);
    $respuesta = GestorEncuestaModel::updateParrafoModel($_POST['edit_parrafo_titulo'], $_POST['edit_parrafo_descripcion'], $_POST['edit_parrafo_id']);
    if($respuesta == "ok")
    {
      echo '<script type="text/javascript">
        swal({
          title: "Guardado",
          text: "La encuesta ha sido creado correctamente",
          icon: "success",
          button: "Cerrar"}).then((value) => {window.location.reload;

        });

      </script>';
    }
    else {

      echo '<script type="text/javascript">
        swal({
          title: "Error",
          text: "Hubo un Error",
          icon: "error",
          button: "Cerrar"}).then((value) => {window.location.reload;

        });

      </script>';
    }
  }
}

public function datosUsuariosController()
{
  $echo_info_usuarios="";
  $respusta = GestorEncuestaModel::datosUsuariosModel();
  foreach ($respusta as $key => $value) {
    $echo_info_usuarios .= '<form method="post"><tr>';
    $echo_info_usuarios .= '<tr>';
    $echo_info_usuarios .= '<td>'.$value['nombre'].'</td>';
    $echo_info_usuarios .= '<td>'.$value['apellido'].'</td>';
    $echo_info_usuarios .= '<td>'.$value['carnet'].'</td>';
    $echo_info_usuarios .= '<td>'.$value['sexo'].'</td>';
    $echo_info_usuarios .= '<td>'.$value['telefono'].'</td>';
    $echo_info_usuarios .= '<td>'.$value['correo'].'</td>';
    $echo_info_usuarios .= "<td><button type='submit' name='result' class='btn btn-success'><i class='fas fa-chart-bar fa-lg'></i></button><input type='hidden' value=".$value["id"]." name='id'></td>";
    $echo_info_usuarios .= '</tr></form>';
  }

  echo $echo_info_usuarios;
}


public function resultUsuarioController()
{
  if(isset($_POST["result"]))
  {
    $cantidad_result = GestorEncuestaModel::cantidadEncuestasController($_POST['id']);

    $echo_tablas_graficas = '<style>#encuesta{display:none;}</style>';
      $color_list = array('primary', 'secondary', 'success','info','warning','light');
      $color_header =0;
      $color_return = sizeof($color_list)-1;

      foreach ($cantidad_result as $key => $fecha) {
        $porcentaje_chart = 0;
          $canva_id ='my_'.strval(rand());

        if($color_header <= sizeof($color_list) -1)
        {
          $color = $color_list[$color_header];
          $return = $color_list[$color_return];
          $color_header++;
          $color_return--;
        }
        else {
          $color = 'bg-primary';
          $color_return = sizeof($color_list)-1;
          $color_header = 0;
        }
      $conseguir_datos_tabla_preguntas = GestorEncuestaModel::resultadoEncuestaModel($fecha['hora_finalizada']);

    $echo_tablas_graficas .='
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 col-lg-8">
            <div class="card"><a class="btn btn-'.$return.'" href="verUsuariosEncuestas">Return</a>
              <div class="card-header bg-'.$color.'">
                <h3 class="card-title">Preguntas con Sus Respuestas del dia '.$fecha['hora_finalizada'].'</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body ">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 8px">#</th>
                      <th>Pregunta</th>
                      <th>Respuestas</th>
                      <th style="width: 40px">Puntaje</th>
                    </tr>
                  </thead>
                  <tbody>';
                  $count = 1;
                  //Imprima las preguntas de la encuesta
                  foreach ($conseguir_datos_tabla_preguntas as $key => $value) {
                    $suma_de_valores = 0;
                    $respuestas_selecionadas = '';

                    $respuesta_valor = GestorEncuestaModel::respuestaValorEncuestaController($value['id'],$_POST['id'],$fecha['hora_finalizada']);
                    //Suma y contatena las respuesta selecionadas y los valores de estos
                    foreach ($respuesta_valor as $key => $datos) {
                      $suma_de_valores += $datos['valor'];
                      $porcentaje_chart += $suma_de_valores;
                      $respuestas_selecionadas .= $datos['respuesta'];
                    }

                    $echo_tablas_graficas .='<tr>
                      <td>'.$count.'</td>
                      <td style="word-break:break-all">'.$value['preguntas'].'</td>
                      <td>'.$respuestas_selecionadas.'</td>
                      <td>'.$suma_de_valores.'</span></td>
                    </tr>';
                    $count++;
              }
                $echo_tablas_graficas.='</tbody>
                </table>';
              $echo_tablas_graficas .='</div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->


              <!-- /.card-body -->
            </div>
              <!-- /.card-body -->
              <div class="col-md-4 col-lg-4" style="height:auto;">';

              $echo_tablas_graficas  .=GestorEncuestaController::createChartController($canva_id, $porcentaje_chart);
              $echo_tablas_graficas.='</div>
              </div>
              </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->';
}
        $echo_tablas_graficas .= '';
        echo $echo_tablas_graficas;
  }
}

public function createChartController($id, $num)
{
  $color_chart=['#21FF64','#86E81E','#E89D1E','#FF5717'];
  if($num <= 20){
      $color = $color_chart[0];
  }
  elseif ($num <= 40) {
    $color = $color_chart[1];
  }
  elseif ($num <= 60) {
    $color = $color_chart[2];
  }
  else{
    $color = $color_chart[3];
  }



  $chart="";
$chart .="<canvas  id='".$id."' width='auto' height='600px;'></canvas>
<script>
var x = $num;
var color_c = '".$color."';
var ctx = document.getElementById('".$id."');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Medida de analisis','Nivel de Contagio'],
        datasets: [{
            label: 'Podria ser Estres-Toma precauciones y observa',
            data: [20,0],
            backgroundColor: '#21FF64',
            borderColor: 'rgba(0, 0, 0, 1)',
            borderWidth: 1
        },
        {
            label: 'Hidratate y conserva medidas de Higiene',
            data: [20,0],
            backgroundColor: '#86E81E',
            borderColor: 'rgba(0, 0, 0, 1)',
            borderWidth: 1,
        },{
            label: 'Acude a consulta con el medico',
            data: [20,0],
            backgroundColor: '#E89D1E',
            borderColor: 'rgba(0, 0, 0, 1)',
            borderWidth: 1
        },
        {
            label: 'Busque atencion rapida para realizar una prueba',
            data: [40,0],
            backgroundColor: '#FF5717',
            borderColor:   'rgba(0, 0, 0, 1)',
            borderWidth: 1
        },
        {
            label: 'Persona',
            data: [0,x],
            backgroundColor:  color_c,
            borderColor:   'rgba(0, 0, 0, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                stacked:true

            }],
            xAxes: [{
                stacked:true

            }]
        }
    }
});
</script>";

return $chart;
}




public function preguntasEncuestaController()
{
  $echo_preguntas_encuesta="";
  $preguntas = GestorEncuestaModel::preguntasEncuestaModel();
  $count= 1;
  foreach ($preguntas as $key => $value) {
    $tipo = "";
    if($value["tipo_de_preguntas"] == "radio")
    {
      $tipo = "Radio";
    }
    elseif($value["tipo_de_preguntas"] == "ddown")
    {
        $tipo = "Drop Down";
    }
    elseif($value["tipo_de_preguntas"] == "chbox"){
        $tipo = "Check Box";
    }

    $echo_preguntas_encuesta .= '<form method="post">';
    $echo_preguntas_encuesta .= '<tr>';
    $echo_preguntas_encuesta .= '<td>'.$count.'</td>';
    $echo_preguntas_encuesta .= '<td>'.$value['num_pregunta'].'</td>';
    $echo_preguntas_encuesta .= '<td>'.$value['preguntas'].'</td>';
    $echo_preguntas_encuesta .= '<td>'.$tipo.'</td>';
    $echo_preguntas_encuesta .= '<td><a class="btn btn-success preg_modificar" data-id="'.$value["id"].'"><i class="fas fa-edit"></i></a></td>';
    if($value["estado"] == 1)
    {
        $echo_preguntas_encuesta .= '<td><a class="novisible" data-id="'.$value['id'].'"><i class="fas fa-eye btn btn-primary"></i></a></td>';
    }
    elseif($value["estado"] == 0)
    {
        $echo_preguntas_encuesta .= '<td><a class="visible" data-id="'.$value["id"].'"><i class="fas fa-eye-slash btn btn-warning"></i></a></td>';
    }
    $echo_preguntas_encuesta .= '</tr></form>';
    $count++;
  }

  echo $echo_preguntas_encuesta;

}


public function guardarCambiosPreguntaController(){
  if(isset($_POST["actualizar_pregunta"]))
  {
    unset($_POST["actualizar_pregunta"]);

    $respuesta_a_array =array();
    $counter = (sizeof($_POST)-2)/2;

    for($x =1;$x<=$counter;$x++)
    {
      $resp_name = "res_";
      $val_name = "val_";
      $respuesta = "";

      $resp_name .= $x;
      $val_name .= $x;
      if(!empty($_POST[$resp_name])){
      if(empty($_POST[$val_name]))
      {
        $respuesta = $_POST[$resp_name];
      }
      else {
      $respuesta = $_POST[$resp_name].'_'.$_POST[$val_name];
      }
      $respuesta_a_array[] = $respuesta;
    }
    }
    $respuesta_a_guardar = implode(',',$respuesta_a_array);

    $guardar = GestorEncuestaModel::guardarCambiosPreguntaController($_POST['id'], $_POST['pregunta'], $respuesta_a_guardar);
    if($guardar == 'ok')
    {
      echo '<script type="text/javascript">
        swal({
          title: "Guardado",
          text: "Los datps han sido creado correctamente",
          icon: "success",
          button: "Cerrar"}).then((value) => {window.location.assign("modificarPreguntas");

        });

      </script>';
    }
    else {

      echo '<script type="text/javascript">
        swal({
          title: "Error",
          text: "Hubo un Error",
          icon: "error",
          button: "Cerrar"}).then((value) => {window.location.assign("modificarPreguntas");

        });

      </script>';
    }
   }
}

public function guardarPreguntaNuevaController()
{
  if(isset($_POST["nueva_p"]))
  {
    $respuesta = GestorEncuestaModel::guardarPreguntaNuevaModel($_POST["nueva_pregunta"], $_POST["tipo_pregunta"]);

    if($respuesta == 'ok')
    {
      echo '<script type="text/javascript">
        swal({
          title: "Guardado",
          text: "Los datps han sido creado correctamente",
          icon: "success",
          button: "Cerrar"}).then((value) => {window.location.assing("modificarPreguntas");

        });

      </script>';
    }
    else {

      echo '<script type="text/javascript">
        swal({
          title: "Error",
          text: "Hubo un Error",
          icon: "error",
          button: "Cerrar"}).then((value) => {window.location.assing("modificarPreguntas");

        });

      </script>';
    }

  }
}

public function guardarRespuestaValorController()
{
  if(isset($_POST["nueva_res_val"]))
  {
    echo '<script type="text/javascript">
      swal({
        title: "Guardado",
        text: "Los datps han sido creado correctamente",
        icon: "success",
        button: "Cerrar"}).then((value) => {window.location.assing("modificarPreguntas");

      });

    </script>';
    $res = $_POST["preg_respuesta"];
    $val = $_POST["preg_valor"];
    $id = $_POST["id_preg"];

    $to_append = $res.'_'.$val;
    $respuesta = GestorEncuestaModel::getPreguntaActualizarModel($id);

    $array_respuesta = explode(',',$respuesta["respuestas_a_generar"]);

    $array_respuesta[]= $to_append;

    $toString_respuesta = implode(',',$array_respuesta);

    $updated = GestorEncuestaModel::guardarRespuestaValorModel($id, $toString_respuesta);

    if($updated == 'ok')
    {
      echo '<script type="text/javascript">
        swal({
          title: "Guardado",
          text: "Los datps han sido creado correctamente",
          icon: "success",
          button: "Cerrar"}).then((value) => {window.location.assing("modificarPreguntas");

        });

      </script>';
    }
    else {

      echo '<script type="text/javascript">
        swal({
          title: "Error",
          text: "Error en la Insercion",
          icon: "error",
          button: "Cerrar"}).then((value) => {window.location.assing("modificarPreguntas");

        });

      </script>';
    }



  }
}
}
?>
