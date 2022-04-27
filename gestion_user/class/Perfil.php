<?php
require_once "Modulo.php";
require_once "MySQL.php";

class Perfil {

	private $_idPerfil;
	private $_descripcion;
	private $_listadoModulos;

	public function getIdPerfil(){
		return $this->_idPerfil;
	}
	public function setIdPerfil($idPerfil){
		$this->_idPerfil = $idPerfil;
	}
	public function getDescripcion(){
		return $this->_descripcion;
	}
	public function setDescripcion($descripcion) {
		$this->_descripcion = $descripcion;
	}

	public function getModulos(){
		return $this->_listadoModulos;
	}
	public function guardar() {
		$database = new MySQL();

		$sql = "INSERT INTO `perfil` "
		     . "(`id_perfil`, `descripcion`) "
		     . "VALUES (NULL, '{$this->_descripcion}')";
		//echo $sql;
		//exit;

		$idPerfil = $database->insertar($sql);

        $this->_idPerfil = $idPerfil;
		
	}

	public function actualizar() {

		$database = new MySQL();

		$sql = "UPDATE perfil SET descripcion = '{$this->_descripcion}'"
             . " WHERE perfil.id_perfil = '{$this->_idPerfil}'";
      

        $database->actualizar($sql);

	}
	public static function obtenerTodos() {
    	$sql = "SELECT * FROM perfil ";
        
    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoPerfiles = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$perfil = new Perfil();
			$perfil->_idPerfil = $registro["id_perfil"];
			$perfil->_descripcion = $registro["descripcion"];
    		$listadoPerfiles[] = $perfil;
    	}

    	return $listadoPerfiles;
	}

	public static function obtenerPorIdPerfil($idPerfil){
		$sql = "SELECT * FROM perfil WHERE id_perfil={$idPerfil}";

		$database = new MySQL();
		$datos = $database->consultar($sql);

		if ($datos->num_rows == 0) {
        return false;
        }

		$registro = $datos->fetch_assoc();

		$perfil = new Perfil();
		$perfil->_idPerfil = $registro["id_perfil"];
		$perfil->_descripcion = $registro["descripcion"];
		$perfil->_listadoModulos = Modulo::obtenerPorIdPerfil($perfil->_idPerfil);

		return $perfil;

	}
	public static function obtenerPorId($id) {

		$sql = "SELECT * FROM perfil WHERE id_perfil=" . $id;

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$registro = $datos->fetch_assoc();

		$perfil = new Perfil();
		$perfil->_idPerfil = $registro["id_perfil"];
		$perfil->_descripcion = $registro["descripcion"];
		$perfil->_listadoModulos = Modulo::obtenerPorIdPerfil($perfil->_idPerfil);

		return $perfil;
	}

    public function eliminar() {

    	$sql = "DELETE FROM perfil WHERE id_perfil={$this->_idPerfil}";
    	
    	$database = new MySQL();
        $database->eliminar($sql);
    }

    private static function _crearPerfil($datos) {
    	$perfil = new Perfil();
		$perfil->_idPerfil = $datos["id_perfil"];
		$perfil->_descripcion = $datos["descripcion"];
		return $perfil;
    }



}


?>