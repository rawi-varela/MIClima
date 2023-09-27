<?php

namespace Model;

class Propiedad extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'propiedad';
    protected static $columnasDB = ['id', 'nombrePropiedad', 'imagen', 'tipo'];

    public $id;
    public $nombrePropiedad;
    public $imagen;
    public $tipo;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombrePropiedad = $args['nombrePropiedad'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
    }



}