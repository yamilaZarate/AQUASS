<?php

require_once "MySQL.php";
require_once "Cliente.php";
require_once "Categoria.php";
require_once "MedidorTipoServicio.php";
require_once "TipoServicio.php";

Class Medidor {

	protected $_idMedidor;
	protected $_numero;
	protected $_estado;
	public $_idCliente;
	public $_idCategoria;
	protected $_listadoServicios;


	public $medidorTipoServicio;
	public $cliente;
	public $categoria;

	public function getIdMedidor() {
		return $this->_idMedidor;
	}

	public function getNumero() {
		return $this->_numero;
	}

	public function setNumero($numero) {
		$this->_numero = $numero;
	}
	public function getEstado() {
        return $this->_estado;
    }
    public function setEstado($_estado)
    {
        $this->_estado= $_estado;
    }
	public function getIdCliente(){
		return $this->_idCliente;

    }

	public function setIdCliente($idCliente) {
		$this->_idCliente = $idCliente;
	}
	public function getIdCategoria(){
		return $this->_idCategoria;

    }

	public function setIdCategoria($idCategoria) {
		$this->_idCategoria = $idCategoria;
	}
	public function getServicio(){
		return $this->_listadoServicios;
	}
	public function setServicio($listadoServicios) {
		$this->_listadoServicios = $listadoServicios;
	}
	
	public function obtenerNumero(){
        $database = new MySQL();

        $sql= "SELECT MAX(medidor.numero)+1 AS numero FROM medidor";
        $datos = $database->consultar($sql);

        $numero = 0;
        while ($registro = $datos->fetch_assoc()){
            $medidor = new Medidor();
            $numero = $medidor->_numero = $registro["numero"] + 1;
        }

        return $numero;

    }
	public function guardar(){
		//guardar el medidor
		$database = new MySQL();
        $sql= "INSERT INTO `medidor` (`id_medidor`,`numero`,`estado`,`id_cliente`,`id_categoria`)"
        		."VALUES (NULL,'{$this->_numero}','{$this->_estado}','{$this->_idCliente}','{$this->_idCategoria}')";
        //echo $sql;
        //exit;

        $idMedidor = $database->insertar($sql);

        $this->_idMedidor = $idMedidor;
       
    }
		public function actualizar() {

			$database = new MySQL();
    		$sql = "UPDATE medidor SET numero = '{$this->_numero}', "
    		     . "estado = '{$this->_estado}', id_cliente = '{$this->_idCliente}', id_categoria = '{$this->_idCategoria}'"
                 . " WHERE medidor.id_medidor= {$this->_idMedidor}";
            //echo $sql;
            //exit;
            
            $database->actualizar($sql);
	}
	public static function obtenerTodosC($filtroCategoria = 0) {
		$sql = "SELECT cliente.id_cliente,cliente.id_persona,"
			."medidor.id_medidor,medidor.numero,medidor.estado,medidor.id_cliente,"
			. " medidor.id_categoria " 
			."FROM medidor JOIN cliente ON cliente.id_cliente=medidor.id_cliente"
			." JOIN categoria on categoria.id_categoria= medidor.id_categoria";
		//echo $sql;
		//exit;

		$where = "";

        if ($filtroCategoria != 0) {
            $where = " WHERE categoria.id_categoria= " .$filtroCategoria;

        }

        $sql = $sql . " " . $where;

    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoMedidores = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$medidor = new Medidor();
			$medidor->_idMedidor = $registro["id_medidor"];
			$medidor->_numero = $registro["numero"];
			$medidor->_estado = $registro["estado"];
			$medidor->_idPersona = $registro["id_persona"];
			$medidor->_idCliente = $registro["id_cliente"];
			$medidor->cliente = Cliente::obtenerPorId($medidor->_idCliente);
			$medidor->_idCategoria = $registro["id_categoria"];
			$medidor->categoria = Categoria::obtenerPorId($medidor->_idCategoria);


    		$listadoMedidores[] = $medidor;
    	}
		return $listadoMedidores;
		}
		public static function obtenerTodos($filtroEstado = 0,$filtroCategoria = 0) {
    	$sql = "SELECT cliente.id_cliente,cliente.id_persona,"
			."medidor.id_medidor,medidor.numero,medidor.estado,medidor.id_cliente,"
			. " medidor.id_categoria " 
			."FROM medidor JOIN cliente ON cliente.id_cliente=medidor.id_cliente"
			." JOIN categoria on categoria.id_categoria= medidor.id_categoria";
		//echo $sql;
		//exit;

		$where = "";

        if ($filtroEstado != 0) {
            // $sql = $sql . " WHERE personas.estado = " . $filtroEstado;
            $where = "WHERE medidor.estado = " . $filtroEstado;
        }


        if ($filtroCategoria != 0) {
            $where = " AND categoria.id_categoria= " .$filtroCategoria;

        }

        $sql = $sql . " " . $where;

    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoMedidores = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$medidor = new Medidor();
			$medidor->_idMedidor = $registro["id_medidor"];
			$medidor->_numero = $registro["numero"];
			$medidor->_estado = $registro["estado"];
			$medidor->_idPersona = $registro["id_persona"];
			$medidor->_idCliente = $registro["id_cliente"];
			$medidor->cliente = Cliente::obtenerPorId($medidor->_idCliente);
			$medidor->_idCategoria = $registro["id_categoria"];
			$medidor->categoria = Categoria::obtenerPorId($medidor->_idCategoria);


    		$listadoMedidores[] = $medidor;
    	}
		return $listadoMedidores;
		}

	    /*public static function obtenerPorId($id) {
	    	$sql = "SELECT cliente.id_cliente,cliente.id_persona,"
					. "medidor.id_medidor,medidor.numero, medidor.id_cliente,medidor.id_categoria "
					. "FROM medidor "
					. "JOIN cliente ON cliente.id_cliente = medidor.id_cliente "
					. "WHERE id_medidor=". $id;
			
	        $database = new MySQL();
	        $datos = $database->consultar($sql);

	        // TODO: ver que pasa cuando no existe el medidor
	        if ($datos->num_rows == 0) {
	        	return false;
	        }

	        $registro = $datos->fetch_assoc();
	    	$medidor = self::_crearMedidor($registro);
			return $medidor;

	    }
    
    	public static function obtenerPorIdMedidor($idMedidor) {
	    	$sql = "SELECT cliente.id_cliente,cliente.id_persona,"
					. "medidor.id_medidor,medidor.numero, medidor.id_cliente,medidor.id_categoria "
					. "FROM medidor "
             		. "JOIN cliente ON cliente.id_cliente = medidor.id_cliente "
             		. "WHERE medidor.id_cliente=" . $idMedidor;
       
        $database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe el empleado
        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $medidor = self::_crearMedidor($registro);
        return $medidor;

    }*/

    public static function obtenerPorIdMedidor($idMedidor) {

		$sql = "SELECT * FROM medidor WHERE id_medidor={$idMedidor}";
		

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$registro = $datos->fetch_assoc();

		$medidor = new Medidor();
		$medidor->_idMedidor = $registro["id_medidor"];
		$medidor->_numero = $registro["numero"];
		$medidor->_estado = $registro["estado"];
		$medidor->_idCliente = $registro["id_cliente"];
		$medidor->_idCategoria = $registro["id_categoria"];
		$medidor->_listadoServicios = TipoServicio::obtenerPorIdMedidor($medidor->_idMedidor);

		return $medidor;

	}

	public static function obtenerPorId($id) {

		$sql = "SELECT * FROM medidor WHERE id_medidor=" . $id;

		$database = new MySQL();
		$datos = $database->consultar($sql);

		$registro = $datos->fetch_assoc();

		$medidor = new Medidor();
		$medidor->_idMedidor = $registro["id_medidor"];
		$medidor->_numero = $registro["numero"];
		$medidor->_estado = $registro["estado"];
		$medidor->_idCliente = $registro["id_cliente"];
		$medidor->_idCategoria = $registro["id_categoria"];
		$medidor->_listadoServicios = TipoServicio::obtenerPorIdMedidor($medidor->_idMedidor);

		return $medidor;

	}

	    public function eliminar() {

	    	$sql= "UPDATE medidor SET estado = '2' WHERE id_medidor={$this->_idMedidor}";
	    	
	    	$database = new MySQL();
	        $database->eliminar($sql);

	    }
		private static function _crearMedidor($datos) {
	    	$medidor = new Medidor();
			$medidor->_idMedidor = $datos["id_medidor"];
			$medidor->_numero = $datos["numero"];
			$medidor->_estado = $datos["estado"];
			$medidor->_idCliente = $datos["id_cliente"];
			$medidor->_idCategoria = $datos["id_categoria"];
			//$medidor->_fechaDeAlta = $datos["fecha_de_alta"];
			//$medidor->_idPersona = $datos["id_persona"];

			return $medidor;
	    }

}

?>