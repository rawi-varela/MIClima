<?php

namespace Model;

class Area extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'area';
    protected static $columnasDB = ['id', 'nombreArea', 'propiedad_id', 'propiedad'];

    public $id;
    public $nombreArea;
    public $propiedad_id;
    public $propiedad;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombreArea = $args['nombreArea'] ?? '';
        $this->propiedad_id = $args['propiedad_id'] ?? '';
        $this->propiedad = $args['propiedad'] ?? '';
    }



}