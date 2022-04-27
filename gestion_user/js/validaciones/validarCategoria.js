function validar(){
	
	var descripcion = document.getElementById("txtDescripcion").value;
	if(nombre.trim() == ""){
		alert("El campo descripcion no debe estar vacio");
		return;
	}

	if(!isNaN(descripcion)){
		alert("la descripcion debe ser identificada sin numeros");
		return;
	}	

	var form = document.getElementById("frmDatos");
	form.submit();
}