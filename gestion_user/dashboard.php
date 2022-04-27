<?php
 
$cantidadAguaPotable = 200;
$cantidadCloacas = 100;

$total = $cantidadAguaPotable + $cantidadCloacas;
$porcentajeAgua = ($cantidadAguaPotable * 100)/ $total;
$porcentajeCloacas = ($cantidadCloacas * 100)/ $total;

$dataPoints = array(
	array("label"=>"Agua potable", "y"=>$porcentajeAgua),
	array("label"=>"Cloacas", "y"=>$porcentajeCloacas),

)
 
?>
<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">
	
		<script>
		window.onload = function() {
		 
		 
		var chart = new CanvasJS.Chart("chartContainer", {
			theme: "light2",
			animationEnabled: true,
			title: {
				text: "Servicios"
			},
			data: [{
				type: "pie",
				indexLabel: "{y}",
				yValueFormatString: "#,##0.00\"%\"",
				indexLabelPlacement: "inside",
				indexLabelFontColor: "#36454F",
				indexLabelFontSize: 18,
				indexLabelFontWeight: "bolder",
				showInLegend: true,
				legendText: "{label}",
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
		 
		}
		</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>