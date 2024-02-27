<?php

namespace Model;

class Departamentos extends ActiveRecord {
    protected static $tabla = 'departamentos';
    protected static $columnasDB = ['id', 'nombreDepartamento', 'cantidad', 'propiedades_id'];

    public $id;
    public $nombreDepartamento;
    public $cantidad;
    public $propiedades_id;

    public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->nombreDepartamento = $args['nombreDepartamento'] ?? '';
      $this->cantidad = $args['cantidad'] ?? '';
      $this->propiedades_id = $args['propiedades_id'] ?? '';
    } 

  public function validar() {
    if(!$this->id) {
      self::$alertas['error'][] = 'El ID del Departamento es Obligatorio';
    }
    if(!$this->nombreDepartamento) {
      self::$alertas['error'][] = 'El nombre del Departamento es Obligatorio';
    }
    // if(!$this->cantidad) {
    //   self::$alertas['error'][] = 'El número de Anfitriones es Obligatorio';
    // }
    if(!filter_var($this->cantidad, FILTER_VALIDATE_INT) || $this->cantidad <= 0) {
      self::$alertas['error'][] = 'Ingresa un número de Anfitriones válido';
    }
    if(!$this->propiedades_id) {
      self::$alertas['error'][] = 'Selecciona una Propiedad';
    }

    return self::$alertas;
  }

}