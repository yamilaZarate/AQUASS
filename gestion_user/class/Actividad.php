<?php

require_once "MySQL.php";


class Actividad {

	private $_idActividad;
	private $_descripcion;

	public function getIdActividad() {
		return $this->_idActividad;
	}

	public function getDescripcion() {
		return $this->_descripcion;
	}

	public function setDescripcion($descripcion) {
		$this->_descripcion = $descripcion;
	}


	public function guardar() {
		$database = new MySQL();

		$sql = "INSERT INTO actividad "
		     . "(`id_actividad`, `descripcion`) "
		     . "VALUES (NULL, '{$this->_descripcion}')";

		$database->insertar($sql);
	}

	public function actualizar() {

		$database = new MySQL();

		$sql = "UPDATE actividad SET descripcion = '{$this->_descripcion}'"
             . " WHERE actividad.id_actividad = '{$this->_idActividad}'";
      

        $database->actualizar($sql);

	}
	public static function obtenerTodos() {
    	$sql = "SELECT * FROM actividad ";
        
    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoActividades = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$actividad = new Actividad();
			$actividad->_idActividad = $registro["id_actividad"];
			$actividad->_descripcion = $registro["descripcion"];
    		$listadoActividades[] = $actividad;
    	}

    	return $listadoActividades;
	}

    public static function obtenerPorId($id) {
    	$sql = "SELECT actividad.id_actividad, actividad.descripcion"
    	      . " FROM actividad "
    	      . "WHERE id_actividad=". $id;
    	
    	$database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe la categoria
       if ($datos->num_rows == 0) {
       return false;
        }

        $registro = $datos->fetch_assoc();
    	$actividad = self::_crearActividad($registro);
		return $actividad;

    }

    public function eliminar() {

    	$sql = "DELETE FROM actividad WHERE id_actividad={$this->_idActividad}";
    	
    	$database = new MySQL();
        $database->eliminar($sql);
    }

    private static function _crearActividad($datos) {
    	$actividad = new Actividad();
		$actividad->_idActividad = $datos["id_actividad"];
		$actividad->_descripcion = $datos["descripcion"];
		return $actividad;
    }


}

?>