<?php

namespace Model;

class Posicion extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'posicion';
    protected static $columnasDB = ['id', 'nombrePosicion'];

    public $id;
    public $nombrePosicion;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombrePosicion = $args['nombrePosicion'] ?? '';
    }



}