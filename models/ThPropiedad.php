<?php

namespace Model;

class ThPropiedad extends ActiveRecord {
    protected static $tabla = 'thPropiedad';
    protected static $columnasDB = ['propiedad_id', 'anfitriones_id']; //No es necesario guardar ID, evitar problemas

    // public $id;
    public $propiedad_id;
    public $anfitriones_id;

    public function __construct()
    {
        // $this->id = $args['id'] ?? null;
        $this->propiedad_id = $args['propiedad_id'] ?? '';
        $this->anfitriones_id = $args['anfitriones_id'] ?? '';
    }

    public function validar(){
        if(!$this->propiedad_id) {
            self::$alertas['error'][] = 'Selecciona una Propiedad';
        }
        //Faltaría Seleccionar las Propiedades con privilegios

        return self::$alertas;
    }

}