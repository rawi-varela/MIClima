<?php

namespace Model;

class Modelo extends ActiveRecord {
    protected static $tabla = 'modelo';
    protected static $columnasDB = ['id', 'tipoCompetencia'];

    public $id;
    public $tipoCompetencia;

    public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->tipoCompetencia = $args['tipoCompetencia'] ?? '';
    } 

}