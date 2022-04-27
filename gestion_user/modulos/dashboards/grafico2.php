<?php
 
$cantidadFemenino = 210; 
$cantidadMasculino = 215;
$cantidadOtro = 70;

$total = $cantidadMasculino + $cantidadFemenino + $cantidadOtro;
$porcentajeFemenino = ($cantidadFemenino * 100)/ $total;
$porcentajeMasculino = ($cantidadMasculino * 100)/ $total;
$porcentajeOtro = ($cantidadOtro * 100)/ $total;


$dataPoints = array(
	array("label"=>"Masculino", "y"=>$porcentajeMasculino),
	array("label"=>"Femenino", "y"=>$porcentajeFemenino),
	array("label"=>"Otros", "y"=>$porcentajeOtro),

)
 
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Genero",
		horizontalAlign: "left"
	},
	data: [{
		type: "doughnut",
		startAngle: 60,
		//innerRadius: 60,
		indexLabelFontSize: 17,
		indexLabel: "{label} - #percent%",
		toolTipContent: "<b>{label}:</b> {y} (#percent%)",
		dataPoints: [
			{ y: 67, label: "Femenino" },
			{ y: 28, label: "Masculino" },
			{ y: 10, label: "Otros" },
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>