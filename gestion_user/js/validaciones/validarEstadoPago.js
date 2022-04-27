function validar(){
	//Validacion
	var descripcion = document.getElementById("txtDescripcion").value;
	if(descripcion.trim() == ""){
		alert("El campo no debe estar vacio");
		return;
	}
	if(descripcion.length < 3){
		alert("El campo debe contener al menos 3 caracteres");
		return;
	}
	if(descripcion.length > 51){
		alert("El campo debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(descripcion)){
		alert("El campo debe ser creado sin numeros");
		return;
	}
	var form = document.getElementById("frmDatos");
	form.submit();
}