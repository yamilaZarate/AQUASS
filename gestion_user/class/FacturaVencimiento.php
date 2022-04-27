<?php

require_once "MySQL.php";
require_once "Factura.php";


class FacturaVencimiento extends Factura {

    private $_idFacturaVencimiento;
    private $_fechaVencimiento;
    private $_idFactura;
    private $_idTipoVencimiento;


    public function getIdFacturaVencimiento() {
        return $this->_idFacturaVencimiento;
    }
    public function setIdFacturaVencimiento($_idFacturaVencimiento) {
        $this->_idFacturaVencimiento = $_idFacturaVencimiento;
    }

    public function getFechaVencimiento() {
        return $this->_fechaVencimiento;
    }

    public function setFechaVencimiento($_fechaVencimiento) {
        $this->_fechaVencimiento = $_fechaVencimiento;
    }

    public function getIdFactura() {
        return $this->_idFactura;
    }
    public function setIdFactura($_idFactura) {
        $this->_idFactura = $_idFactura;
    }
    public function getIdTipoVencimiento() {
        return $this->_idTipoVencimiento;
    }
    public function setIdTipoVencimiento($_idTipoVencimiento) {
        $this->_idTipoVencimiento = $_idTipoVencimiento;
    }



    public static function obtenerPorIdFactura($idMedidor) {
        $sql ="SELECT factura_vencimiento.id_factura_vencimiento,factura_vencimiento.fecha_vencimiento,factura_vencimiento.id_factura,factura_vencimiento.id_tipo_vencimiento"
          ." tipo_vencimiento.id_tipo_vencimiento,tipo_vencimiento.descripcion,tipo_vencimiento.porcentaje "
          ." FROM factura_vencimiento"
          ." INNER JOIN tipo_vencimiento ON tipo_vencimiento.id_tipo_vencimiento = factura_vencimiento.id_tipo_vencimiento"
          ." INNER JOIN factura ON factura.id_factura = factura_vencimiento.id_factura"
          ." WHERE factura.id_factura = {$idFactura}";
        //echo $sql;
        //exit;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoFacturaVencimientos = [];

        while ($registro = $datos->fetch_assoc()) {
            $facturaVencimiento = new FacturaVencimiento();
            $facturaVencimiento->_idFacturaVencimiento = $registro["id_factura_vencimiento"];
            $facturaVencimiento->_fechaVencimiento = $registro["fecha_vencimiento"];
            $facturaVencimiento->_idFactura= $registro["id_factura"];
            $facturaVencimiento->_idTipoVencimiento = $registro["id_tipo_vencimiento"];
            $facturaVencimiento->_descripcion = $registro["descripcion"];
            $facturaVencimiento->_porcentaje = $registro["porcentaje"];

            $listadoFacturaVencimientos[] = $facturaVencimiento;
        }


        return $listadoFacturaVencimientos;

    }

     public static function obtenerPorId($idFacturaVencimiento) {
        $sql = "SELECT * FROM factura_vencimiento WHERE id_factura_vencimiento={$idFacturaVencimiento}";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $registro = $datos->fetch_assoc();

        $facturaVencimiento = new FacturaVencimiento();
        $facturaVencimiento->_idFacturaVencimiento = $datos["id_factura_vencimiento"];
        $facturaVencimiento->_fechaVencimiento = $datos["fecha_vencimiento"];
        $facturaVencimiento->_idFactura= $datos["id_factura"];
        $facturaVencimiento->_idTipoVencimiento = $datos["id_tipo_vencimiento"];
        $facturaVencimiento->_descripcion = $datos["descripcion"];
        $facturaVencimiento->_porcentaje = $datos["porcentaje"];

        return $facturaVencimiento;

    }
    public static function obtenerPorIdFV($id) {
        $sql ="SELECT factura_vencimiento.id_factura_vencimiento,factura_vencimiento.fecha_vencimiento,factura_vencimiento.id_factura, factura_vencimiento.id_tipo_vencimiento"
          ." tipo_vencimiento.id_tipo_vencimiento,tipo_vencimiento.descripcion,tipo_vencimiento.porcentaje "
          ." FROM factura_vencimiento"
          ." INNER JOIN tipo_vencimiento ON tipo_vencimiento.id_tipo_vencimiento = factura_vencimiento.id_tipo_vencimiento "
          ." INNER JOIN factura ON factura.id_factura = factura_vencimiento.id_factura WHERE id_factura_vencimiento=" . $id;
        //echo $sql;
        //exit;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe 
        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $facturaVencimiento = self::_crearFacturaVencimiento($registro);
        return $facturaVencimiento;

    }

    public function eliminar() {
        $sql = "DELETE FROM factura_vencimiento WHERE id_factura_vencimiento={$this->_idFacturaVencimiento}";
       // echo $sql;
        //exit;
        $database = new MySQL();
        $database->eliminar($sql);
        parent::eliminar();
    }

        private static function _crearFacturaVencimiento($datos) {
        $domicilio = new MedidorDomicilio();
        $facturaVencimiento->_idFacturaVencimiento = $datos["id_factura_vencimiento"];
        $facturaVencimiento->_fechaVencimiento = $datos["fecha_vencimiento"];
        $facturaVencimiento->_idFactura= $datos["id_factura"];
        $facturaVencimiento->_idTipoVencimiento = $datos["id_tipo_vencimiento"];
        $facturaVencimiento->_descripcion = $datos["descripcion"];
        $facturaVencimiento->_porcentaje = $datos["porcentaje"];
        return $facturaVencimiento;
    }


    public function guardar() {
        parent::guardar();

        $database = new MySQL();


        $sql = "INSERT INTO factura_vencimiento (`id_factura_vencimiento`, `fecha_vencimiento`, `id_factura`,`id_tipo_vencimiento) VALUES (NULL,{$this->_fechaVencimiento}, {$this->_idFactura},{$this->_idTipoVencimiento})";


        $database->insertar($sql);
    }

    

}


?>