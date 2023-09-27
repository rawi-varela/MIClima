<?php

namespace Model;

class Posicion extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'posicion';
    protected static $columnasDB = ['id', 'nombrePosicion', 'area_id', 'tipoEmpleado_id', 'tipoEmpleado', 'area', 'propiedad'];

    public $id;
    public $nombrePosicion;
    public $area_id;
    public $tipoEmpleado_id;
    public $tipoEmpleado;
    public $area;
    public $propiedad;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombrePosicion = $args['nombrePosicion'] ?? '';
        $this->area_id = $args['area_id'] ?? '';
        $this->tipoEmpleado_id = $args['tipoEmpleado_id'] ?? '';
        $this->tipoEmpleado = $args['tipoEmpleado'] ?? '';
        $this->area = $args['area'] ?? '';
        $this->propiedad = $args['propiedad'] ?? '';
    }



}