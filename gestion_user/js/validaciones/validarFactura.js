function validar(){
	
	//Validacion Fecha
	var periodo = document.getElementById("cboPeriodo").value;
	if(periodo == 0){
		alert("Debe seleccionar el periodo");
		return;
	}
	var medidor = document.getElementById("cboMedidor").value;
	if(medidor == 0){
		alert("Debe seleccionar el medidor");
		return;
	}
	var primer_vencimiento = document.getElementById("1erVencimiento").value;
	if(primer_vencimiento == 0){
		alert("Debe seleccionar el primer vencimiento");
		return;
	}
	var segundo_vencimiento = document.getElementById("cboSegundoVencimiento").value;
	if(segundo_vencimiento == 0){
		alert("Debe seleccionar el segundo vencimiento");
		return;
	}
	var form = document.getElementById("frmDatos");
	form.submit();
}