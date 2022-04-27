<?php

require_once "MySQL.php";
class Modulo {

	private $_idModulo;
	private $_descripcion;
	private $_directorio;

	public function getIdModulo(){
		return $this->_idModulo;
	}
	public function setIdModulo($_idModulo){
        $this->_idModulo = $_idModulo;
    }
    public function getDescripcion(){
        return $this->_descripcion;
    }
	public function setDescripcion($_descripcion){
        $this->_descripcion = $_descripcion;
    }
    public function getDirectorio(){
        return $this->_directorio;
    }
	public function setDirectorio($_directorio){
        $this->_directorio = $_directorio;
    }
	public function guardar() {
		$database = new MySQL();
		
		$sql = "INSERT INTO `modulo` (`id_modulo`, `descripcion`, `directorio`) "
			 . "VALUES (NULL, '{$this->_descripcion}', '{$this->_directorio}')";

		$database->insertar($sql);
	}

	public function actualizar() {

		$database = new MySQL();

        $sql = " UPDATE modulo SET descripcion = '{$this->_descripcion}', "
        	 ." directorio = '{$this->_directorio}' "
        	 . " WHERE `id_modulo` = {$this->_idModulo}";
        
        $database->actualizar($sql);

	}
	public static function obtenerTodos() {
    	$sql = "SELECT * FROM modulo ";

    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoModulos = [];    	

    	while ($registro = $datos->fetch_assoc()) {
	    	$modulo = new Modulo();
			$modulo->_idModulo = $registro["id_modulo"];
			$modulo->_descripcion = $registro["descripcion"];
			$modulo->_directorio = $registro["directorio"];
    		$listadoModulos[] = $modulo;
    	}

    	return $listadoModulos;
	}
	public static function obtenerPorIdPerfil($idPerfil) {

		$sql=  "SELECT modulo.id_modulo,modulo.descripcion,modulo.directorio "
			 . " FROM modulo "
			 . "JOIN perfil_modulo ON perfil_modulo.id_modulo= modulo.id_modulo "
			 . "JOIN perfil ON perfil.id_perfil = perfil_modulo.id_perfil "
			 . "WHERE perfil_modulo.id_perfil = {$idPerfil}";
		
		$databse = new MySQL();
		$datos = $databse->consultar($sql);

		$listadoModulos = [];

		while ($registro = $datos->fetch_assoc()) {
			$modulo = new Modulo();
			$modulo->_idModulo = $registro["id_modulo"];
			$modulo->_descripcion = $registro["descripcion"];
			$modulo->_directorio = $registro["directorio"];
			$listadoModulos[] = $modulo;
    	}

    	return $listadoModulos;

	}
	public static function obtenerPorId($id) {
    	$sql = "SELECT modulo.id_modulo,modulo.descripcion,modulo.directorio"
    	      . " FROM modulo "
    	      . "WHERE id_modulo=". $id;
    	//$sql = "SELECT * FROM modulo WHERE id_modulo= {$id}";
    	
    	$database = new MySQL();
        $datos = $database->consultar($sql);

        //TODO: ver que pasa cuando no existe la categoria
		if ($datos->num_rows == 0) {
		return false;
		}

		$registro = $datos->fetch_assoc();
        $modulo = self::_crearModulo($registro);
		return $modulo;
		$modulo= new Modulo();
		$modulo->_idModulo= $registro["id_modulo"];
		$modulo->_descripcion = $datos["descripcion"];
		$modulo->_directorio = $datos["directorio"];

		return $modulo;

	}
    public function eliminar() {

    	$sql = "DELETE FROM modulo WHERE id_modulo={$this->_idModulo}";
    	
    	$database = new MySQL();
        $database->eliminar($sql);
    }

    private static function _crearModulo($datos) {
    	$modulo = new Modulo();
		$modulo->_idModulo = $datos["id_modulo"];
		$modulo->_descripcion = $datos["descripcion"];
		$modulo->_directorio = $datos["directorio"];

		return $modulo;
    }

}
?>