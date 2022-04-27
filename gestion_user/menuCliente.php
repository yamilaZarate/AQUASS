<?php

require_once "configs.php";

require_once "class/Usuario.php";
require_once "class/Persona.php";


session_start();

if (isset($_SESSION['usuario'])) {
	$usuario = $_SESSION['usuario'];
} else {
	header("location: /programacion3/gestion_user/form_loginCliente.php?error=" . MENSAJE_CODE);
	
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
  	  <nav class="horizontal">
      <ul>
        <?php if ($idPerfil == CLIENTE){ ?>

          <li><a href="http://localhost/programacion3/gestion_user/incioCliente.php">Inicio</a></li>
          <li class="dropdown">
            <a href="#">Clientes</a>
              <div class="dropdown-content">
                  <ul>
                    <li><a href="http://localhost/programacion3/gestion_user/modulos/mis%20facturas/listado.php?id_cliente=4">Conozca su factura</a></li>
                  </ul>
              </div>
            </li>

          <li class="dropdown">
            <a href="#">Simulador</a>
              <div class="dropdown-content">
                  <ul>
                    <li><a href="http://localhost/programacion3/gestion_user/modulos/simulador/formulario.html" target="blank">Simulador de consumos</a></li>  
                  </ul>
              </div>
            </li>
          
          <li class="dropdown">
            <a href="">Configuracion</a>
            <div class="dropdown-content">
                  <ul>
                    <li><a href="http://localhost/programacion3/gestion_user/modulos/mis%20datos/usuarios.php">Mis datos</a></li>
                  </ul>
              </div>
            
            <li>
              <a href="/programacion3/gestion_user/form_loginCliente.php">Cerrar Sesion</a>

            </li>
        <?php } ?>

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
