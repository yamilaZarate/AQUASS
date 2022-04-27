<?php

require_once "configs.php";

require_once "class/Usuario.php";

session_start();

if (isset($_SESSION['usuario'])) {
	$usuario = $_SESSION['usuario'];
} else {
	header("location: /programacion3/gestion_user/form_login.php?error=" . MENSAJE_CODE);
	
}
$idPerfil= $usuario->getIdPerfil();
$idUsuario= $usuario->getIdUsuario();

$listadoModulos = $usuario->perfil->getModulos();
const ADMINISTRADOR = 1;
const EMPLEADO = 3;
const CLIENTE = 2;

?>
<!DOCTYPE html>
<html>
<head>
	<title>AQUAS</title>

	    <style type="text/css">
      /* inicio del estilo para mi menu horizontal*/

      nav.horizontal{
      background-image: linear-gradient(-225deg, #473B7B 0%, #3584A7 51%, #30D2BE 100%);
      }
      nav.horizontal ul {
        list-style-type: none;
        padding: 0px;
        margin-top: 0px;
        overflow: auto;
      } 
      nav.horizontal ul li {
        float: left;
      } 

      nav.horizontal ul li a {
        display: inline-block;
        background-color: #FFFFFF;
        color: black;
        font-weight:bold ;
        text-decoration: none;
        padding: 13px;
        margin-right: 2px;
       }
      nav.horizontal ul li a:hover{
        background-color: #191E70;
        color: #FFFFFF;
        cursor: pointer;
        text-shadow: 5px 5px 5px #282980 ;
      }
  
      nav.horizontal div.dropdown-content{
        position: absolute;
        background-image: linear-gradient(-225deg, #473B7B 0%, #3584A7 51%, #30D2BE 100%);
        z-index: auto;
        box-shadow: 5px 5px 5px #282980 ;
        display: none;
      }

      nav.horizontal div.dropdown-content ul li{
        float: none;
      }

      nav.horizontal div.dropdown-content ul li a{
        display: block;
      }

      nav.horizontal li.dropdown:hover div.dropdown-content{
        display: block;
        background-image: linear-gradient(-225deg, #473B7B 0%, #3584A7 51%, #30D2BE 100%);
        cursor: pointer;
      }
      header {
        background-image: linear-gradient(-225deg, #473B7B 0%, #3584A7 51%, #30D2BE 100%);
      }
      
      .logo {
        display: flex;
        margin: auto;
      }

      html {
       min-height: 100%;
       position: relative;
      }
      body {
        margin: 0;
        margin-bottom: 10px;
      }
      footer {
        position: fixed;
        color: white;
        z-index: 10;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50px;
        text-align: center;
        font-family: Arial, helvetica, sans-serif;
        background-image: linear-gradient(-225deg, #473B7B 0%, #3584A7 51%, #30D2BE 100%);

      }
      /*footer {
        font-family: Arial, helvetica, sans-serif;
        color: white;
        text-align: center;
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px;
        background-image: linear-gradient(-225deg, #473B7B 0%, #3584A7 51%, #30D2BE 100%);

      
      /*footer {
       position:absolute;
       text-align: center;
       bottom:0;
       width:100%;
       height:60px;   
       background:#6cf;
      }/*

        /* Fin de los Estilos Para el menu horizontal
    </style>
</head>
<body>
  <header>
      <a href="#"><img class="logo" src="/programacion3/gestion_user/css/logo.png" width=120px height=120px></a>
  </header>
  <!-- <img class="logo" src="../../css/logo.png" width=80px height=80px> -->
  <!--<nav class="horizontal">
    
  	<ul>

      <li>
        <a href="/programacion3/gestion_user/inicio.php"> Inicio</a>
      </li>

  	 /*<?php foreach ($listadoModulos as $modulo): ?>
  	
  		<li class="dropdown">

  			<a href="/programacion3/gestion_user/modulos/<?php echo $modulo->getDirectorio(); ?>/listado.php">
  				<?php echo ucwords($modulo->getDescripcion())?>

  			</a>
  		</li>
  	
  	 <?php endforeach ?>
  	
    	<li>
        <a href=/programacion3/gestion_user/modulos/simulador/formulario.html target="blank">Simulador</a>
      </li>-->

  	  <nav class="horizontal">
        <ul>
          <li><a href="/programacion3/gestion_user/inicio.php">Inicio</a></li>
            <?php if ($idPerfil == ADMINISTRADOR){ ?>

            <li class="dropdown">

              <a href="#">Gestion de Personas</a>
                <div class="dropdown-content">
                    <ul>
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/clientes/listado.php">Clientes</a></li>
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/empleados/listado.php">Empleados</a></li>
                    </ul>
                </div>
              </li>

            <li class="dropdown">
              <a href="#">Gestion de Facturas</a>
                <div class="dropdown-content">
                    <ul>
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/facturacion/listado.php">Facturas</a></li>
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/periodos/listado.php">Periodos</a></li> 
                    </ul>
                </div>
              </li>
            
            <li class="dropdown">
              <a href="">Gestion del Medidor</a>
              <div class="dropdown-content">
                    <ul>
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/medidores/listado.php">Medidor</a></li>
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/registro%20del%20medidor/listado.php">Registro del Medidor</a></li>
                    </ul>
                </div>
              <li class="dropdown">
              <a href="">Servicios</a>
              <div class="dropdown-content">
                    <ul>
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/tipos%20de%20servicios/listado.php">Tipos de Servicios</a></li>
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/categorias/listado.php">Categorias</a></li>
                    </ul>
              </div>

               <li class="dropdown">
              <a href="#">Reportes</a>
                <div class="dropdown-content">
                    <ul>
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/reporte/facturareporte.php">Por Emision facturas</a></li>
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/reporte/facturado.php">Facturado</a></li>
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/reporte/categorias_reporte.php">Por categorias</a></li>
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/reporte/reporte_de_registro.php">Por registros</a></li> 
                    </ul>
                </div>
              </li>

              
              <li class="dropdown">
              <a href="#">Gestion de Contactos</a>
                <div class="dropdown-content">
                    <ul>
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/tipos%20de%20contactos/listado.php">Alta de contacto</a></li>  
                    </ul>
                </div>
              </li>
              
            <?php } ?>
            <?php if ($idPerfil == EMPLEADO){ ?>

              <li class="dropdown">
                <a href="">Gestion del Medidor</a>
                <div class="dropdown-content">
                      <ul>
                        <li><a href="http://localhost/programacion3/gestion_user/modulos/medidores/listado.php">Medidor</a></li>
                        <li><a href="http://localhost/programacion3/gestion_user/modulos/registro%20del%20medidor/listado.php">Registro del Medidor</a></li>
                      </ul>
                </div>
            <?php } ?>
            <li class="dropdown">
              <a href="#">Gestion de Facturas</a>
                <div class="dropdown-content">
                    <ul>
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/facturacion/listado.php">Facturas</a></li>
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/periodos/listado.php">Periodos</a></li> 
                      <li><a href="http://localhost/programacion3/gestion_user/modulos/estado%20de%20pagos/listado.php">Estados de pago</a></li> 
                    </ul>
                </div>
              </li>
              
            <li>

                <a href="/programacion3/gestion_user/form_login.php">Cerrar Sesion</a> 

              </li>

        </ul>    
  </nav>

    <!--<br><br>
     	<li>
  			<a href="/programacion3/gestion_user/form_login.php">Cerrar Sesion</a> 

  		</li>

  	</ul>
  </nav>
  <br><br>-->

  <footer>
  Políticas de Privacidad
  <br>
  Derechos Reservados © 2021 Aquas
  </footer>

</body>
</html>


     