<?php

namespace Model;

class Propiedad extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'propiedad';
    protected static $columnasDB = ['id', 'nombrePropiedad'];

    public $id;
    public $nombrePropiedad;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombrePropiedad = $args['nombrePropiedad'] ?? '';
    }



}