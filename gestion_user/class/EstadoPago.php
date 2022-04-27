<?php

require_once "Periodo.php";
require_once "MySQL.php";

class EstadoPago {

	protected $_idEstadoPago;
	protected $_descripcion;

	public $periodo;


	public function getIdEstadoPago() {
		return $this->_idEstadoPago;
	}

	public function getDescripcion() {
		return $this->_descripcion;
	}

	public function setDescripcion($descripcion) {
		$this->_descripcion = $descripcion;
	}

	public function guardar() {
		$database = new MySQL();

		$sql = "INSERT INTO estado_pago "
		     . "(`id_estado_pago`, `descripcion`) "
		     . "VALUES (NULL, '{$this->_descripcion}')";
		//echo $sql;
		//exit;

		$database->insertar($sql);
	}

	public function actualizar() {

		$database = new MySQL();

		$sql = "UPDATE estado_pago SET descripcion = '{$this->_descripcion}'"
             . " WHERE estado_pago.id_estado_pago = '{$this->_idEstadoPago}'";
      

        $database->actualizar($sql);

	}
	public static function obtenerTodos() {
    	$sql = "SELECT * FROM estado_pago ";
        
    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoEstadoPago = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$estadoPago = new EstadoPago();
			$estadoPago->_idEstadoPago = $registro["id_estado_pago"];
			$estadoPago->_descripcion = $registro["descripcion"];
    		$listadoEstadoPago[] = $estadoPago;
    	}

    	return $listadoEstadoPago;
	}

    public static function obtenerPorId($id) {
    	$sql = "SELECT estado_pago.id_estado_pago,estado_pago.descripcion"
    	      . " FROM estado_pago "
    	      . "WHERE id_estado_pago=". $id;

    	$database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe la categoria
       if ($datos->num_rows == 0) {
       return false;
        }

        $registro = $datos->fetch_assoc();
    	$estadoPago = self::_crearEstadoPago($registro);
		return $estadoPago;

    }

    public function eliminar() {

    	$sql = "DELETE FROM estado_pago WHERE id_estado_pago={$this->_idEstadoPago}";

    	
    	$database = new MySQL();
        $database->eliminar($sql);
    }

    private static function _crearEstadoPago($datos) {
    	$estadoPago = new EstadoPago();
		$estadoPago->_idEstadoPago = $datos["id_estado_pago"];
		$estadoPago->_descripcion = $datos["descripcion"];
		return $estadoPago;
    }


}

?>