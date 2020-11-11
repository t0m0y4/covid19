$(document).ready(function(){

$('.update_db').click(function(event){
	swal({
	      title: "Actualizar Base de Datos",
	      text: "¿Está seguro de actualizar DB de Covid19?",
	      icon: "warning",
		   	buttons: ["No", "Si"],
		  dangerMode: true
		}).then((ohyes) => {
	      if (ohyes) {
	        $.post('../models/update_covid19.php', {type: 'update'}, function(data) {

	           swal("Actualizado!", "DB Actualizdo.", "success").then((value) => {
                                location.reload();
                                });
	        });

	      } else {
	        swal("Cancelado", "Actualizacion cancelada", "error");
	      }
	    });
});

get_Cantidad_Encuestas();
get_Cantidad_Usuarios();
get_Cantidad_Casos_Nic();
});


function get_Cantidad_Encuestas(){
	$.post('models/funciones.php', {type:'count'}, function(data){
	    var json = JSON.parse(data);
        var cantidad = json.result.length;

        $('#cant_encuestas').html(cantidad);
	});
}

function get_Cantidad_Usuarios(){
	$.post('models/funciones.php', {type:'count_user'}, function(data){
	    var json = JSON.parse(data);

        $('#cantidad_usuarios').html(json.result.cantidad);
	});

}

function get_Cantidad_Casos_Nic(){
	$.post('models/funciones.php', {type:'cantidad_casos_nic'}, function(data){
	    var json = JSON.parse(data);
        //var cantidad = json.result.length;

        $('#casos_nic').html(thousands_separators(json.cases));
        //console.log(json);
	});
}


function thousands_separators(num)
  {
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
  }