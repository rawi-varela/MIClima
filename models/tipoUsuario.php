<?php

namespace Model;

class TipoUsuario extends ActiveRecord {
    protected static $tabla = 'tipoUsuario';
    protected static $columnasDB = ['id', 'usuario'];

    public $id;
    public $usuario;

    public function __construct()
    {
        $this->id = $args['id'] ?? null;
        $this->usuario = $args['usuario'] ?? '';
    }

}