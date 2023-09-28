<?php

namespace Model;

class Area extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'area';
    protected static $columnasDB = ['id', 'nombreArea', 'propiedad_id'];

    public $id;
    public $nombreArea;
    public $propiedad_id;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombreArea = $args['nombreArea'] ?? '';
        $this->propiedad_id = $args['propiedad_id'] ?? '';
    }

    public function validar() {
        if(!$this->id) {
            self::$alertas['error'][] = 'El ID del Área es Obligatorio';
        }
        if(!$this->nombreArea) {
            self::$alertas['error'][] = 'El nombre del Área es Obligatorio';
        }
        if(!$this->propiedad_id) {
            self::$alertas['error'][] = 'Selecciona una Propiedad';
        }

        return self::$alertas;
    }

}