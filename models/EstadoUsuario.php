<?php

namespace Model;

class EstadoUsuario extends ActiveRecord {
    protected static $tabla = 'estadoUsuario';
    protected static $columnasDB = ['id', 'estado'];

    public $id;
    public $estado;

    public function __construct()
    {
        $this->id = $args['id'] ?? null;
        $this->estado = $args['estado'] ?? '';
    }

}