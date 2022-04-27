<?php
require_once "MySQL.php";
require_once "Persona.php";
require_once "Factura.php";

class Cliente extends Persona {

	protected $_idCliente;
    protected $_idPersona;

    public $factura;

	public function getIdCliente() {
		return $this->_idCliente;
	}

	public function guardar(){
		parent::guardar();
		$database= new MySQL();

        //guardar el cliente
        $sql= "INSERT INTO cliente (`id_cliente`,`id_persona`)"
        		."VALUES (NULL,{$this->_idPersona})";

        //echo $sql;
        //exit;
        $idCliente = $database->insertar($sql);

        $this->_idCliente = $idCliente;
	}
	public function actualizar() {
    		parent::actualizar();

    		$database = new MySQL();

    		$sql = "UPDATE cliente SET fecha_de_alta = '{$this->_fechaDeAlta}'"
                 . "WHERE cliente.id_cliente = {$this->_idCliente}";

            $database->actualizar($sql);
	}

	public static function obtenerTodos($filtroEstado = 0, $filtroApellido = "") {
    	$sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, "
             . "persona.fecha_nacimiento,persona.dni,persona.estado,cliente.id_cliente "
             . "FROM cliente "
             . "JOIN persona ON persona.id_persona = cliente.id_persona";
       // echo $sql;
        //exit;

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

    	$listadoClientes = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$cliente = new Cliente();
			$cliente->_idCliente = $registro["id_cliente"];
			$cliente->_idPersona = $registro["id_persona"];
			$cliente->_nombre = $registro["nombre"];
			$cliente->_apellido = $registro["apellido"];
            $cliente->_dni = $registro["dni"];
            $cliente->_estado = $registro["estado"];
			$cliente->_fechaNacimiento = $registro["fecha_nacimiento"];
    		$listadoClientes[] = $cliente;
    	}

    	return $listadoClientes;
		
		}

	public static function obtenerPorId($id) {
    	$sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, "
             . "persona.fecha_nacimiento,persona.dni,persona.estado,persona.id_sexo, cliente.id_cliente "
             . "FROM persona "
             . "JOIN cliente ON persona.id_persona = cliente.id_persona "
             . "WHERE id_cliente= ". $id;
        //echo $sql;
        //exit;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe el cliente
        if ($datos->num_rows == 0) {
        	return false;
        }

        $registro = $datos->fetch_assoc();
    	$cliente = self::_crearCliente($registro);
		return $cliente;

    }
    
    public static function obtenerPorIdPersona($idPersona) {
        $sql = "SELECT persona.id_persona,persona.nombre,persona.apellido, "
             . "persona.fecha_nacimiento,persona.id_sexo,persona.dni,persona.estado,cliente.id_cliente "
             . "FROM cliente "
             . "JOIN persona ON persona.id_persona = cliente.id_persona "
             . "WHERE cliente.id_persona=" . $idPersona;
        //echo $sql;
        //exit;
        $database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe
        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $cliente = self::_crearCliente($registro);
        return $cliente;

    }
    
    public function eliminar() {

    	//$sql = "DELETE FROM cliente WHERE id_cliente={$this->_idCliente}";
        $sql= "UPDATE persona SET estado = '2' WHERE id_persona={$this->_idPersona}";
    	
    	$database = new MySQL();
        $database->eliminar($sql);

        parent::eliminar();

    }
    private static function _crearCliente($datos) {
    	$cliente = new Cliente();
		$cliente->_idCliente = $datos["id_cliente"];
		$cliente->_idPersona = $datos["id_persona"];
		$cliente->_nombre = $datos["nombre"];
		$cliente->_apellido = $datos["apellido"];
        $cliente->_estado= $datos["estado"];
        $cliente->_dni = $datos["dni"];
		$cliente->_fechaNacimiento = $datos["fecha_nacimiento"];
		$cliente->_idSexo = $datos["id_sexo"];

		return $cliente;
    }


}

?>
