<?php

namespace Model;

class Area extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'area';
    protected static $columnasDB = ['id', 'nombreArea'];

    public $id;
    public $nombreArea;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombreArea = $args['nombreArea'] ?? '';
    }



}