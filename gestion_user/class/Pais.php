<?php

require_once "MySQL.php";


class Pais {

	private $_idPais;
	private $_descripcion;

	public function getIdPais() {
		return $this->_idPais;
	}

	public function getDescripcion() {
		return $this->_descripcion;
	}

	public function setDescripcion($descripcion) {
		$this->_descripcion = $descripcion;
	}


	public function guardar() {
		$database = new MySQL();

		$sql = "INSERT INTO pais "
		     . "(`id_pais`, `descripcion`) "
		     . "VALUES (NULL, '{$this->_descripcion}')";

		$database->insertar($sql);
	}

	public function actualizar() {

		$database = new MySQL();

		$sql = "UPDATE pais SET descripcion = '{$this->_descripcion}'"
             . " WHERE pais.id_pais = '{$this->_idPais}'";
      

        $database->actualizar($sql);

	}
	public static function obtenerTodos() {
    	$sql = "SELECT * FROM pais ";
        
    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoProvincias = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$pais = new Pais();
			$pais->_idPais = $registro["id_pais"];
			$pais->_descripcion = $registro["descripcion"];
    		$listadoPaises[] = $pais;
    	}

    	return $listadoPaises;
	}

    public static function obtenerPorId($id) {
    	$sql = "SELECT pais.id_pais,pais.descripcion"
    	      . " FROM pais "
    	      . "WHERE id_pais =". $id;
    	
    	$database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe
       if ($datos->num_rows == 0) {
       return false;
        }

        $registro = $datos->fetch_assoc();
    	$pais = self::_crearPais($registro);
		return $pais;

    }

    public function eliminar() {

    	$sql = "DELETE FROM pais WHERE id_pais ={$this->_idPais}";
        //echo $sql;
        //exit;
    	
    	$database = new MySQL();
        $database->eliminar($sql);
    }

    private static function _crearPais($datos) {
    	$pais = new Pais();
		$pais->_idPais = $datos["id_pais"];
		$pais->_descripcion = $datos["descripcion"];
		return $pais;
    }


}

?>