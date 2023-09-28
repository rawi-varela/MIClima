<?php

namespace Model;

class TipoPropiedad extends ActiveRecord {
    protected static $tabla = 'tipoPropiedad';
    protected static $columnasDB = ['id', 'tipo'];

    public $id;
    public $tipo;

    public function __construct()
    {
        $this->id = $args['id'] ?? null;
        $this->tipo = $args['tipo'] ?? '';
    }

}