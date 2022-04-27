<?php

require_once "Cliente.php";
require_once "Actividad.php";
require_once "MySQL.php";


class Simulador {

	protected $_idSimulador;
	protected $_idCliente;
    protected $_idActividad;

    public $cliente;
    public $actividad;

	public function getIdSimulador() {
		return $this->_idSimulador;
	}

	public function getIdCliente() {
		return $this->_idCliente;
	}

	public function setIdCliente($_idCliente) {
		$this->_idCliente = $_idCliente;
	}

    public function getIdActividad() {
        return $this->_idActividad;
    }

    public function setIdActividad($_idActividad) {
        $this->_idActividad = $_idActividad;
    }


	public function guardar() {
		$database = new MySQL();

		$sql = "INSERT INTO simulador "
		     . "(`id_simulador`, `id_cliente`,`id_actividad`) "
		     . "VALUES (NULL, '{$this->_idCliente}', '{$this->_idActividad}')";

		$database->insertar($sql);
	}

	public function actualizar() {

		$database = new MySQL();

		$sql = "UPDATE simulador SET id_cliente = '{$this->_idCliente}'"
             . "id_actividad = '{$this->_idActividad}'"
             . " WHERE simulador.id_simulador = {$this->_idSimulador}";
      

        $database->actualizar($sql);

	}
	public static function obtenerTodos() {
    	$sql = "SELECT * FROM simulador ";
        
    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoSimuladores = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$simulador = new Simulador();
			$simulador->_idSimulador = $registro["id_simulador"];
            $simulador->_idCliente = $registro["id_cliente"];
            $simulador->cliente = Cliente::obtenerPorId($simulador->_idCliente);
            $simulador->_idActividad = $registro["id_actividad"];
            $simulador->actividad = Actividad::obtenerPorId($simulador->_idActividad);
    		$listadoSimuladores[] = $simulador;
    	}

    	return $listadoSimuladores;
	}

    public static function obtenerPorId($id) {
    	$sql = "SELECT simulador.id_simulador,simulador.id_cliente,simulador.id_actividad "
    	      . " FROM simulador "
    	      . "WHERE id_simulador=". $id;
    	
    	$database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe la categoria
       if ($datos->num_rows == 0) {
       return false;
        }

        $registro = $datos->fetch_assoc();
    	$simulador = self::_crearSimulador($registro);
		return $simulador;

    }

    public function eliminar() {

    	$sql = "DELETE FROM simulador WHERE id_simulador={$this->_idSimulador}";
    	
    	$database = new MySQL();
        $database->eliminar($sql);
    }

    private static function _crearSimulador($datos) {
    	$simulador = new Simulador();
		$simulador->_idSimulador = $datos["id_simulador"];
		$simulador->_idCliente = $datos["id_cliente"];
        $simulador->cliente = Cliente::obtenerPorId($simulador->_idCliente);
        $simulador->_idActividad = $datos["id_actividad"];
        $simulador->actividad = Actividad::obtenerPorId($simulador->_idActividad);

		return $simulador;
    }


}

?>