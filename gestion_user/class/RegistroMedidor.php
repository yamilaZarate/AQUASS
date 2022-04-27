<?php

require_once "MySQL.php";
require_once "Medidor.php";
require_once "Empleado.php";

class RegistroMedidor {

	protected $_idRegistroMedidor;
	protected $_fecha;
	protected $_lecturaActual;
	protected $_consumo;
	protected $_idMedidor;
	protected $_idEmpleado;

	public $empleado;
	public $medidor;

	public function getIdRegistroMedidor() {
		return $this->_idRegistroMedidor;

	}
	public function setIdRegistroMedidor($idRegistroMedidor) {
		$this->_idRegistroMedidor = $_idRegistroMedidor;
	}
	public function getFecha() {
		return $this->_fecha;
	}
	public function setFecha($_fecha) {
		$this->_fecha = $_fecha;
	}
	public function getLecturaActual() {
		return $this->_lecturaActual;
	}
	public function setLecturaActual($lecturaActual) {
		$this->_lecturaActual = $lecturaActual;
	}
	public function getConsumo() {
		return $this->_consumo;
	}
	public function setConsumo($consumo) {
		$this->_consumo = $consumo;
	}

	public function getIdMedidor() {
		return $this->_idMedidor;
	}
	public function setIdMedidor($_idMedidor) {
		$this->_idMedidor = $_idMedidor;
	}

	public function getIdEmpleado() {
		return $this->_idEmpleado;
	}
	public function setIdEmpleado($_idEmpleado) {
		$this->_idEmpleado = $_idEmpleado;
	}

	public function guardar() {
		$database = new MySQL();

		$sql = "INSERT INTO registro_medidor "
		     . "(`id_registro_medidor`, `fecha`,`lectura_actual`,`consumo`,`id_medidor`,`id_empleado`) "
		     . "VALUES (NULL, '{$this->_fecha}','{$this->_lecturaActual}','{$this->_consumo}', '{$this->_idMedidor}', '{$this->_idEmpleado}')";
		//echo $sql;
		//exit;

		$database->insertar($sql);

	}

	public function actualizar() {

    		$database = new MySQL();

    		$sql = "UPDATE registro_medidor SET fecha = '{$this->_fecha}', "
    			 . "lectura_actual= '{$this->_lecturaActual}', consumo='{$this->_consumo}'"
                 . "WHERE registro_medidor.id_registro_medidor = {$this->_idRegistroMedidor}";
       
        
            $database->actualizar($sql);
	}
	public static function obtenerPorFecha($desde, $hasta){
		$sql= "SELECT * FROM registro_medidor where fecha BETWEEN '$desde' AND '$hasta'";
		//echo $sql;
		//exit;

		$database= new MySQL();
		$datos = $database->consultar($sql);

		$listadoRegistroMedidores= [];

		while ($registro = $datos->fetch_assoc()) {
			$registroMedidor = self::_crearRegistroMedidor($registro);
			$listadoRegistroMedidores[] = $registroMedidor;

		}
		return $listadoRegistroMedidores;		
	}
	public static function obtenerTodos() {
    	$sql = "SELECT * FROM registro_medidor ";

    	/*$where = "";

    	if ($fechaDesde!="" and $fechaHasta!="") {

    		if ($where != "") {

    			$where .= "where CAST(fecha AS DATE) >= '{$fechaDesde}' and CAST(fecha AS DATE) <= '{$fechaHasta}'";
    		}
    	}

    	$sql = $sql . " " . $where;*/

        
    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoRegistroMedidores = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$registroMedidor = new RegistroMedidor();
			$registroMedidor->_idRegistroMedidor = $registro["id_registro_medidor"];
			$registroMedidor->_fecha = $registro["fecha"];
			$registroMedidor->_lecturaActual = $registro["lectura_actual"];
			$registroMedidor->_consumo = $registro["consumo"];
			$registroMedidor->_idMedidor = $registro["id_medidor"];
            $registroMedidor->medidor = Medidor::obtenerPorId($registroMedidor->_idMedidor);
            $registroMedidor->_idEmpleado = $registro["id_empleado"];
            $registroMedidor->empleado = Empleado::obtenerPorId($registroMedidor->_idEmpleado);

    		$listadoRegistroMedidores[] = $registroMedidor;
    	}

    	return $listadoRegistroMedidores;

	}

    public static function obtenerPorId($id) {
    	$sql = "SELECT registro_medidor.id_registro_medidor,registro_medidor.fecha, " 
    		  . " registro_medidor.lectura_actual,registro_medidor.consumo,"
    		  . "registro_medidor.id_medidor, registro_medidor.id_empleado "
    	      . " FROM registro_medidor "
    	      . "WHERE id_registro_medidor=". $id;
    	//echo $sql;
    	//exit;
    	$database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe la categoria
       if ($datos->num_rows == 0) {
       return false;
        }

        $registro = $datos->fetch_assoc();
    	$registroMedidor = self::_crearRegistroMedidor($registro);
		return $registroMedidor;

    }
    
    public static function obtenerPorIdMedidor($idMedidor) {
        $sql = "SELECT medidor.id_medidor,medidor.numero,medidor.id_cliente, "
             . "medidor.id_categoria,registro_medidor.id_registro_medidor, registro_medidor.fecha, "
             . "registro_medidor.lectura_actual,registro_medidor.consumo,registro_medidor.id_empleado "
             . "FROM registro_medidor "
             . "JOIN medidor ON medidor.id_medidor = registro_medidor.id_medidor "
             . "WHERE registro_medidor.id_medidor=" . $idMedidor;

        //echo $sql;
        //exit;
        $database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe
        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $registroMedidor = self::_crearRegistroMedidor($registro);
        return $registroMedidor;

    }
    public function eliminar() {

    	$sql = "DELETE FROM registro_medidor WHERE id_registro_medidor={$this->_idRegistroMedidor}";
    	
    	$database = new MySQL();
        $database->eliminar($sql);
    }

    private static function _crearRegistroMedidor($datos) {
    	$registroMedidor = new RegistroMedidor();
		$registroMedidor->_idRegistroMedidor = $datos["id_registro_medidor"];
		$registroMedidor->_fecha = $datos["fecha"];
		$registroMedidor->_lecturaActual = $datos["lectura_actual"];
		$registroMedidor->_consumo = $datos["consumo"];
		$registroMedidor->_idMedidor = $datos["id_medidor"];
        $registroMedidor->medidor = Medidor::obtenerPorId($registroMedidor->_idMedidor);
        $registroMedidor->_idEmpleado = $datos["id_empleado"];
        $registroMedidor->empleado = Empleado::obtenerPorId($registroMedidor->_idEmpleado);
		return $registroMedidor;
    }


}

?>