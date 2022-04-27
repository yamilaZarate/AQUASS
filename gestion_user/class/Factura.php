<?php

require_once "MySQL.php";
require_once "medidor.php";
require_once "periodo.php";
require_once "EstadoPago.php";
require_once "Categoria.php";
require_once "Cliente.php";
require_once "RegistroMedidor.php";
require_once "medidorTipoServicio.php";

class Factura {

	private $_idFactura;
	private $_numero;
    private $_fechaEmision;
    private $_primerVencimiento;
    private $_segundoVencimiento;
    private $_canon;
    private $_iva;
    private $_idEstadoPago; 
    private $_idPeriodo;
    private $_idMedidor;
    private $_idRegistroMedidor;
    
    public $cliente;
    public $categoria;
    public $medidorTipoServicio;
    public $estadoPago;
    public $periodo;
    public $medidor;

	public function getIdFactura() {
		return $this->_idFactura;
	}
    public function setIdFactura($_idFactura) {
        $this->_idFactura = $_idFactura;
    }

	public function getnumero() {
		return $this->_numero;
	}

	public function setnumero($_numero) {
		$this->_numero = $_numero;
	}

    public function getFechaEmision() {
        return $this->_fechaEmision;
    }

    public function setFechaEmision($fechaEmision) {
        $this->_fechaEmision = $fechaEmision;
    }

    public function getPrimerVencimiento() {
        return $this->_primerVencimiento;
    }

    public function setPrimerVencimiento($_primerVencimiento) {
        $this->_primerVencimiento = $_primerVencimiento;
    }
    public function getSegundoVencimiento() {
        return $this->_segundoVencimiento;
    }

    public function setSegundoVencimiento($_segundoVencimiento) {
        $this->_segundoVencimiento = $_segundoVencimiento;
    }
    public function getCanon() {
        return $this->_canon;
    }

    public function setCanon($canon) {
        $this->_canon = $canon;
    }  
    public function getIva() {
        return $this->_iva;
    }

    public function setIva($iva) {
        $this->_iva = $iva;
    }  
    public function getIdEstadoPago() {
        return $this->_idEstadoPago;
    }

    public function setIdEstadoPago($_idEstadoPago) {
        $this->_idEstadoPago = $_idEstadoPago;
    }
    public function getIdPeriodo() {
        return $this->_idPeriodo;
    }

    public function setIdPeriodo($_idPeriodo) {
        $this->_idPeriodo = $_idPeriodo;
    }
    public function getIdMedidor() {
        return $this->_idMedidor;
    }

    public function setIdMedidor($_idMedidor) {
        $this->_idMedidor = $_idMedidor;
    }
    public function getIdRegistroMedidor() {
        return $this->idRegistroMedidor;

    }
    public function setIdRegistroMedidor($idRegistroMedidor) {
        $this->_idRegistroMedidor = $idRegistroMedidor;
    }

    public static function obtenerPorIdFactura($idFactura) {
        $sql = "SELECT * FROM factura WHERE id_factura={$idFactura}";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoFacturas = [];

        while ($registro = $datos->fetch_assoc()) {
            $factura = new Factura();
            $factura->_idFactura = $registro["id_factura"];
            $factura->_numero = $registro["numero"];
            $factura->_fechaEmision = $registro["fecha_emision"];
            $factura->_primerVencimiento = $registro["primer_vencimiento"];
            $factura->_segundoVencimiento = $registro["segundo_vencimiento"];
            $factura->_canon = $registro["canon"];
            $factura->_iva = $registro["iva"];
            $factura->_idEstadoPago = $registro["id_estado_pago"];
            $factura->estadoPago = EstadoPago::obtenerPorId($factura->_idEstadoPago);
            $factura->_idPeriodo = $registro["id_periodo"];
            $factura->periodo = Periodo::obtenerPorId($factura->_idPeriodo);
            $factura->_idMedidor = $registro["id_medidor"];
            $factura->medidor = Medidor::obtenerPorId($factura->_idMedidor);

            $factura->medidor->cliente = Cliente::obtenerPorId($factura->medidor->_idCliente);
            $factura->medidor->categoria = Categoria::obtenerPorId($factura->medidor->_idCategoria);


            $factura->_idRegistroMedidor = $registro["id_registro_medidor"];
            $factura->registroMedidor = RegistroMedidor::obtenerPorId($factura->_idRegistroMedidor);

            $listadoFacturas[] = $factura;
        }

        return $listadoFacturas;
               
    }

    public static function obtenerPorFecha($desde, $hasta){
        $sql= "SELECT * FROM factura where fecha_emision BETWEEN '$desde' AND '$hasta'";
        //echo $sql;
        //exit;

        $database= new MySQL();
        $datos = $database->consultar($sql);

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoFacturas = [];

        while ($registro = $datos->fetch_assoc()) {
            $factura = new Factura();
            $factura->_idFactura = $registro["id_factura"];
            $factura->_numero = $registro["numero"];
            $factura->_fechaEmision = $registro["fecha_emision"];
            $factura->_primerVencimiento = $registro["primer_vencimiento"];
            $factura->_segundoVencimiento = $registro["segundo_vencimiento"];
            $factura->_canon = $registro["canon"];
            $factura->_iva = $registro["iva"];
            $factura->_idEstadoPago = $registro["id_estado_pago"];
            $factura->estadoPago = EstadoPago::obtenerPorId($factura->_idEstadoPago);
            $factura->_idPeriodo = $registro["id_periodo"];
            $factura->periodo = Periodo::obtenerPorId($factura->_idPeriodo);
            $factura->_idMedidor = $registro["id_medidor"];
            $factura->medidor = Medidor::obtenerPorId($factura->_idMedidor);

            $factura->medidor->cliente = Cliente::obtenerPorId($factura->medidor->_idCliente);
            $factura->medidor->categoria = Categoria::obtenerPorId($factura->medidor->_idCategoria);


            $factura->_idRegistroMedidor = $registro["id_registro_medidor"];
            $factura->registroMedidor = RegistroMedidor::obtenerPorId($factura->_idRegistroMedidor);

            $listadoFacturas[] = $factura;
        }

        return $listadoFacturas;
               
    }
    public function obtenerNumero(){
        $database = new MySQL();

        $sql= "SELECT MAX(factura.numero)+1 AS numero FROM factura";
        $datos = $database->consultar($sql);

        $numero = 0;
        while ($registro = $datos->fetch_assoc()){
            $factura = new factura();
            $numero = $factura->_numero = $registro["numero"] + 1;
        }

        return $numero;

    }
    public static function clienteMorosos(){
        $sql="SELECT cliente.id_cliente, factura.id_factura,factura.numero,"
            ."factura.fecha_emision, "
            . "count(factura.id_estado_pago) as 'No pagado', "
            . "factura.id_periodo,factura.id_medidor "
            . " FROM factura "
            . "JOIN medidor on medidor.id_medidor= factura.id_medidor "
            ."JOIN cliente on cliente.id_cliente= medidor.id_cliente "
            ." WHERE factura.id_estado_pago = 2 group by cliente.id_cliente"
            . " order by 'No pagado' desc limit 5";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoFacturas = [];

        while ($registro = $datos->fetch_assoc()) {
            $factura = new Factura();
            $factura->_idEstadoPago = $registro['No pagado'];
            $factura->_idMedidor = $registro ["id_cliente"];
            $listadoFacturas[] = $factura;
        }

        return $listadoFacturas;
               
    }  

	public function guardar() {
		$database = new MySQL();
        // OBTENER id registro medidor a traves de id medidor
        // consulto a la clase registro medidor con el id de medidor
        //$lista = RegistroMedidor::obtenerPorIdMedidor($this->_idMedidor);
        $registroMedidor = RegistroMedidor::obtenerPorIdMedidor($this->_idMedidor);

        $this->_idRegistroMedidor = $registroMedidor->getIdRegistroMedidor();

		$sql ="INSERT INTO factura "
		     . "(`id_factura`, `numero`,`fecha_emision`,`primer_vencimiento`,`segundo_vencimiento`, "
             . "`id_estado_pago`,`id_periodo`,`id_medidor`,`id_registro_medidor`) "
		     . "VALUES (NULL, '{$this->_numero}', '{$this->_fechaEmision}','{$this->_primerVencimiento}', "
             . "'{$this->_segundoVencimiento}','{$this->_idEstadoPago}', "
             . "'{$this->_idPeriodo}','{$this->_idMedidor}','{$this->_idRegistroMedidor}')";
      //  echo $sql;
       // exit;
        
		$database->insertar($sql);

    }
    public function actualizar() {

        $database = new MySQL();

        $sql = "UPDATE factura SET numero ='{$this->_numero}',fecha_emision ='{$this->_fechaEmision}', "
             . "primer_vencimiento = '{$this->_primerVencimiento}',"
             . " segundo_vencimiento = '{$this->_segundoVencimiento}',canon = '{$this->_canon}',"
             . " iva= '{$this->_iva}',id_estado_pago = '{$this->_idEstadoPago}'," 
             . "id_periodo = '{$this->_idPeriodo}',id_medidor = '{$this->_idMedidor}' "
             . "WHERE factura.id_factura = {$this->_idFactura}";
        //echo $sql;
        //exit;
        $database->actualizar($sql);

	}
    ////////////////////ver////////////////////////
    /*public static function obtenerPorIdCliente($idCliente){
        $sql ="SELECT factura.numero, medidor.id_medidor,medidor.numero,"
            ."medidor.id_cliente FROM factura "
            ."JOIN medidor ON medidor.id_medidor = factura.id_medidor"
            ." WHERE medidor.id_cliente=". $idCliente;
        echo $sql;
        exit;
        
        $database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe el empleado
        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $_crearFactura = self::_crearFactura($registro);
        return $factura;
        ////////////////////////////
    }*/


	public static function obtenerTodos($filtroEstado = 0, $filtroFecha = "") {
    	$sql = "SELECT * FROM factura "
            ."JOIN estado_pago on estado_pago.id_estado_pago= factura.id_estado_pago";


        $where = "";

        if ($filtroEstado != 0) {
            // $sql = $sql . " WHERE personas.estado = " . $filtroEstado;
            $where = "WHERE estado_pago.id_estado_pago= " .$filtroEstado;

        }
        if ($filtroFecha != "") {

            if ($where != "") {

                $where .= " AND factura.fecha_emision = '{$filtroFecha}'";

            }
        }

        $sql = $sql . " " . $where;
      
    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoFacturas = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$factura = new Factura();
			$factura->_idFactura = $registro["id_factura"];
			$factura->_numero = $registro["numero"];
            $factura->_fechaEmision = $registro["fecha_emision"];
            $factura->_primerVencimiento = $registro["primer_vencimiento"];
            $factura->_segundoVencimiento = $registro["segundo_vencimiento"];
            $factura->_canon = $registro["canon"];
            $factura->_iva = $registro["iva"];
            $factura->_idEstadoPago = $registro["id_estado_pago"];
            $factura->estadoPago = EstadoPago::obtenerPorId($factura->_idEstadoPago);
            $factura->_idPeriodo = $registro["id_periodo"];
            $factura->periodo = Periodo::obtenerPorId($factura->_idPeriodo);
            $factura->_idMedidor = $registro["id_medidor"];
            $factura->medidor = Medidor::obtenerPorId($factura->_idMedidor);

            $factura->medidor->cliente = Cliente::obtenerPorId($factura->medidor->_idCliente);
            $factura->medidor->categoria = Categoria::obtenerPorId($factura->medidor->_idCategoria);


            $factura->_idRegistroMedidor = $registro["id_registro_medidor"];
            $factura->registroMedidor = RegistroMedidor::obtenerPorId($factura->_idRegistroMedidor);

            $listadoFacturas[] = $factura;
        }

        return $listadoFacturas;
               
    }
    public static function obtenerPorIdCliente($idCliente){
        $sql = "SELECT * FROM factura "
            ."JOIN medidor on medidor.id_medidor= factura.id_medidor "
            ."WHERE medidor.id_cliente= {$idCliente}";
        
      
        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoFacturas = [];

        while ($registro = $datos->fetch_assoc()) {
            $factura = new Factura();
            $factura->_idFactura = $registro["id_factura"];
            $factura->_numero = $registro["numero"];
            $factura->_fechaEmision = $registro["fecha_emision"];
            $factura->_primerVencimiento = $registro["primer_vencimiento"];
            $factura->_segundoVencimiento = $registro["segundo_vencimiento"];
            $factura->_canon = $registro["canon"];
            $factura->_iva = $registro["iva"];
            $factura->_idEstadoPago = $registro["id_estado_pago"];
            $factura->estadoPago = EstadoPago::obtenerPorId($factura->_idEstadoPago);
            $factura->_idPeriodo = $registro["id_periodo"];
            $factura->periodo = Periodo::obtenerPorId($factura->_idPeriodo);
            $factura->_idMedidor = $registro["id_medidor"];
            $factura->medidor = Medidor::obtenerPorId($factura->_idMedidor);

            $factura->medidor->cliente = Cliente::obtenerPorId($factura->medidor->_idCliente);
            $factura->medidor->categoria = Categoria::obtenerPorId($factura->medidor->_idCategoria);


            $factura->_idRegistroMedidor = $registro["id_registro_medidor"];
            $factura->registroMedidor = RegistroMedidor::obtenerPorId($factura->_idRegistroMedidor);

            $listadoFacturas[] = $factura;
        }

        return $listadoFacturas;
               
    }

    public static function obtenerPorId($id) {
    	$sql = "SELECT factura.id_factura,factura.numero,factura.fecha_emision,factura.primer_vencimiento,"  ." factura.segundo_vencimiento,factura.canon,factura.iva,factura.id_estado_pago, "
              . " factura.id_periodo,factura.id_medidor,factura.id_registro_medidor"
    	      . " FROM factura "
    	      . "WHERE id_factura=". $id;
        //echo $sql;
        //exit;

    	
    	$database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe la categoria
       if ($datos->num_rows == 0) {
       return false;
        }

        $registro = $datos->fetch_assoc();
    	$factura = self::_crearFactura($registro);
		return $factura;

    }

    public function eliminar() {

    	$sql = "DELETE FROM factura WHERE id_factura={$this->_idFactura}";

        //echo $sql;
        //exit;
    	
    	$database = new MySQL();
        $database->eliminar($sql);
    }

    private static function _crearFactura($datos) {
    	$factura = new Factura();
        $factura->_idFactura = $datos["id_factura"];
        //$factura->_idCliente = $datos["id_cliente"];
        //$factura->medidor->cliente = Cliente::obtenerPorId($factura->_idCliente);
        $factura->_numero = $datos["numero"];
        $factura->_fechaEmision = $datos["fecha_emision"];
        $factura->_idEstadoPago = $datos["id_estado_pago"];
        $factura->_primerVencimiento = $datos["primer_vencimiento"];
        $factura->_segundoVencimiento = $datos["segundo_vencimiento"];
        $factura->_canon = $datos["canon"];
        $factura->_iva = $datos["iva"];
        $factura->estadoPago = EstadoPago::obtenerPorId($factura->_idEstadoPago);
        $factura->_idPeriodo = $datos["id_periodo"];
        $factura->periodo = Periodo::obtenerPorId($factura->_idPeriodo);
        $factura->_idMedidor = $datos["id_medidor"];
        $factura->medidor = Medidor::obtenerPorId($factura->_idMedidor);
        $factura->medidor->categoria = Categoria::obtenerPorId($factura->medidor->_idCategoria);



    return $factura;
    }

}

?>