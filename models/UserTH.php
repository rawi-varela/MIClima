<?php

namespace Model;

class UserTH extends ActiveRecord {
    protected static $tabla = 'thPropiedad';
    protected static $columnasDB = ['id', 'propiedad_id', 'anfitriones_id'];

    public $id;
    public $propiedad_id;
    public $anfitriones_id;

    public function __construct()
    {
        $this->id = $args['id'] ?? null;
        $this->propiedad_id = $args['propiedad_id'] ?? '';
        $this->anfitriones_id = $args['anfitriones_id'] ?? '';
    }

}