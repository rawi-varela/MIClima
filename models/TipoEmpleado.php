<?php

namespace Model;

class TipoEmpleado extends ActiveRecord {
    protected static $tabla = 'tipoEmpleado';
    protected static $columnasDB = ['id', 'tipo'];

    public $id;
    public $tipo;

    public function __construct()
    {
        $this->id = $args['id'] ?? null;
        $this->tipo = $args['tipo'] ?? '';
    }

}