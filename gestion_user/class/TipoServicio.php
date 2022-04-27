<?php

require_once "Factura.php";
require_once "MySQL.php";

class TipoServicio {

	protected $_idServicio;
	protected $_descripcion;
	protected $_cargoFijo;
	protected $_cargoVariable;

	public $factura;

	public function getIdServicio() {
		return $this->_idServicio;
	}

	public function getDescripcion() {
		return $this->_descripcion;
	}

	public function setDescripcion($descripcion) {
		$this->_descripcion = $descripcion;
	}
	public function getCargoFijo() {
		return $this->_cargoFijo;
	}

	public function setCargoFijo($cargoFijo) {
		$this->_cargoFijo = $cargoFijo;
	}
	public function getCargoVariable() {
		return $this->_cargoVariable;
	}

	public function setCargoVariable($cargoVariable) {
		$this->_cargoVariable = $cargoVariable;
	}
	public function guardar(){

		$database= new MySQL();
        //guardar el tipo servicio
        $sql= "INSERT INTO `tipo_servicio` (`id_servicio`, `descripcion`, `cargo_fijo`,`cargo_variable`)"
        		."VALUES (NULL,'{$this->_descripcion}','{$this->_cargoFijo}','{$this->_cargoVariable}')";
        		
		$database->insertar($sql);
		//$idServicio = $database->insertar($sql);	
       
	}
	public function actualizar() {

    		$database = new MySQL();

    		$sql = "UPDATE tipo_servicio SET descripcion = '{$this->_descripcion}', "
    			 . "cargo_fijo= '{$this->_cargoFijo}', cargo_variable='{$this->_cargoVariable}'"
                 . "WHERE tipo_servicio.id_servicio = {$this->_idServicio}";
        
            $database->actualizar($sql);
	}
	public static function obtenerPorIdMedidor($idMedidor) {

		$sql = "SELECT tipo_servicio.id_servicio,tipo_servicio.descripcion "
			."FROM tipo_servicio JOIN medidor_tipo_servicio ON "
			."medidor_tipo_servicio.id_servicio= tipo_servicio.id_servicio "
			."JOIN medidor ON medidor.id_medidor = medidor_tipo_servicio.id_medidor"
			." WHERE medidor_tipo_servicio.id_medidor = {$idMedidor}";
		//echo $sql;
		//exit;
		
		$databse = new MySQL();
		$datos = $databse->consultar($sql);

		$listadoTipoServicios = [];

		while ($registro = $datos->fetch_assoc()) {
			$tipoServicio = new TipoServicio();
			$tipoServicio->_idServicio = $registro["id_servicio"];
			$tipoServicio->_descripcion = $registro["descripcion"];
			$listadoTipoServicios[] = $tipoServicio;
    	}

    	return $listadoTipoServicios;

	}



	public static function obtenerTodos() {
    	$sql = "SELECT * FROM tipo_servicio ";
       

    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoTipoServicios = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$tipoServicio = new TipoServicio();
			$tipoServicio->_idServicio = $registro["id_servicio"];
			$tipoServicio->_descripcion = $registro["descripcion"];
			$tipoServicio->_cargoFijo = $registro["cargo_fijo"];
			$tipoServicio->_cargoVariable = $registro["cargo_variable"];

    		$listadoTipoServicios[] = $tipoServicio;
    	}

    	return $listadoTipoServicios;
		
		}

	public static function obtenerPorId($id) {
    	$sql = "SELECT tipo_servicio.id_servicio,tipo_servicio.descripcion,tipo_servicio.cargo_fijo, "
    		  . "tipo_servicio.cargo_variable"
              . " FROM tipo_servicio "
              . "WHERE id_servicio=". $id;
       
        $database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe el cliente
        if ($datos->num_rows == 0) {
        	return false;
        }

        $registro = $datos->fetch_assoc();
    	$tipoServicio = self::_crearTipoServicio($registro);
		return $tipoServicio;

    }
    public function eliminar() {

    	$sql = "DELETE FROM tipo_servicio WHERE id_servicio={$this->_idServicio}";
    	
    	$database = new MySQL();
        $database->eliminar($sql);

    }
    private static function _crearTipoServicio($datos) {
    	$tipoServicio = new TipoServicio();
		$tipoServicio->_idServicio = $datos["id_servicio"];
		$tipoServicio->_descripcion = $datos["descripcion"];
		$tipoServicio->_cargoFijo = $datos["cargo_fijo"];
		$tipoServicio->_cargoVariable = $datos["cargo_variable"];
		
		return $tipoServicio;
    }


}


?>