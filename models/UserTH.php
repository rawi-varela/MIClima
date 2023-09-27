<?php

namespace Model;

class UserTH extends ActiveRecord {
    protected static $tabla = 'propiedad';
    protected static $columnasDB = ['id', 'privilegios'];

    public $id;
    public $privilegios;

    public function __construct()
    {
        $this->id = $args['id'] ?? null;
        $this->privilegios = $args['privilegios'] ?? '';
    }

}