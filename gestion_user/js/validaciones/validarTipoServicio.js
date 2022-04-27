function validar(){
	
	var descripcion = document.getElementById("txtDescripcion").value;
	if(descripcion.trim() == ""){
		alert("El campo descripcion no debe estar vacio");
		return;
	}
	if(descripcion.length < 5){
		alert("El campo Nombre debe contener al menos 5 caracteres");
		return;
	}
	if(!isNaN(descripcion)){
		alert("la descripcion debe ser identificada sin numeros");
		return;
	}	
	var form = document.getElementById("frmDatos");
	form.submit();
}