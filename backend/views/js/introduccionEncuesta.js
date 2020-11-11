$(document).ready(function()
{

$(".delParrafo").click(function(event){
	var id = $(this).data('id');
  swal({
	      title: "Eliminar Parrafo",
	      text: "¿Está seguro de eliminar este parrafo?",
	      icon: "warning",
		   	buttons: ["No", "Si"],
		  dangerMode: true
		}).then((ohyes) => {
	      if (ohyes) {
	        $.post('models/funciones.php', {type: 'delete', id:id}, function(data) {

	           swal("Eliminado!", "El evento ha sido eliminado.", "success").then((value) => {
                                location.reload();
                                });
	        });

	      } else {
	        swal("Cancelado", "Eliminación cancelada", "error");
	      }
	    });
});




//End of Ducment on load
});

///Introduccion de la encuesta
function editarParrafo(id)
{
	$.post('models/funciones.php', {type: 'get_parrafo', id: id}, function(data)
	{
		var even = data.split("|");

		$("#edit_parrafo_id").val(id);
		$("#edit_parrafo_titulo").val(even[0]);
		$("#edit_parrafo_descripcion").val(even[1]);


		$("#EditParrafo").modal('show');
	});

}



$(".visible").click(function(event){
	var id = $(this).data('id');

  $.post('models/funciones.php', {type: 'ocul_parrafo', id: id}, function(data) {
     swal("Oculto", "El parrafo a sido ocultado.", "info");
     setTimeout(function(){ location.reload(); }, 1500);
  });

});

$('.novisible').click(function(event){
	var id = $(this).data('id');

	$.post("models/funciones.php", {type:'mos_parrafo', id:id}, function(data){
		swal("visible", "El parrafo esta visible", "success");
		setTimeout(function(){location.reload();}, 1500);
	});

});
///Introduccion de la ecuesta Final
