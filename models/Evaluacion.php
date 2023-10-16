<?php

namespace Model;

class Evaluacion extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'evaluacion';
    protected static $columnasDB = ['id', 'año', 'calificacionFF', 'desviacionFF', 'calificacionEspArea', 'desviacionEspAre', 'imagen', 'anfitriones_id'];

    public $id;
    public $año;
    public $calificacionFF;
    public $desviacionFF;
    public $calificacionEspArea;
    public $desviacionEspAre;
    public $imagen;
    public $anfitriones_id;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->año = $args['año'] ?? '';
        $this->calificacionFF = $args['calificacionFF'] ?? '';
        $this->desviacionFF = $args['desviacionFF'] ?? '';
        $this->calificacionEspArea = $args['calificacionEspArea'] ?? '';
        $this->desviacionEspAre = $args['desviacionEspAre'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->anfitriones_id = $args['anfitriones_id'] ?? '';
    }

   
}