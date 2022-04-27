<?php

require_once "MySQL.php";
require_once "Persona.php";
require_once "Perfil.php";

class Usuario extends Persona {

	private $_idUsuario;
	private $_username;
    private $_password;
    private $_idpersona;
	protected $_idPerfil;
	private $_estaLogueado;


    public function getIdUsuario()
    {
        return $this->_idUsuario;
    }
    public function setIdUsuario($_idUsuario)
    {
        $this->_idUsuario = $_idUsuario;

        return $this;
    }

    public function getUsername()
    {
        return $this->_username;
    }

    public function setUsername($_username)
    {
        $this->_username = $_username;

        return $this;
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function setPassword($_password)
    {
        $this->_password = $_password;

        return $this;
    }
    public function getIdpersona()
    {
        return $this->_idpersona;
    }

    public function setIdpersona($_idpersona)
    {
        $this->_idpersona = $_idpersona;

        return $this;
    }
    public function getIdPerfil()
    {
        return $this->_idPerfil;
    }

    public function setIdPerfil($_idPerfil)
    {
        $this->_idPerfil = $_idPerfil;

        return $this;
    }
    public function estaLogueado()
    {
    	return $this->_estaLogueado;
    }

    public function guardar() {
        parent::guardar();

        $database = new MySQL();

        $sql = "INSERT INTO usuario "
             . "(`id_usuario`, `username`, `password`,`id_perfil`,`id_persona`) "
             . "VALUES (NULL,'{$this->_username}','{$this->_password}',"
             . "'{$this->_idPerfil}','{$this->_idpersona}')";
        //echo ($sql);
        //exit;     
        $database->insertar($sql);

    }

    public function actualizar() {
       parent::actualizar();

        $database = new MySQL();

        $sql = "UPDATE usuario SET username = '{$this->_username}',"
             . "password= '{$this->_password}' "
             . "WHERE usuario.id_usuario = {$this->_idUsuario}";
        //echo ($sql);
        //exit;

       $database->actualizar($sql);

    }
    public static function obtenerTodos() {
    	$sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, "
             . "persona.fecha_nacimiento,persona.dni,persona.estado,persona.id_sexo, "
             . "usuario.id_usuario, usuario.username, usuario.password,"
             . "usuario.id_perfil "
             . "FROM usuario "
             . "JOIN persona ON persona.id_persona = usuario.id_persona";

    	$database = new MySQL();
    	$datos = $database->consultar($sql);

    	$listadoUsuarios = [];

    	while ($registro = $datos->fetch_assoc()) {
    		$user = self::_crearUsuario($registro);
    		$listadoUsuarios[] = $user;
    	}


    	return $listadoUsuarios;
    }

    public static function login($username, $password) {
    	$sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, "
             . "persona.fecha_nacimiento,persona.dni,persona.estado,persona.id_sexo, "
             . "usuario.id_usuario, usuario.username, usuario.password,"
             . "usuario.id_perfil "
             . "FROM usuario "
             . "JOIN persona ON persona.id_persona = usuario.id_persona "
             . "WHERE username = '{$username}' and password = '{$password}' and persona.estado=1";

    	$database = new MySQL();
    	$datos = $database->consultar($sql);


    	if ($datos->num_rows> 0){
    		$registro = $datos->fetch_assoc();
			$user = self::_crearUsuario($registro);
			$user->_estaLogueado = true;

    	} else {
    		$user = new Usuario();
    		$user->_estaLogueado = false;
    	}

		return $user;

    }

    public static function obtenerPorId($id) {
    	$sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, "
             . "persona.fecha_nacimiento,persona.dni,persona.estado,persona.id_sexo, " 
             . "usuario.id_usuario, usuario.username,usuario.password,usuario.id_perfil "
             . "FROM usuario "
             . "JOIN persona ON persona.id_persona = usuario.id_persona "
             . "WHERE id_usuario=" . $id;
        //echo ($sql);
        //exit;        
        $database = new MySQL();
        $datos = $database->consultar($sql);

        if ($datos->num_rows == 0) {
        	return false;
        }

        $registro = $datos->fetch_assoc();
    	$usuario = self::_crearUsuario($registro);
		return $usuario;

    }
    public static function obtenerPorIdPersona($idPersona){
        $sql = "SELECT * FROM usuario "
             . "WHERE usuario.id_persona = {$idPersona}";     
        //echo $sql;
        //exit; 
        
        $database = new MySQL();
        $datos = $database->consultar($sql);

        $listadoUsuarios = [];

        while ($registro = $datos->fetch_assoc()) {
            $usuario = new Usuario();
            $usuario->_idUsuario = $registro["id_usuario"];
            $usuario->_username = $registro["username"];
            $usuario->_password= $registro["password"];
            $usuario->_idPersona = $registro["id_persona"];
            $usuario->_idPerfil = $registro["id_perfil"];

            $listadoUsuarios[] = $usuario;
        }
        return $listadoUsuarios;
        }

    public function eliminar() {

        $sql = "DELETE FROM usuario WHERE id_usuario={$this->_idUsuario}";
        
        $database = new MySQL();
        $database->eliminar($sql);

        parent::eliminar();

    }
    private static function _crearUsuario($datos) {
    	$user = new Usuario();
		$user->_idUsuario = $datos["id_usuario"];
		$user->_idpersona = $datos["id_persona"];
		$user->_username = $datos["username"];
        $user->_password = $datos["password"];
		$user->_idPerfil = $datos["id_perfil"];
        $user->_nombre = $datos["nombre"];
        $user->_apellido = $datos["apellido"];
        $user->perfil = Perfil::obtenerPorId($user->_idPerfil);

		return $user;
    }
}


?>