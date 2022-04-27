<?php

require_once "Factura.php";
require_once "MySQL.php";

Class MedidorTipoServicio {

	protected $_idMedidorTipoServicio;
	protected $_descripcion;
	protected $cargo_fijo;
	protected $cargo_variable;
	protected $_idServicio;
	protected $_idMedidor;

	public $factura;

	public function getIdMedidorTipoServicio() {
		return $this->_idMedidorTipoServicio;
	}

	public function getIdServicio() {
		return $this->_idServicio;
	}

	public function setIdServicio($idServicio) {
		$this->_idServicio = $idServicio;
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
	public function getIdMedidor(){
		return $this->_idMedidor;

    }
	public function setIdMedidor($idMedidor) {
		$this->_idMedidor = $idMedidor;
	}
	
	public function guardar(){

		//guardar el medidor
		$database = new MySQL();
        $sql= "INSERT INTO `medidor_tipo_servicio` (`id_medidor_tipo_servicio`, `id_servicio`, `id_medidor`)"
        		."VALUES (NULL,'{$this->_idServicio}','{$this->_idMedidor}')";
        //echo $sql;
        //exit;
       
    
		$database->insertar($sql);
	}
		public function actualizar() {

			$database = new MySQL();
    		$sql = "UPDATE medidor_tipo_servicio SET id_servicio = '{$this->_idServicio}' "
    			 . " id_medidor = '{this->idMedidor}'"
                 . "WHERE medidor_tipo_servicio.id_medidor_tipo_servicio= {$this->_idMedidorTipoServicio}";
            echo $sql;
            exit;
            
            $database->actualizar($sql);
	}
////////////////////////////////////////////////////////////
		public static function obtenerTodos() {
    	$sql = "SELECT medidor.id_medidor,medidor.numero,medidor.id_cliente,"
				. "medidor_tipo_servicio.id_medidor_tipo_servicio,medidor_tipo_servicio.id_servicio, " 
                . " medidor_tipo_servicio.id_medidor " 
				. "FROM medidor_tipo_servicio JOIN medidor ON medidor.id_medidor = medidor_tipo_servicio.id_medidor";

    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoMedidoresTiposServicios = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$medidorTipoServicio = new MedidorTipoServicio();
			$medidorTipoServicio->_idMedidorTipoServicio = $registro["id_medidor_tipo_servicio"];
			$medidorTipoServicio->_idServicio = $registro["id_servicio"];
			$medidorTipoServicio->_idMedidor = $registro["id_medidor"];


    		$listadoMedidoresTiposServicios[] = $medidorTipoServicio;
    	}
		return $listadoMedidoresTiposServicios;
		}

	    public static function obtenerPorId($id) {
	    	$sql = "SELECT medidor.id_medidor,medidor.numero,medidor.id_cliente,"
					. "medidor_tipo_servicio.id_medidor_tipo_servicio, "
					. " medidor_tipo_servicio.id_servicio, medidor_tipo_servicio.id_medidor "
					. "FROM medidor_tipo_servicio "
					. "JOIN medidor ON medidor.id_medidor = medidor_tipo_servicio.id_medidor "
					. "WHERE id_medidor_tipo_servicio=". $id;
			
	        $database = new MySQL();
	        $datos = $database->consultar($sql);

	        // TODO: ver que pasa cuando no existe el medidor
	        if ($datos->num_rows == 0) {
	        	return false;
	        }

	        $registro = $datos->fetch_assoc();
	    	$medidorTipoServicio = self::_crearMedidorTipoServicio($registro);
			return $medidorTipoServicio;

	    }
    public static function obtenerPoridMedidorB($idMedidor){
        $sql = "select * from medidor_tipo_servicio WHERE id_medidor = ". $idMedidor;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
        	return false;
        }

        $registro = $datos->fetch_assoc();
    	$medidorTipoServicio= self::_crearMedidorTipoServicio($registro);
		return $medidorTipoServicio;

    }
    	public static function obtenerPorIdMedidor($idMedidor) {
	    	$sql = "SELECT medidor.id_medidor,medidor.numero,medidor.id_cliente, "
				. "medidor_tipo_servicio.id_medidor_tipo_servicio,"
				. "medidor_tipo_servicio.id_servicio, medidor_tipo_servicio.id_medidor, "
				. "tipo_servicio.descripcion,tipo_servicio.cargo_fijo,tipo_servicio.cargo_variable  FROM medidor_tipo_servicio "
				. "JOIN medidor ON medidor.id_medidor = medidor_tipo_servicio.id_medidor "
				. "JOIN tipo_servicio ON medidor_tipo_servicio.id_servicio = tipo_servicio.id_servicio"
				. " WHERE medidor_tipo_servicio.id_medidor= ". $idMedidor;
			//echo $sql;
			//exit;
			
			$database = new MySQL();
    		$datos = $database->consultar($sql);

    		$listadoMedidoresTiposServicios = [];

	    	while ($registro = $datos->fetch_assoc()) {
		    	$medidorTipoServicio = new MedidorTipoServicio();
				$medidorTipoServicio->_idMedidorTipoServicio = $registro["id_medidor_tipo_servicio"];
				$medidorTipoServicio->_idServicio = $registro["id_servicio"];
				$medidorTipoServicio->_idMedidor = $registro["id_medidor"];
				$medidorTipoServicio->_descripcion = $registro["descripcion"];
				$medidorTipoServicio->_cargoFijo = $registro["cargo_fijo"];
				$medidorTipoServicio->_cargoVariable = $registro["cargo_variable"];



    			$listadoMedidoresTiposServicios[] = $medidorTipoServicio;
  		  	}
			return $listadoMedidoresTiposServicios;
			}

	    public function eliminar() {
	    	$database = new MySQL();

	    	$sql = "DELETE FROM medidor_tipo_servicio WHERE id_medidor={$this->_idMedidor}";
	    	echo $sql;
	        $database->eliminar($sql);

	    }
		private static function _crearMedidorTipoServicio($datos) {
	    	$medidorTipoServicio = new MedidorTipoServicio();
			$medidorTipoServicio->_idMedidorTipoServicio = $datos["id_medidor_tipo_servicio"];
			$medidorTipoServicio->_idServicio = $datos["id_servicio"];
			$medidorTipoServicio->_idMedidor = $datos["id_medidor"];

			return $medidorTipoServicio;
	    }

}

?>