<?php

require_once "../../class/Usuario.php";
$idPersona = (10);

$lista = Usuario::obtenerPorIdPersona(10);

//$lista = Usuario::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>AQUAS</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/programacion3/gestion_user/css/tablas.css">
	<link rel="stylesheet" type="text/css" href="/programacion3/gestion_user/css/style.css">

</head>
<body>
	<header>
		<nav>
			<?php require_once "../../menuCliente.php"; ?>
			
		</nav>
	</header>
	<div id="primerContenedor">
		<div id="contenedorgeneral">
			<div>
				<button type="button" onClick="history.go(-1)"><span class="icon-arrow-left"></span>
				</button>
			</div>

			<div class="contenedor">

				<table border="1">

					<h3>Mi usuario</h3>
					<thead>

						<tr>
							<th>Username</th>
							<th>Acciones</th>
						</tr>
					</thead>

					<?php foreach  ($lista as $usuario2): ?>
						<tbody>
							<tr>
								<td><?php echo $usuario2->getUsername(); ?></td>
								<td>

									<a href="modificar.php?id_usuario=<?php echo $usuario2->getIdUsuario();?>&id_persona<?php echo $idPersona?>"><span class="icon icon-pencil"></span> </a>

								</td>

							</tr>
						</tbody>

					<?php endforeach ?>

				</table>
			</div>
		</div>
	</div>

</body>
</html>