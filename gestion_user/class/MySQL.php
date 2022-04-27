<?php


class MySQL {

	private $_conexion;

	public function __construct() {
		$this->_conexion = new mysqli("localhost", "root", "", "gestion_usuarios");
	}

	public function consultar($sql) {
		$datos = $this->_conexion->query($sql);
		return $datos;
	}

	public function insertar($sql) {
		$datos = $this->_conexion->query($sql);
		return $this->_conexion->insert_id;
	}
    
    public function actualizar ($sql){
    	$this->_conexion->query($sql);
    }

    public function eliminar($sql) {
		$this->_conexion->query($sql);
	}

}



//$database = new MySQL();
//$sql = "INSERT INTO `empleado` (`id_empleado`, `numero_legajo`,`id_persona`) VALUES (NULL, '1234', NULL);";

//$database= new MySQL();
//$sql= "INSERT INTO `cliente` (`id_cliente`, `fecha_de_alta`, `id_persona`) VALUES (NULL, '2016-10-10', '7')";
//$database->insertar($sql);

//$database= new MySQL();
//$sql = "INSERT INTO categoria (`id_categoria`, `descripcion`) VALUES (NULL, '')";
//$database->insertar($sql);

//$database = new MySQL();
///$sql= "INSERT INTO `tipo_servicio` (`id_servicio`, `descripcion`, `valor_metro_cubico`)VALUES (NULL,'','')";
//$database->insertar($sql);
?>