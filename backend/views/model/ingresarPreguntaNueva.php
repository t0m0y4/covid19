<div class="container">
  <button class="btn btn-primary" style="float:right;"type="button" data-toggle="modal" data-target="#myEncuestaModal"><i class="fas fa-database"></i> Agregar Pregunta</button>

<div class="modal fade" id="myEncuestaModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title">Pregunta Nueva</h4>
      </div>

      <!-- Modal Body -->
      <form method="post">
      <div class="modal-body">
        <div class="form-group">
        <label for="preguntaNueva">Nueva Preguta</label>
        <textarea id="preguntaNueva" class="form-control" name="nueva_pregunta"></textarea>

        <label for="tipoPregunta">Tipo de Pregunta</label>
        <select name="tipo_pregunta" class="form-control" id="tipoPregunta">
            <option value="ddown">Drop Down</option>
            <option value="radio">Radio</option>
            <option value="chbox">Check Box</option>
        </select>
      </div>
      </div>

    <?php $gestor_encuesta->guardarPreguntaNuevaController();?>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-success" value="Guardar" name="nueva_p">
      </div>
</form>
    </div>
  </div>
</div>
</div>
