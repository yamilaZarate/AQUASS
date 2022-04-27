

<?php
require_once "Medidor.php";
require_once "MySQL.php";


class Periodo {

    protected $_idPeriodo;
    protected $_mes;
    protected $_anio;

    public $medidor;
    public $factura;

    public function getIdPeriodo() {
        return $this->_idPeriodo;
    }

    public function getMes() {
        return $this->_mes;
    }

    public function setMes($mes) {
        $this->_mes = $mes;
    }
    public function getAnio() {
        return $this->_anio;
    }
    public function setAnio($anio) {
        $this->_anio = $anio;
    }

    public function guardar() {
        $database = new MySQL();

        $sql = "INSERT INTO periodo "
             . "(`id_periodo`, `mes`,`anio`) "
             . "VALUES (NULL, '{$this->_mes}','{$this->_anio}')";
        

        $database->insertar($sql);
    }

    public function actualizar() {

        $database = new MySQL();

        $sql = "UPDATE periodo SET mes = '{$this->_mes}',"
             ."anio = '{$this->_anio}'"
             . " WHERE periodo.id_periodo = '{$this->_idPeriodo}'";
      

        $database->actualizar($sql);

    }
    public static function obtenerTodos() {
        $sql = "SELECT * FROM periodo ";
        
        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoPeriodos = [];

        while ($registro = $datos->fetch_assoc()) {
            $periodo = new Periodo();
            $periodo->_idPeriodo = $registro["id_periodo"];
            $periodo->_mes = $registro["mes"];
            $periodo->_anio = $registro["anio"];

            $listadoPeriodos[] = $periodo;
        }

        return $listadoPeriodos;
    }

    public static function obtenerPorId($id) {
        $sql = "SELECT periodo.id_periodo,periodo.mes,periodo.anio"
              . " FROM periodo "
              . "WHERE id_periodo=". $id;
        //echo $sql;
        //exit;
        $database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe la categoria
       if ($datos->num_rows == 0) {
       return false;
        }

        $registro = $datos->fetch_assoc();
        $periodo = self::_crearPeriodo($registro);
        return $periodo;

    }

    public function eliminar() {

        $sql = "DELETE FROM periodo WHERE id_periodo={$this->_idPeriodo}";
        
        $database = new MySQL();
        $database->eliminar($sql);
    }

    private static function _crearPeriodo($datos) {
        $periodo = new Periodo();
        $periodo->_idPeriodo = $datos["id_periodo"];
        $periodo->_mes = $datos["mes"];
        $periodo->_anio = $datos["anio"];

        return $periodo;
    }


}

?>