<?php

require_once "MySQL.php";

class TipoContacto {

	private $_idContacto;
	private $_descripcion;

	public function getIdContacto() {
		return $this->_idContacto;
	}
	public function setIdContacto($_idContacto) {
		$this->_idContacto = $_idContacto;
	}

	public function getDescripcion() {
		return $this->_descripcion;
	}
	public function setDescripcion($_descripcion) {
		$this->_descripcion = $_descripcion;
	}

	public function guardar(){

		$database= new MySQL();

        $sql= "INSERT INTO `tipo_contacto` (`id_contacto`, `descripcion`)"
        		."VALUES (NULL,'{$this->_descripcion}')";

		$database->insertar($sql);
       
	}
	public function actualizar() {

    	$database = new MySQL();

    	$sql = "UPDATE tipo_contacto SET descripcion = '{$this->_descripcion}' "
             . "WHERE tipo_contacto.id_contacto = {$this->_idContacto}";
        
        $database->actualizar($sql);
	}
	public static function obtenerTodos(){
		$sql = "SELECT * FROM tipo_contacto";
		$database = new MySQL();
		$datos = $database->consultar($sql);

    	$listadoTipoContacto = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$tipoContacto = new TipoContacto();
			$tipoContacto->_idContacto = $registro["id_contacto"];
			$tipoContacto->_descripcion = $registro["descripcion"];
    		$listadoTipoContacto[] = $tipoContacto;
    	}
    	return $listadoTipoContacto;

	}
	
	public static function obtenerPorId($id) {
    	$sql = "SELECT tipo_contacto.id_contacto,tipo_contacto.descripcion "
              . " FROM tipo_contacto "
              . "WHERE id_contacto =". $id;
        //echo $sql;
        //exit;
		       
        $database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe el cliente
        if ($datos->num_rows == 0) {
        	return false;
        }

        $registro = $datos->fetch_assoc();
    	$tipoContacto = self::_crearTipoContacto($registro);
		return $tipoContacto;

    }
    public function eliminar() {

    	$sql = "DELETE FROM tipo_contacto WHERE id_contacto ={$this->_idContacto}";
    	
    	$database = new MySQL();
        $database->eliminar($sql);

    }
    private static function _crearTipoContacto($datos) {
    	$tipoContacto = new TipoContacto();
		$tipoContacto->_idContacto = $datos["id_contacto"];
		$tipoContacto->_descripcion = $datos["descripcion"];

		return $tipoContacto;
    }
}

?>