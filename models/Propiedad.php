<?php

namespace Model;

class Propiedad extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'propiedad';
    protected static $columnasDB = ['id', 'nombrePropiedad', 'imagen', 'tipoPropiedad_id'];

    public $id;
    public $nombrePropiedad;
    public $imagen;
    public $tipoPropiedad_id;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombrePropiedad = $args['nombrePropiedad'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->tipoPropiedad_id = $args['tipoPropiedad_id'] ?? '';
    }

    public function validar() {
        if(!$this->id) {
            self::$alertas['error'][] = 'El ID de la Propiedad es Obligatorio';
        }
        if(!$this->nombrePropiedad) {
            self::$alertas['error'][] = 'El nombre de la Propiedad es Obligatorio';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'La imagen es Obligatoria';
        }
        if(!$this->tipoPropiedad_id) {
            self::$alertas['error'][] = 'Selecciona el tipo de Propiedad';
        }

        return self::$alertas;
    }


}