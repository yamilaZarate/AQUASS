<?php

require_once "MySQL.php";

class TipoImpuesto {

	protected $_idImpuesto;
	protected $_descripcion;
	protected $_porcentaje;

	public $descripcion;

	public function getIdImpuesto() {
		return $this->_idImpuesto;
	}
	public function setIdImpuesto($_idImpuesto) {
		$this->_idImpuesto = $_idImpuesto;
	}
	public function getDescripcion() {
		return $this->_descripcion;
	}

	public function setDescripcion($_descripcion) {
		$this->_descripcion = $_descripcion;
	}
	public function getPorcentaje() {
		return $this->_porcentaje;
	}

	public function setPorcentaje($_porcentaje) {
		$this->_porcentaje = $_porcentaje;
	}
	public function guardar(){

		$database= new MySQL();

        $sql= "INSERT INTO `tipo_impuesto` (`id_impuesto`, `descripcion`, `porcentaje`)"
        		."VALUES (NULL,'{$this->_descripcion}','{$this->_porcentaje}')";
        		
		$database->insertar($sql);
       
	}
	public function actualizar() {

    		$database = new MySQL();

    		$sql = "UPDATE tipo_impuesto SET descripcion = '{$this->_descripcion}', "
    			 . "porcentaje = '{$this->_porcentaje}'"
                 . "WHERE tipo_impuesto.id_impuesto = {$this->_idImpuesto}";
        
            $database->actualizar($sql);
	}

	public static function obtenerTodos() {
    	$sql = "SELECT * FROM tipo_impuesto ";
       

    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoTiposImpuestos = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$tipoImpuesto = new TipoImpuesto();
			$tipoImpuesto->_idImpuesto = $registro["id_impuesto"];
			$tipoImpuesto->_descripcion = $registro["descripcion"];
			$tipoImpuesto->_porcentaje = $registro["porcentaje"];
			
    		$listadoTipoImpuesto[] = $tipoImpuesto;
    	}

    	return $listadoTipoImpuesto;
		
		}

	public static function obtenerPorId($id) {
    	$sql = "SELECT tipo_impuesto.id_impuesto,tipo_impuesto.descripcion, "
    		  . "tipo_impuesto.porcentaje " 
              . " FROM tipo_impuesto "
              . "WHERE id_impuesto =". $id;
		       
        $database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe el cliente
        if ($datos->num_rows == 0) {
        	return false;
        }

        $registro = $datos->fetch_assoc();
    	$tipoImpuesto = self::_crearTipoImpuesto($registro);
		return $tipoImpuesto;

    }
    public function eliminar() {

    	$sql = "DELETE FROM tipo_impuesto WHERE id_impuesto ={$this->_idImpuesto}";
    	
    	$database = new MySQL();
        $database->eliminar($sql);

    }
    private static function _crearTipoImpuesto($datos) {
    	$tipoImpuesto = new TipoImpuesto();
		$tipoImpuesto->_idImpuesto = $datos["id_impuesto"];
		$tipoImpuesto->_descripcion = $datos["descripcion"];
		$tipoImpuesto->_porcentaje = $datos["porcentaje"];
		
		return $tipoImpuesto;
    }


}


?>