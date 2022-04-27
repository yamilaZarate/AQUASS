<?php

require_once "MySQL.php";
require_once "Persona.php";

class Empleado extends Persona {

	private $_idEmpleado;
	private $_numeroLegajo;

	public function getIdEmpleado() {
		return $this->_idEmpleado;
	}

	public function getNumeroLegajo() {
		return $this->_numeroLegajo;
	}

	public function setNumeroLegajo($numeroLegajo) {
		$this->_numeroLegajo = $numeroLegajo;
	}


	public function guardar() {
		parent::guardar();

		$database = new MySQL();

		//guardar empleado
		$sql= "INSERT INTO empleado"
			. "(`id_empleado`,`numero_legajo`,`id_persona`)"
			. "VALUES (NULL,'{$this->_numeroLegajo}','{$this->_idPersona}')";

		$database->insertar($sql);

	}
	public function actualizar() {
		parent::actualizar();

		$database = new MySQL();

		$sql = "UPDATE empleado SET numero_legajo = '{$this->_numeroLegajo}'"
             . "WHERE empleado.id_empleado = {$this->_idEmpleado}";


        $database->actualizar($sql);

	}
    public function obtenerNumeroLegajo(){
        $database = new MySQL();

        $sql= "SELECT MAX(empleado.numero_legajo)+1 AS numero_legajo FROM empleado";
        $datos = $database->consultar($sql);

        $numeroLegajo = 0;
        while ($registro = $datos->fetch_assoc()){
            $empleado = new Empleado();
            $numeroLegajo = $empleado->_numeroLegajo = $registro["numero_legajo"] + 1;
        }

        return $numeroLegajo;

    }

	public static function obtenerTodos($filtroEstado = 0, $filtroApellido = "") {
    	$sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, "
             . "persona.fecha_nacimiento,persona.dni,persona.estado,empleado.id_empleado, empleado.numero_legajo "
             . "FROM empleado "
             . "JOIN persona ON persona.id_persona = empleado.id_persona";

        $where = "";

        if ($filtroEstado != 0) {
        	// $sql = $sql . " WHERE personas.estado = " . $filtroEstado;
        	$where = "WHERE persona.estado = " . $filtroEstado;
        }

        if ($filtroApellido != "") {

        	if ($where != "") {

        		$where .= " AND persona.apellido = '{$filtroApellido}'";

        	} else {

        		$where = "WHERE persona.apellido like '%{$filtroApellido}%'";

        	}
        }

        $sql = $sql . " " . $where;

    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoEmpleados = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$empleado = new Empleado();
			$empleado->_idEmpleado = $registro["id_empleado"];
			$empleado->_idPersona = $registro["id_persona"];
			$empleado->_numeroLegajo = $registro["numero_legajo"];
			$empleado->_nombre = $registro["nombre"];
			$empleado->_apellido = $registro["apellido"];
            $empleado->_dni = $registro["dni"];
			$empleado->_fechaNacimiento = $registro["fecha_nacimiento"];
            $empleado->_estado = $registro["estado"];

    		$listadoEmpleados[] = $empleado;
    	}


    	return $listadoEmpleados;

        }

    public static function obtenerPorId($id) {
    	$sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, "
             . "persona.fecha_nacimiento,persona.dni,persona.estado,persona.id_sexo, empleado.id_empleado, "
             . "empleado.numero_legajo "
             . "FROM empleado "
             . "JOIN persona ON persona.id_persona = empleado.id_persona "
             . "WHERE id_empleado=" . $id;


        $database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe el empleado
        if ($datos->num_rows == 0) {
        	return false;
        }

        $registro = $datos->fetch_assoc();
    	$empleado = self::_crearEmpleado($registro);
		return $empleado;

    }
    
    public static function obtenerPorIdPersona($idPersona) {
        $sql = "SELECT persona.id_persona,persona.nombre,persona.apellido, "
             . "persona.fecha_nacimiento,persona.id_sexo,persona.dni,persona.estado,empleado.id_empleado, "
             . "empleado.numero_legajo "
             . "FROM empleado "
             . "JOIN persona ON persona.id_persona = empleado.id_persona "
             . "WHERE empleado.id_persona=" . $idPersona;
        //echo($sql);
        //exit;
        $database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe el empleado
        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $empleado = self::_crearEmpleado($registro);
        return $empleado;

    }
   	public function eliminar() {

        $sql= "UPDATE persona SET estado = '2' WHERE id_persona={$this->_idPersona}";
    	
    	$database = new MySQL();
        $database->eliminar($sql);

        parent::eliminar();

    }

    private static function _crearEmpleado($datos) {
    	$empleado = new Empleado();
		$empleado->_idEmpleado = $datos["id_empleado"];
		$empleado->_idPersona = $datos["id_persona"];
		$empleado->_nombre = $datos["nombre"];
		$empleado->_apellido = $datos["apellido"];
		$empleado->_idSexo = $datos["id_sexo"];
		$empleado->_fechaNacimiento = $datos["fecha_nacimiento"];
        $empleado->_dni = $datos["dni"];
        $empleado->_estado = $datos["estado"];
		$empleado->_numeroLegajo = $datos["numero_legajo"];

		return $empleado;
    }



}

?>