function validarIngreso(){

	var expresion = /^[a-zA-Z0-9]*$/;

	if(!expresion.test($("#usuarioIngreso").val())){

		return false;
	}

	return true;

}
