<?php

namespace Model;

class Competencias extends ActiveRecord {
    protected static $tabla = 'competencias';
    protected static $columnasDB = ['id', 'competencia', 'rubros_id'];

    public $id;
    public $competencia;
    public $rubros_id;

    public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->competencia = $args['competencia'] ?? '';
      $this->rubros_id = $args['rubros_id'] ?? '';
    } 

}