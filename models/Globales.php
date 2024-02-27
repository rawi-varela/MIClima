<?php

namespace Model;

class Globales extends ActiveRecord {
    protected static $tabla = 'globales';
    protected static $columnasDB = ['id', 'cantidad', 'porcentaje', 'cp1', 'cp2', 'cp3', 'cp4', 'cp5', 'cp6', 'cp7', 'cp8', 'cp9', 'cp10', 'cp11', 'cp12', 'periodos_id'];

    public $id;
    public $cantidad;
    public $porcentaje;
    public $cp1;
    public $cp2;
    public $cp3;
    public $cp4;
    public $cp5;
    public $cp6;
    public $cp7;
    public $cp8;
    public $cp9;
    public $cp10;
    public $cp11;
    public $cp12;
    public $periodos_id;

    public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->cantidad = $args['cantidad'] ?? '';
      $this->porcentaje = $args['porcentaje'] ?? '';
      $this->cp1 = $args['cp1'] ?? '';
      $this->cp2 = $args['cp2'] ?? '';
      $this->cp3 = $args['cp3'] ?? '';
      $this->cp4 = $args['cp4'] ?? '';
      $this->cp5 = $args['cp5'] ?? '';
      $this->cp6 = $args['cp6'] ?? '';
      $this->cp7 = $args['cp7'] ?? '';
      $this->cp8 = $args['cp8'] ?? '';
      $this->cp9 = $args['cp9'] ?? '';
      $this->cp10 = $args['cp10'] ?? '';
      $this->cp11 = $args['cp11'] ?? '';
      $this->cp12 = $args['cp12'] ?? '';
      $this->periodos_id = $args['periodos_id'] ?? '';
    } 

}