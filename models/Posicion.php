<?php

namespace Model;

class Posicion extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'posicion';
    protected static $columnasDB = ['id', 'nombrePosicion', 'area_id', 'tipoEmpleado_id'];

    public $id;
    public $nombrePosicion;
    public $area_id;
    public $tipoEmpleado_id;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombrePosicion = $args['nombrePosicion'] ?? '';
        $this->area_id = $args['area_id'] ?? '';
        $this->tipoEmpleado_id = $args['tipoEmpleado_id'] ?? '';
    }

    public function validar() {
        if(!$this->id) {
            self::$alertas['error'][] = 'El ID del Puesto es Obligatorio';
        }
        if(!$this->nombrePosicion) {
            self::$alertas['error'][] = 'El nombre del Puesto es Obligatorio';
        }
        if(!$this->area_id) {
            self::$alertas['error'][] = 'Selecciona una Propiedad';
        }
        if(!$this->tipoEmpleado_id) {
            self::$alertas['error'][] = 'Selecciona un tipo de Empleado';
        }

        return self::$alertas;
    }

}