<?php

namespace Model;

class Rubros extends ActiveRecord {
    protected static $tabla = 'rubros';
    protected static $columnasDB = ['id', 'rubro', 'modelo_id'];

    public $id;
    public $rubro;
    public $modelo_id;

    public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->rubro = $args['rubro'] ?? '';
      $this->modelo_id = $args['modelo_id'] ?? '';
    } 

}