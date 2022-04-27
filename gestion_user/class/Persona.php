<?php

require_once "MySQL.php";


class Persona {

    protected $_idPersona;
    protected $_nombre;
    protected $_apellido;
    protected $_fechaNacimiento;
    protected $_dni;
    protected $_estado;
    protected $_idSexo;

    /**
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->_idPersona;
    }

    /**
     * @param mixed $_idPersona
     *
     * @return self
     */
    public function setIdPersona($_idPersona)
    {
        $this->_idPersona = $_idPersona;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->_nombre;
    }

    /**
     * @param mixed $_nombre
     *
     * @return self
     */
    public function setNombre($_nombre)
    {
        $this->_nombre = $_nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->_apellido;
    }

    /**
     * @param mixed $_apellido
     *
     * @return self
     */
    public function setApellido($_apellido)
    {
        $this->_apellido = $_apellido;

        return $this;
    }
    public function getFechaNacimiento()
    {
        return $this->_fechaNacimiento;
    }

    public function setFechaNacimiento($_fechaNacimiento)
    {
        $this->_fechaNacimiento = $_fechaNacimiento;

        return $this;
    }
    public function getDni() {
        return $this->_dni;
    }
    public function setDni($_dni)
    {
        $this->_dni = $_dni;
    }
    public function getEstado() {
        return $this->_estado;
    }
    public function setEstado($_estado)
    {
        $this->_estado= $_estado;
    }

    public function setSexo($sexo)
    {
        $this->_idSexo = $sexo;
    }

    public function getIdSexo() {
        return $this->_idSexo;
    }

    public function guardar() {
        $database = new MySQL();
        //guardar la persona
        $sql= "INSERT INTO `persona`" 
                ."(`id_persona`, `nombre`, `apellido`, `fecha_nacimiento`,`dni`,`estado`,`id_sexo`)" 
                ."VALUES (NULL,'{$this->_nombre}','{$this->_apellido}','{$this->_fechaNacimiento}','{$this->_dni}','{$this->_estado}','{$this->_idSexo}')";
        $idPersona = $database->insertar($sql);

        $this->_idPersona = $idPersona;
    }

    public function actualizar() {
        $sql = "UPDATE persona SET nombre = '{$this->_nombre}', apellido = '{$this->_apellido}', "
             . "fecha_nacimiento = '{$this->_fechaNacimiento}',dni = '{$this->_dni}',"
             . " estado = '{$this->_estado}', id_sexo = {$this->_idSexo} "
             . "WHERE persona.id_persona = {$this->_idPersona}";

        $database = new MySQL();
        $database->actualizar($sql);
    }

    public function eliminar() {

        $sql = "DELETE FROM persona WHERE id_persona={$this->_idPersona}";
        
        $database = new MySQL();
        $database->eliminar($sql);

    }

    public function __toString() {
        return "{$this->_apellido}, {$this->_nombre}";
        // return $this->_apellido . ", " . $this->_nombre;
    }
}
    


?>