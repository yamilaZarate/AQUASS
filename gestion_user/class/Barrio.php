<?php

require_once "Localidad.php";
require_once "MySQL.php";


class Barrio {

    private $_idBarrio; 
    private $_descripcion;
    public $_idLocalidad; 

    public $localidad;

    /**
     * @return mixed
     */
    public function getIdBarrio()
    {
        return $this->_idBarrio;
    }

        /**
     * @return mixed
     */
    public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->_descripcion;
    }

        /**
     * @return mixed
     */
    public function setIdLocalidad($_idLocalidad)
    {
        $this->_idLocalidad = $_idLocalidad;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getIdLocalidad()
    {
        return $this->_idLocalidad;
    }

    public function guardar() {
        

        $database = new MySQL();


        $sql = "INSERT INTO barrio (`id_barrio`, `descripcion`,`id_localidad`) VALUES 
        (NULL, '{$this->_descripcion}','{$this->_idLocalidad}')";


        $database->insertar($sql);
    }


     public function actualizar() {

        $database = new MySQL();

        $sql = "UPDATE barrio SET descripcion = '{$this->_descripcion}'"
             . "WHERE barrio.id_barrio = {$this->_idBarrio}";


        $database->actualizar($sql);

    }

    public static function obtenerTodos() {

        $sql = "SELECT * FROM barrio";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoBarrio = [];

        while ($registro = $datos->fetch_assoc()) {
            $barrio = new Barrio();
            $barrio->_idBarrio = $registro["id_barrio"];
            $barrio->_descripcion = $registro["descripcion"];
            $barrio->_idLocalidad = $registro["id_localidad"];
            $listadoBarrio[] = $barrio;
        }


        return $listadoBarrio;

    }

    public static function obtenerPorId($idBarrio) {
        $sql = "SELECT * FROM barrio WHERE id_barrio={$idBarrio}";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $registro = $datos->fetch_assoc();

        $barrio = new Barrio();
        $barrio->_idBarrio = $registro["id_barrio"];
        $barrio->_descripcion = $registro["descripcion"];
        $barrio->_idLocalidad = $registro["id_localidad"];
      
        return $barrio;

    }


     public static function obtenerPorIdLocalidad($idLocalidad) {
        $sql = "SELECT * FROM barrio WHERE id_localidad={$idLocalidad}";


        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoBarrio = [];

        while ($registro = $datos->fetch_assoc()) {
        $barrio = new Barrio();
        $barrio->_idBarrio = $registro["id_barrio"];
        $barrio->_descripcion = $registro["descripcion"];
        $barrio->_idLocalidad = $registro["id_localidad"];
      
      
        $listadoBarrio[] = $barrio;
        }
      
       return $listadoBarrio;

    }

     public static function obtenerPorIdBarrio($id) {
        $sql = "SELECT barrio.id_barrio, barrio.descripcion, barrio.id_localidad FROM barrio WHERE id_barrio=". $id;



        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $barrio = self::_crearBarrio($registro);
        return $barrio;

    }


      public function eliminar() {

        $sql = "DELETE FROM barrio WHERE id_barrio={$this->_idBarrio}";
        
        $database = new MySQL();
        $database->eliminar($sql);

    }

     private static function _crearBarrio($datos) {
        $barrio = new Barrio();
        $barrio->_idBarrio = $datos["id_barrio"];
        $barrio->_descripcion = $datos["descripcion"];
        $barrio->_idLocalidad= $datos["id_localidad"];
        

        return $barrio;
    }

}


?>