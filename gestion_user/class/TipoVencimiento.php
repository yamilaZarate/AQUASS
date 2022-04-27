<?php

/*require_once "MySQL.php";

class TipoVencimiento {

	protected $_idTipoVencimiento;
	protected $_descripcion;
	protected $_porcentaje;


	public $descripcion; 

	public function getIdTipoVencimiento() {
		return $this->_idTipoVencimiento;
	}
	public function setIdTipoVencimiento($_idTipoVencimiento) {
		$this->_idTipoVencimiento = $_idTipoVencimiento;
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

        $sql= "INSERT INTO `tipo_vencimiento` (`id_tipo_vencimiento`, `descripcion`, `porcentaje`)"
        		."VALUES (NULL,'{$this->_descripcion}','{$this->_porcentaje}')";
        		
		$database->insertar($sql);
       
	}
	public function actualizar() {

    		$database = new MySQL();

    		$sql = "UPDATE tipo_vencimiento SET descripcion = '{$this->_descripcion}', "
    			 . "porcentaje = '{$this->_porcentaje}'"
                 . "WHERE tipo_vencimiento.id_tipo_vencimiento = {$this->_idTipoVencimiento}";
        
            $database->actualizar($sql);
	}

	public static function obtenerTodos() {
    	$sql = "SELECT * FROM tipo_vencimiento ";
       

    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoTipoVencimiento = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$tipoVencimiento = new TipoVencimiento();
			$tipoVencimiento->_idTipoVencimiento = $registro["id_tipo_vencimiento"];
			$tipoVencimiento->_descripcion = $registro["descripcion"];
			$tipoVencimiento->_porcentaje = $registro["porcentaje"];
			
    		$listadoTipoVencimiento[] = $tipoVencimiento;
    	}

    	return $listadoTipoVencimiento;
		
		}

	public static function obtenerPorId($idTipoVencimiento) {
    	$sql = "SELECT tipo_vencimiento.id_tipo_vencimiento,tipo_vencimiento.descripcion, "
    		  . "tipo_vencimiento.porcentaje " 
              . " FROM tipo_vencimiento "
              . "WHERE id_tipo_vencimiento =". $idTipoVencimiento;
		      
        $database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe el cliente
        if ($datos->num_rows == 0) {
        	return false;
        }

        $registro = $datos->fetch_assoc();
    	$tipoVencimiento = self::_crearTipoVencimiento($registro);
		return $tipoVencimiento;

    }
    public function eliminar() {

    	$sql = "DELETE FROM tipo_vencimiento WHERE id_tipo_vencimiento ={$this->_idTipoVencimiento}";
    	
    	$database = new MySQL();
        $database->eliminar($sql);

    }
    private static function _crearTipoVencimiento($datos) {
    	$tipoVencimiento = new TipoVencimiento();
		$tipoVencimiento->_idTipoVencimiento = $datos["id_tipo_vencimiento"];
		$tipoVencimiento->_descripcion = $datos["descripcion"];
		$tipoVencimiento->_porcentaje = $datos["porcentaje"];
		
		return $tipoVencimiento;
    }


}


?>