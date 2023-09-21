<?php

namespace Model;

class Anfitrion extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'anfitriones';
    protected static $columnasDB = ['id', 'nombre', 'apellidoPat', 'apellidoMat', 'contraseña', 'genero', 'fechaInicio', 'estado', 'tipoUsuario_id', 'area_id', 'posicion_id', 'propiedad_id'];

    public $id;
    public $nombre;
    public $apellidoPat;
    public $apellidoMat;
    public $contraseña;
    public $genero;
    public $fechaInicio;
    public $estado;
    public $tipoUsuario_id;
    public $area_id;
    public $posicion_id;
    public $propiedad_id;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidoPat = $args['apellidoPat'] ?? '';
        $this->apellidoMat = $args['apellidoMat'] ?? '';
        $this->contraseña = $args['contraseña'] ?? '';
        $this->genero = $args['genero'] ?? '';
        $this->fechaInicio = $args['fechaInicio'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->tipoUsuario_id = $args['tipoUsuario_id'] ?? '0'; //Por defecto es anfitrión
        $this->area_id = $args['area_id'] ?? '';
        $this->posicion_id = $args['posicion_id'] ?? '';
        $this->propiedad_id = $args['propiedad_id'] ?? '';
    }

    //Mensajes de validación para la creación de nuevos Anfitriones
    public function valdarNuevoUsuario() {

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