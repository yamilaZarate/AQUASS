<?php

require_once "MySQL.php";

Class Contacto {
	private $_idPersonaContacto;
	private $_idPersona;
	private $_idContacto;
	private $_valor;
	private $_descripcion;


	public function getIdPersonaContacto() {
		return $this->_idPersonaContacto;
	}
	public function setIdPersonaContacto($_idPersonaContacto) {
		$this->_idPersonaContacto = $_idPersonaContacto;
	}
	public function getIdPersona() {
		return $this->_idPersona;
	}
	public function setIdPersona($_idPersona) {
		$this->_idPersona = $_idPersona;
	}
	public function getIdContacto() {
		return $this->_idContacto;
	}
	public function setIdContacto($_idContacto) {
		$this->_idContacto = $_idContacto;
	}
	public function getValor() {
		return $this->_valor;
	}
	public function setValor($_valor) {
		$this->_valor = $_valor;
	}
	public function getDescripcion() {
		return $this->_descripcion;
	}
	public function setDescripcion($_descripcion) {
		$this->_descripcion = $_descripcion;
	}

	public static function obtenerPorIdPersona($idPersona){
		$sql = "SELECT persona_contacto.id_persona_contacto, "
			 . "persona_contacto.id_persona, "
             . "persona_contacto.id_contacto, persona_contacto.valor, "
       		 . "tipo_contacto.descripcion "
			 . "FROM persona_contacto "
             . "INNER JOIN tipo_contacto ON tipo_contacto.id_contacto = persona_contacto.id_contacto "
             . "INNER JOIN persona ON persona.id_persona = persona_contacto.id_persona "
             . "WHERE persona.id_persona = {$idPersona}";
        //echo $sql; 
        //exit;    
        
	    $database = new MySQL();
        $datos = $database->consultar($sql);

    	$listadoContactos = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$contacto = new Contacto();
			$contacto->_idPersonaContacto = $registro["id_persona_contacto"];
			$contacto->_valor = $registro["valor"];
			$contacto->_idPersona = $registro["id_persona"];
			$contacto->_idContacto = $registro["id_contacto"];
			$contacto->_descripcion = $registro["descripcion"];
    		$listadoContactos[] = $contacto;
    	}
    	return $listadoContactos;
		}
	public function guardar() {
		$sql = "INSERT INTO persona_contacto "
		     . "(id_persona_contacto,valor,id_contacto,id_persona) "
		     . "VALUES (NULL,'{$this->_valor}', '{$this->_idContacto}', '{$this->_idPersona}')";
		//echo $sql;
		//exit;
        $database = new MySQL();
        $idInsertado = $database->insertar($sql);

        $this->_idPersonaContacto = $idInsertado;
	}
	public static function obtenerPorId($idPersonaContacto) {
	
		$sql= " SELECT * FROM persona_contacto WHERE id_persona_contacto = {$idPersonaContacto}";

	    $database = new MySQL();
	    $datos = $database->consultar($sql);


	    $registro = $datos->fetch_assoc();

	    $contacto = new Contacto();
		$contacto->_idPersonaContacto = $registro["id_persona_contacto"];
		$contacto->_idPersona = $registro["id_persona"];
		$contacto->_idContacto = $registro["id_contacto"];
		$contacto->_valor = $registro["valor"];
		$contacto->_descripcion = $registro["descripcion"];
		
		return $contacto;	
	}

	public function eliminar($idPersonaContacto) {

		$sql = "DELETE FROM persona_contacto WHERE id_persona_contacto = " . $idPersonaContacto;

        $database = new MySQL();
        $database->eliminar($sql);
	}
	

}
	
?>