<?php

namespace Model;

class NivelEsperado extends ActiveRecord {
    protected static $tabla = 'nivelEsperado';
    protected static $columnasDB = ['id', 'generico', 'esperadoCompromiso', 'esperadoIntegridad', 'esperadoPasion', 'esperadoSinergia', 'esperadoMaestria', 'esperadoComunicacion', 'jefeSupervisor', 'gerenteDirector', 'funcionesEspArea', 'posicion_id'];

    public $id;
    public $generico;
    public $esperadoCompromiso;
    public $esperadoIntegridad;
    public $esperadoPasion;
    public $esperadoSinergia;
    public $esperadoMaestria;
    public $esperadoComunicacion;
    public $jefeSupervisor;
    public $gerenteDirector;
    public $funcionesEspArea;
    public $posicion_id;

    public function __construct($args = []) {
      $this->id = $args['id'] ?? null;
      $this->generico = $args['generico'] ?? '';
      $this->esperadoCompromiso = $args['esperadoCompromiso'] ?? '';
      $this->esperadoIntegridad = $args['esperadoIntegridad'] ?? '';
      $this->esperadoPasion = $args['esperadoPasion'] ?? '';
      $this->esperadoSinergia = $args['esperadoSinergia'] ?? '';
      $this->esperadoMaestria = $args['esperadoMaestria'] ?? '';
      $this->esperadoComunicacion = $args['esperadoComunicacion'] ?? '';
      $this->jefeSupervisor = $args['jefeSupervisor'] ?? '';
      $this->gerenteDirector = $args['gerenteDirector'] ?? '';
      $this->funcionesEspArea = $args['funcionesEspArea'] ?? '';
      $this->posicion_id = $args['posicion_id'] ?? '';
    } 

}