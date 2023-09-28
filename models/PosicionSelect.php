<?php

namespace Model;

class PosicionSelect extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'posicion';
    protected static $columnasDB = ['id', 'nombrePosicion', 'tipo', 'area', 'propiedad'];

    public $id;
    public $nombrePosicion;
    public $tipo;
    public $area;
    public $propiedad;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombrePosicion = $args['nombrePosicion'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->area = $args['area'] ?? '';
        $this->propiedad = $args['propiedad'] ?? '';
    }

}