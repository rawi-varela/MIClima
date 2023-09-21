<?php

namespace Model;

class Admin extends ActiveRecord {
    protected static $tabla = 'admin';
    protected static $columnasDB = ['id', 'contraseña', 'name', 'tipoUsuario_id'];

    public $id;
    public $contraseña;
    public $name;
    public $tipoUsuario_id;

    public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->contraseña = $args['contraseña'] ?? '';
      $this->name = $args['name'] ?? '';
      $this->tipoUsuario_id = $args['tipoUsuario_id'] ?? ''; 
    } 

    public function comprobarPasswordAdmin($contraseña) {
        $resultado = password_verify($contraseña, $this->contraseña);
        
        if(!$resultado) {
            self::$alertas['error'][] = 'Contraseña Incorrecta';
        } else {
            return true;
        }
    }


}