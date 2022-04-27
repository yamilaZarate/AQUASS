<?php

require_once "MySQL.php";
require_once "Domicilio.php";


class MedidorDomicilio extends Domicilio {

    private $_idMedidorDomicilio;
    private $_idMedidor;


    public function getIdMedidorDomicilio() {
        return $this->_idMedidorDomicilio;
    }
    public function setIdMedidorDomicilio($_idMedidorDomicilio) {
        $this->_idMedidorDomicilio = $_idMedidorDomicilio;
    }

    public function getIdMedidor() {
        return $this->_idMedidor;
    }

    public function setIdMedidor($idMedidor) {
        $this->_idMedidor = $idMedidor;
    }


    public function setIdDomicilio($idDomicilio) {
        $this->_idDomicilio = $idDomicilio;
    }


    public static function obtenerPorIdMedidor($idMedidor) {
        $sql ="SELECT medidor_domicilio.id_medidor_domicilio, medidor_domicilio.id_medidor, medidor_domicilio.id_domicilio,"
          ."domicilio.calle ,  domicilio.altura, domicilio.manzana , domicilio.numero_casa , domicilio.torre ,"
          ." domicilio.piso, domicilio.observaciones , domicilio.id_barrio FROM medidor_domicilio"
          ." INNER JOIN domicilio ON domicilio.id_domicilio = medidor_domicilio.id_domicilio"
          ." INNER JOIN medidor ON medidor.id_medidor = medidor_domicilio.id_medidor"
          ." WHERE medidor.id_medidor = {$idMedidor}";
        //echo $sql;
        //exit;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoDomicilios = [];

        while ($registro = $datos->fetch_assoc()) {
            $medidorDomicilio = new MedidorDomicilio();
            $medidorDomicilio->_idMedidorDomicilio = $registro["id_medidor_domicilio"];
            $medidorDomicilio->_idMedidor = $registro["id_medidor"];
            $medidorDomicilio->_idDomicilio= $registro["id_domicilio"];
            $medidorDomicilio->_calle = $registro["calle"];
            $medidorDomicilio->_altura = $registro["altura"];
            $medidorDomicilio->_manzana = $registro["manzana"];
            $medidorDomicilio->_numeroCasa = $registro["numero_casa"];
            $medidorDomicilio->_torre = $registro["torre"];
            $medidorDomicilio->_piso = $registro["piso"];
            $medidorDomicilio->_observaciones = $registro["observaciones"];
            $medidorDomicilio->_idBarrio = $registro["id_barrio"];
            $medidorDomicilio->barrio = Barrio::obtenerPorId($medidorDomicilio->_idBarrio);
            $medidorDomicilio->barrio ->localidad = Localidad::obtenerPorId($medidorDomicilio->barrio->_idLocalidad);
            $medidorDomicilio->barrio ->localidad->provincia = Provincia::obtenerPorId($medidorDomicilio->barrio->localidad->_idProvincia);
            $medidorDomicilio->barrio ->localidad->provincia->pais = Pais::obtenerPorId($medidorDomicilio->barrio->localidad->provincia->_idPais);
            $listadoDomicilios[] = $medidorDomicilio;
        }


        return $listadoDomicilios;

    }

     public static function obtenerPorId($idMedidorDomicilio) {
        $sql = "SELECT * FROM medidor_domicilio WHERE id_medidor_domicilio={$idMedidorDomicilio}";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $registro = $datos->fetch_assoc();

        $medidorDomicilio = new MedidorDomicilio();
        $medidorDomicilio->_idMedidorDomicilio = $registro["id_medidor_domicilio"];
        $medidorDomicilio->_idMedidor = $registro["id_medidor"];
        $medidorDomicilio->_idDomicilio= $registro["id_domicilio"];
        $medidorDomicilio->_calle = $registro["calle"];
        $medidorDomicilio->_altura = $registro["altura"];
        $medidorDomicilio->_manzana = $registro["manzana"];
        $medidorDomicilio->_numeroCasa = $registro["numero_casa"];
        $medidorDomicilio->_torre = $registro["torre"];
        $medidorDomicilio->_piso = $registro["piso"];
        $medidorDomicilio->_observaciones = $registro["observaciones"];
        $medidorDomicilio->_idBarrio = $registro["id_barrio"];
        //$personaDomicilio->barrio = Barrio::obtenerPorId($personaDomicilio->_idBarrio);
        //$personaDomicilio->barrio ->localidad = Localidad::obtenerPorId($personaDomicilio->barrio->_idLocalidad);
        //$personaDomicilio->barrio ->localidad->provincia = Provincia::obtenerPorId($personaDomicilio->barrio->localidad->_idProvincia);
        $medidorDomicilio->barrio ->localidad->provincia->pais = Pais::obtenerPorId($medidorDomicilio->barrio->localidad->provincia->_idPais);
            

        return $medidorDomicilio;

    }
    public static function obtenerPorIdMD($id) {
        $sql ="SELECT medidor_domicilio.id_medidor_domicilio, medidor_domicilio.id_medidor, medidor_domicilio.id_domicilio,"
          ."domicilio.calle ,  domicilio.altura, domicilio.manzana , domicilio.numero_casa , domicilio.torre ,"
          ." domicilio.piso, domicilio.observaciones , domicilio.id_barrio FROM medidor_domicilio"
          ." INNER JOIN domicilio ON domicilio.id_domicilio = medidor_domicilio.id_domicilio "
          ." INNER JOIN medidor ON medidor.id_medidor = medidor_domicilio.id_medidor WHERE id_medidor_domicilio=" . $id;
        //echo $sql;
        //exit;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe 
        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $domicilio = self::_crearDomicilio($registro);
        return $domicilio;

    }

    public function eliminar() {
        $sql = "DELETE FROM medidor_domicilio WHERE id_medidor_domicilio={$this->_idMedidorDomicilio}";
       // echo $sql;
        //exit;
        $database = new MySQL();
        $database->eliminar($sql);
        parent::eliminar();
    }

        private static function _crearDomicilio($datos) {
        $domicilio = new MedidorDomicilio();
            $domicilio->_idMedidorDomicilio = $datos["id_medidor_domicilio"];
            $domicilio->_idMedidor = $datos["id_medidor"];
            $domicilio->_idDomicilio= $datos["id_domicilio"];
            $domicilio->_calle = $datos["calle"];
            $domicilio->_altura = $datos["altura"];
            $domicilio->_manzana = $datos["manzana"];
            $domicilio->_numeroCasa = $datos["numero_casa"];
            $domicilio->_torre = $datos["torre"];
            $domicilio->_piso = $datos["piso"];
            $domicilio->_observaciones = $datos["observaciones"];
            $domicilio->_idBarrio = $datos["id_barrio"];
            $domicilio->barrio = Barrio::obtenerPorId($domicilio->_idBarrio);
            $domicilio->barrio ->localidad = Localidad::obtenerPorId($domicilio->barrio->_idLocalidad);
            $domicilio->barrio ->localidad->provincia = Provincia::obtenerPorId($domicilio->barrio->localidad->_idProvincia);
            $domicilio->barrio ->localidad->provincia->pais = Pais::obtenerPorId($domicilio->barrio->localidad->provincia->_idPais);

        return $domicilio;
    }


    public function guardar() {
        parent::guardar();

        $database = new MySQL();


        $sql = "INSERT INTO medidor_domicilio (`id_medidor_domicilio`, `id_domicilio`, `id_medidor`) VALUES (NULL,  {$this->_idDomicilio},  {$this->_idMedidor})";


        $database->insertar($sql);
    }

    

}


?>