<?php

namespace Model;

class Anfitrion extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'anfitriones';
    protected static $columnasDB = ['id', 'nombre', 'apellidoPat', 'apellidoMat', 'contraseña', 'fechaInicio', 'tipoUsuario_id', 'estadoUsuario_id', 'posicion_id'];

    public $id;
    public $nombre;
    public $apellidoPat;
    public $apellidoMat;
    public $contraseña;
    public $fechaInicio;
    public $tipoUsuario_id;
    public $estadoUsuario_id;
    public $posicion_id;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidoPat = $args['apellidoPat'] ?? '';
        $this->apellidoMat = $args['apellidoMat'] ?? '';
        $this->contraseña = $args['contraseña'] ?? '';
        $this->fechaInicio = $args['fechaInicio'] ?? '';
        $this->tipoUsuario_id = $args['tipoUsuario_id'] ?? '';
        $this->estadoUsuario_id = $args['estadoUsuario_id'] ?? '';
        $this->posicion_id = $args['posicion_id'] ?? '';
    }

    //Mensajes de validación para la creación de nuevos Anfitriones
    public function validar() {
        if(!$this->id) {
            self::$alertas['error'][] = 'El ID del Anfitrión es Obligatorio';
        }
        if(strlen($this->id) != 13) {
            self::$alertas['error'][] = 'El ID del Anfitrión debe ser de 13 caracteres';
        }
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre del Anfitrión es Obligatorio';
        }
        if(!$this->apellidoPat) {
            self::$alertas['error'][] = 'El Apellido Paterno del Anfitrión es Obligatorio';
        }
        if(!$this->apellidoMat) {
            self::$alertas['error'][] = 'El Apellido Materno del Anfitrión es Obligatorio';
        }
        if(!$this->contraseña) {
            self::$alertas['error'][] = 'La contraseña del Anfitrión es Obligatorio';
        }
        if(!$this->fechaInicio) {
            self::$alertas['error'][] = 'Ingresa la Fecha de Inicio';
        }
        if(!$this->tipoUsuario_id) {
            self::$alertas['error'][] = 'Selecciona el Tipo de Anfitrión';
        }
        if(!$this->estadoUsuario_id) {
            self::$alertas['error'][] = 'Selecciona el Estado del Anfitrión';
        }
        if(!$this->posicion_id) {
            self::$alertas['error'][] = 'Selecciona el Puesto del Anfitrión';
        }
        //Faltaría Seleccionar las Propiedades con privilegios

        return self::$alertas;
    }

    // Validar inicio de sesión
    public function validarLogin() {
        if(!$this->id) {
            self::$alertas['error'][] = 'El Nombre de usuario es Obligatorio';
        }
        if(!$this->contraseña) {
            self::$alertas['error'][] = 'La contraseña es Obligatoria';
        }

        return self::$alertas;
    }

    // Revisa si el usuario ya existe
    public function existeUsuario() {
        $query = " SELECT * FROM " . self::$tabla . " WHERE id = '" . $this->id . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            self::$alertas['error'][] = 'El Anfitrión ya está registrado';
        }

        return $resultado;
    }

    public function hashPassword() {
        $this->contraseña = password_hash($this->contraseña, PASSWORD_BCRYPT);
    }

    public function comprobarPassword($contraseña) {
        $resultado = password_verify($contraseña, $this->contraseña);
        
        if(!$resultado) {
            self::$alertas['error'][] = 'Contraseña Incorrecta';
        } else {
            return true;
        }
    }

}