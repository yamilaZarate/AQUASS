function validar(){
	//Validacion
	var lectra_actual = document.getElementById("txtNumero").value;
	if(numero.trim() == ""){
		alert("El campo no debe estar vacio");
		return;
	}
	if(numero.length < 10){
		alert("El campo debe contener mas de 10 caracteres");
		return;
	}
	if(numero.length > 51){
		alert("El campo debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(numero)){
		alert("El campo debe ser creado con numeros");
		return;
	}
	var form = document.getElementById("frmDatos");
	form.submit();
}