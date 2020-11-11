$(".novisible").click(function(event){
 var id = $(this).data('id');
 $.post("models/funciones.php", {type:'ocul_pregunta', id:id},function(data){
   swal("Oculto","La pregunta ha sido oculta!",'info');
   setTimeout(function(){location.reload();},1500);
 });

});

$(".visible").click(function(event){
  var id= $(this).data("id");

  $.post("models/funciones.php", {type:"mos_pregunta", id:id}, function(data){

    swal("Visible", "La pregunta esta visible", "success");
    setTimeout(function(){location.reload();}, 1500);
  });
});

$(".preg_modificar").click(function(event){
  var id = $(this).data("id");

  $.post("controllers/funciones.php", {type:"conseguir_datos_preg", id:id}, function(data)
  {
      $("#show_preg_valores").append(data);
  });

});

function addValPreg(id)
{
  $("#id_preg").val(id);
  $("#myValPregModal").modal("show");
}
