function validar(){
	//Validacion 
	var cliente = document.getElementById("cboCliente").value;
	if(cliente == 0){
		alert("Debe seleccionar un cliente");
		return;
	}
	
	var form = document.getElementById("frmDatos");
	form.submit();
}
