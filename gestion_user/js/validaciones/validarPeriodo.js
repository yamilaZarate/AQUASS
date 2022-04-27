function validar(){
	//Validacion mes
	var mes = document.getElementById("txtMes").value;
	if(mes.trim() == ""){
		alert("El campo mes no debe estar vacio");
		return;
	}
	if(mes.length < 5){
		alert("El campo mes debe contener al menos 5 caracteres");
		return;
	}
	if(mes.length > 10){
		alert("El campo mes debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(mes)){
		alert("El nombre debe ser identificado sin numeros");
		return;
	}
	var anio = document.getElementById("txtAnio").value;
	if(isNaN(anio)){
		alert("El campo año debe ser identificado con numeros");
		return;

	}
	if(anio.length != 4){
		alert("El campo dni debe contener 4 digitos sin puntos");
		return;
	}

	var form = document.getElementById("frmDatos");
	form.submit();
}
