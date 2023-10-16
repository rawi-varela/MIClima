<?php

namespace Controllers;

use Model\Propiedad;
use Model\Area;
use Model\Posicion;

class APIController {
    public static function index() {
        // Obtener todas las Propiedades, Áreas y Posiciones
        $propiedades = Propiedad::all();
        $areas = Area::all();
        $posiciones = Posicion::all();
        
        // Crear un array que contenga todas las entidades
        $data = [
            'propiedades' => $propiedades,
            'areas' => $areas,
            'posiciones' => $posiciones
        ];

        // Enviar la respuesta JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public static function puestos() {
        $propiedades = Propiedad::all();
        $areas = Area::all();
        
        // Crear un array que contenga todas las entidades
        $data = [
            'propiedades' => $propiedades,
            'areas' => $areas,
        ];

        // Enviar la respuesta JSON
        header('Content-Type: application/json');
        echo json_encode($data);  
    }

    public static function propiedades() {
        $propiedades = Propiedad::all('tipoPropiedad_id', 1);

        // Enviar la respuesta JSON
        header('Content-Type: application/json');
        echo json_encode($propiedades);  
    }

}
