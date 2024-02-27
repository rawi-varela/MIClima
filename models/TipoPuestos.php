<?php

namespace Model;

class TipoPuestos extends ActiveRecord {
    protected static $tabla = 'tipoPuestos';
    protected static $columnasDB = ['id', 'tipoPuesto'];

    public $id;
    public $tipoPuesto;

    public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->tipoPuesto = $args['tipoPuesto'] ?? '';
    } 

}