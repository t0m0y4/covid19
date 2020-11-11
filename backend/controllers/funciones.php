
<?php
require_once "../models/encuestasModel.php";
  if(isset($_POST["type"]))
  {
    if($_POST["type"] == "conseguir_datos_preg")
    {
    $echo_datos_editar="";
    $respuesta = GestorEncuestaModel::getPreguntaActualizarModel($_POST['id']);

    $echo_datos_editar .= '<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md col-lg">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Datas Generales</h3>
                <a class="btn btn-success" style="float:right;" onclick="addValPreg('.$respuesta['id'].')"><i class="fa fa-braille"></i> Agregar Valor</a>
              <a href="modificarPreguntas" class="btn btn-secondary" style="float:right; margin-right:20px;"><i class="fas fa-reply"></i>  Volver</a>
            </div>

            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Pregunta</label>
                <input type="text" id="inputName" class="form-control" name="pregunta" value="'.$respuesta["preguntas"].'">
              </div><hr>
              ';
              $echo_datos_editar .= '<div class="table-responsive"><table class="table table-striped table-bordered">
              <thead class="thead-dark">
              <tr>
              <th>Respesta</th>
              <th>Valor</th>
              </tr>
              </thead><tbody>
              ';

              #Name spaces for Respuesta y Valor
              $count =1;

              $respuesta_pregunta = explode(',',$respuesta['respuestas_a_generar']);
              foreach ($respuesta_pregunta as $value) {
              $valor = explode('_', $value);

              $resp_name = "res_"; #Name space para respuestas_a_generar
              $val_name = "val_"; #Name Space para Valores

              $resp_name .= $count;
              $val_name .= $count;
              $echo_datos_editar .='
              <tr><td>
                <label for="inputProjectLeader">Respuesta</label>
                <input type="text" id="inputProjectLeader" class="form-control" name="'.$resp_name.'" value="'.$valor[0].'">
              </td>
              ';
              if(!empty($valor[1])){
            $echo_datos_editar.='</td>
                <td><label for="inputProjectLeader">Valor</label>
                <input type="text" id="inputProjectLeader" class="form-control" name="'.$val_name.'" value="'.$valor[1].'">';
                                  }
              elseif(empty($valor[1]))
              {
                $echo_datos_editar.='</td>
                    <td><label for="inputProjectLeader">Valor</label>
                    <input type="text" id="inputProjectLeader" class="form-control" name="'.$val_name.'" value="" placeholder="Sin Valor">';
              }
              $count++;
            $echo_datos_editar .='  </td></tr>';
            }

            $echo_datos_editar.='</tbody></table></div>';
            $echo_datos_editar .= "<button type='submit' name='actualizar_pregunta' class='btn btn-success' style='float:right;'><i class='fas fa-book fa-lg'></i> Save Changes</button><input type='hidden' value=".$respuesta["id"]." name='id'>
            <!-- /.card-body -->
            </div>

            </div>
          </div>
          </div>
          <!-- /.card -->
        </div>
          </section>";

      $echo_datos_editar .= "<style> #preguntas{ display:none;}</style>";
        echo $echo_datos_editar;
  }

}
?>
