function validar(){
	//Validacion Nombre
	var nombre = document.getElementById("txtNombre").value;
	if(nombre.trim() == ""){
		alert("El campo Nombre no debe estar vacio");
		return;
	}
	if(nombre.length < 3){
		alert("El campo Nombre debe contener al menos 3 caracteres");
		return;
	}
	if(nombre.length > 101){
		alert("El campo Nombre debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(nombre)){
		alert("El nombre debe ser identificado sin numeros");
		return;
	}
	//Validacion Apellido	
	var apellido = document.getElementById("txtApellido").value;
	if(apellido.trim() == ""){
		alert("El campo Apellido no debe estar vacio");
		return;
	}
	if(apellido.length < 3){
		alert("El campo Apellido debe contener al menos 3 caracteres");
		return;
	}
	if(apellido.length > 101){
		alert("El campo Apellido debe contener menos 50 caracteres");
		return;
	}
	if(!isNaN(apellido)){
		alert("El apellido debe ser identificado sin numeros");
		return;
	}
	//Validacion Edad FALTA


	var dni = document.getElementById("txtDni").value;
	if(dni.trim() == ""){
		alert("El campo DNI no debe estar vacio");
		return;
	}
	
	if(dni.length != 8){
		alert("El campo dni debe contener 8 digitos, sin punto y agregar 0 en caso de valor menor 10 millones");
		return;
	}
	
	if(!isNaN(dni)){
		alert("El dni debe ser identificado con numeros");
		return;
	}




	//Validacion DNI

	//Validacion Sexo
	var sexo = document.getElementById("cboSexo").value;
	if(sexo == 0){
		alert("Debe seleccionar el sexo");
		return;
	}

	document.getElementById('fecha').onChange = function(event) {
	   var fecha_ahora = new Date();
	   var fecha_entrada =  new Date(this.value);


	   if($fecha_entrada > $fecha_ahora) {
	      alert("Seleccione una fecha valida");

	      event.preventDefault();
	      this.focus();

	      return false;
	   }

	   return true;
	};


	var form = document.getElementById("frmDatos");
	form.submit();
}