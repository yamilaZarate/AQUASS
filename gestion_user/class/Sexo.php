<?php

require_once "MySQL.php";


class Sexo {

	private $_idSexo; 
	private $_descripcion;
    private $_idPersona;


    public function getIdSexo()
    {
        return $this->_idSexo;
    }


    public function getDescripcion()
    {
        return $this->_descripcion;
    }
     public function getIdPersona()
    {
        return $this->_idPersona;
    }


    public function setIdPersona($_idPersona)
    {
        $this->_idPersona = $_idPersona;

        return $this;
    }

	public static function obtenerTodos() {

    	$sql = "SELECT * FROM sexo";

    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoSexo = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$sexo = new Sexo();
			$sexo->_idSexo = $registro["id_sexo"];
			$sexo->_descripcion = $registro["descripcion"];
            //$sexo->_idPersona = $registro["id_persona"];
    		$listadoSexo[] = $sexo;
    	}


    	return $listadoSexo;

	}
}


