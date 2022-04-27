<?php


require_once "Provincia.php";
require_once "MySQL.php";


class Localidad {

    private $_idLocalidad; 
    private $_descripcion;
    public $_idProvincia; 

    public $provincia;

    /**
     * @return mixed
     */
    public function getIdLocalidad()
    {
        return $this->_idLocalidad;
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
    public function setIdProvincia($_idProvincia)
    {
        $this->_idProvincia = $_idProvincia;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getIdProvincia()
    {
        return $this->_idProvincia;
    }


    public function guardar() {
        

        $database = new MySQL();


        $sql = "INSERT INTO localidad (`id_localidad`, `descripcion`,`id_provincia`) VALUES 
        (NULL, '{$this->_descripcion}','{$this->_idProvincia}')";

        echo $sql;
        exit;

        $database->insertar($sql);
    }


    public function actualizar() {

        $database = new MySQL();

        $sql = "UPDATE localidad SET descripcion = '{$this->_descripcion}'"
             . "WHERE localidad.id_localidad = {$this->_idLocalidad}";


        $database->actualizar($sql);

    }

    public static function obtenerTodos() {

        $sql = "SELECT * FROM localidad";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoLocalidad = [];

        while ($registro = $datos->fetch_assoc()) {
            $localidad = new Localidad();
            $localidad->_idLocalidad= $registro["id_localidad"];
            $localidad->_descripcion = $registro["descripcion"];
            $localidad->_idProvincia = $registro["id_provincia"];
            $listadoLocalidad[] = $localidad;
        }


        return $listadoLocalidad;

    }

    public static function obtenerPorId($idLocalidad) {
        $sql = "SELECT * FROM localidad WHERE id_localidad= {$idLocalidad}";

        //echo $sql;
        //exit;

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $registro = $datos->fetch_assoc();

        $localidad = new Localidad();
        $localidad->_idLocalidad= $registro["id_localidad"];
        $localidad->_descripcion = $registro["descripcion"];
        $localidad->_idProvincia = $registro["id_provincia"];
      
        return $localidad;

    }

     public static function obtenerPorIdProvincia($idProvincia) {
        $sql = "SELECT * FROM localidad WHERE id_provincia={$idProvincia}";

        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoLocalidad = [];

        while ($registro = $datos->fetch_assoc()) {
        $localidad = new Localidad();
        $localidad->_idLocalidad= $registro["id_localidad"];
        $localidad->_descripcion = $registro["descripcion"];
        $localidad->_idProvincia = $registro["id_provincia"];
      
        $listadoLocalidad[] = $localidad;
        }
      
       return $listadoLocalidad;

    }


     public static function obtenerPorIdLocalidad($id) {
        $sql = "SELECT localidad.id_localidad, localidad.descripcion, localidad.id_provincia FROM localidad WHERE id_localidad=". $id;



        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
            return false;
        }

        $registro = $datos->fetch_assoc();
        $localidad = self::_crearLocalidad($registro);
        return $localidad;

    }


      public function eliminar() {

        $sql = "DELETE FROM localidad WHERE id_localidad={$this->_idLocalidad}";
        
        $database = new MySQL();
        $database->eliminar($sql);

    }

     private static function _crearLocalidad($datos) {
        $localidad = new Localidad();
        $localidad->_idLocalidad = $datos["id_localidad"];
        $localidad->_descripcion = $datos["descripcion"];
        $localidad->_idProvincia= $datos["id_provincia"];
        

        return $localidad;
    }
}


?>