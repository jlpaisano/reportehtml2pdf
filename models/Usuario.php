<?php
require_once 'ModeloBase.php';

class Usuario extends ModeloBase {
    public $nombre;
    public $apodo;
    public $email;
    public $password;

    public function __construct() {
        parent::__construct();
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApodo() {
        return $this->apodo;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApodo($apodo) {
        $this->apodo = $apodo;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function guardarUsuario($datos) {
        $insertar = $this->insertar('usuarios', $datos);

        if($insertar) {
            $_SESSION['mensaje'] = "Registro exitoso";
        }        
    }

    function accesoUsuario($apodo, $password) {
        $query = "SELECT * FROM usuarios WHERE apodo = '" . $apodo . "' AND password = '"
                . $password . "'";

        #echo $query;
        return $respuesta =  $this->consultarRegistro($query);

        #var_dump($respuesta);
        #return $respuesta;
        
    }

}

?>