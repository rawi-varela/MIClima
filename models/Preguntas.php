<?php

namespace Model;

class Preguntas extends ActiveRecord {
    protected static $tabla = 'preguntas';
    protected static $columnasDB = ['id', 'pregunta'];

    public $id;
    public $pregunta;

    public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->pregunta = $args['pregunta'] ?? '';
    } 

}