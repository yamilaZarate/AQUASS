<?php
require_once "class/Cliente.php";
require_once "class/Factura.php";

$listaFactura = Factura::clienteMorosos();

$numero = [];
$nombre = [];

foreach ($listaFactura as $factura) {
	$cliente = Cliente::obtenerPorId($factura->getIdMedidor());
	$nombre[]= $cliente->getNombre()." ". $cliente->getApellido();
	$numero[]= $factura->getIdEstadoPago();
	
}

?>
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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inicio</title>
    <meta name="author" content="Yamila Zarate">
    <link rel="stylesheet" href="index.html">
    <link rel="shortcut icon" href="logo2.jpg">
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<script type="text/javascript" src="/programacion3/gestion_user/js/charts.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">
	<script src="/programacion3/gestion_user/js/canvasjs.min.js"></script>

	

</head>
<body>
	<header>
		<nav>
			<?php require_once "menu.php"; ?>
		</nav>
	</header>

	<div id="primerContenedor">
		<div align="center" id="bienvenido">
			¡Bienvenido al Inicio <?php echo $usuario;?>!

		</div>
	</div>


	<div id="contenedorinicio">

		<div id="contenedor1">
			<h2 align="center">Clientes Morosos</h2>
				<h4 align="center">max los primeros <br>5 clientes</h4>
			<canvas id="myChart" width="80%" height="80%"></canvas>
		</div>

		<div id="contenedor2" style="position: flex;">
			<h2>Genero de clientes</h2>
			<?php
				require_once "das1.php";
			?>
		</div>
		<br><br><br>

		<div id="contenedor3" style="position: flex;">
			<h2 align="center">Servicios</h2>
			<div id="chartContainer" width="50%" height="50%"></div>
		</div>

	</div>

<script>
		const ctx = document.getElementById('myChart').getContext('2d');
		const myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: <?php echo json_encode($nombre)?>,
		        datasets: [{
		            label: '',
		            data: <?php echo json_encode($numero)?>,

		            backgroundColor: [
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)',
		                'rgba(255, 159, 64, 0.2)'
		            ],
		            borderColor: [
		                'rgba(255, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            y: {
		                beginAtZero: true
		            }
		        }
		    }
		});
		</script>
		<script>
		window.onload = function() {
		 
		 
		var chart = new CanvasJS.Chart("chartContainer", {
			theme: "light2",
			animationEnabled: true,
			title: {
				text: ""
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

		<script>
		window.onload = function() {
		 
		 
		var chart = new CanvasJS.Chart("chartContainer", {
			theme: "light2",
			animationEnabled: true,
			
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





</body>
</html>

