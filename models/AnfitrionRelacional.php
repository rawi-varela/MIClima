<?php

namespace Model;

class AnfitrionRelacional extends ActiveRecord {
    protected static $tabla = 'anfitrion';
    protected static $columnasDB = ['id', 'nombre', 'apellidoPat', 'apellidoMat', 'genero', 'fechaInicio', 'estado', 'area', 'posicion', 'propiedad'];

    public $id;
    public $nombre;
    public $apellidoPat;
    public $apellidoMat;
    public $genero;
    public $fechaInicio;
    public $estado;
    public $area;
    public $posicion;
    public $propiedad;

    public function __construct()
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidoPat = $args['apellidoPat'] ?? '';
        $this->apellidoMat = $args['apellidoMat'] ?? '';
        $this->genero = $args['genero'] ?? '';
        $this->fechaInicio = $args['fechaInicio'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->area = $args['area'] ?? '';
        $this->posicion = $args['posicion'] ?? '';
        $this->propiedad = $args['propiedad'] ?? '';
    }
    
}