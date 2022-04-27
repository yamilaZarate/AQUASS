<?php
require_once "Factura.php";
require_once "MySQL.php";
require_once "Medidor.php";


class Categoria {

	protected $_idCategoria;
	protected $_descripcion;

	public $medidor;
	public $factura;

	public function getIdCategoria() {
		return $this->_idCategoria;
	}

	public function getDescripcion() {
		return $this->_descripcion;
	}

	public function setDescripcion($descripcion) {
		$this->_descripcion = $descripcion;
	}
	public function getIdMedidor() {
		return $this->_idMedidor;
	}

	public function guardar() {
		$database = new MySQL();

		$sql = "INSERT INTO categoria "
		     . "(`id_categoria`, `descripcion`) "
		     . "VALUES (NULL, '{$this->_descripcion}')";
		

		$database->insertar($sql);
	}

	public function actualizar() {

		$database = new MySQL();

		$sql = "UPDATE categoria SET descripcion = '{$this->_descripcion}'"
             . " WHERE categoria.id_categoria = '{$this->_idCategoria}'";
      

        $database->actualizar($sql);

	}
	public static function obtenerTodos() {
    	$sql = "SELECT * FROM categoria ";
        
    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoCategorias = [];

    	while ($registro = $datos->fetch_assoc()) {
	    	$categoria = new Categoria();
			$categoria->_idCategoria = $registro["id_categoria"];
			$categoria->_descripcion = $registro["descripcion"];
    		$listadoCategorias[] = $categoria;
    	}

    	return $listadoCategorias;
	}

    public static function obtenerPorId($id) {
    	$sql = "SELECT categoria.id_categoria, categoria.descripcion"
    	      . " FROM categoria "
    	      . "WHERE id_categoria=". $id;
    	//echo $sql;
    	//exit;
    	$database = new MySQL();
        $datos = $database->consultar($sql);

        // TODO: ver que pasa cuando no existe la categoria
       if ($datos->num_rows == 0) {
       return false;
        }

        $registro = $datos->fetch_assoc();
    	$categoria = self::_crearCategoria($registro);
		return $categoria;

    }

    public function eliminar() {

    	$sql = "DELETE FROM categoria WHERE id_categoria={$this->_idCategoria}";
    	
    	$database = new MySQL();
        $database->eliminar($sql);
    }

    private static function _crearCategoria($datos) {
    	$categoria = new Categoria();
		$categoria->_idCategoria = $datos["id_categoria"];
		$categoria->_descripcion = $datos["descripcion"];
		return $categoria;
    }


}

?>