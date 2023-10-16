<?php

namespace Controllers;

use Model\Area;
use Model\Modelo;
use Model\Rubros;
use Model\Competencias;
use Model\Posicion;
use Model\Propiedad;

class APICompetencias {
    public static function index() {
        //ID DEL TIPLO DE EMPLEADO
        // $tipoEmpleado = $_SESSION['tipoEmpleado_id'];

        // Obtener los medelos
        $modelos = Modelo::all();
        $rubros = Rubros::all();
        $competencias = Competencias::all();
        
        // Crear un array que contenga todas las entidades
        $data = [
            'modelos' => $modelos,
            'rubros' => $rubros,
            'competencias' => $competencias
        ];

        // Enviar la respuesta JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    // public static function puestos() {
    //     $propiedades = Propiedad::all();
    //     $areas = Area::all();
        
    //     // Crear un array que contenga todas las entidades
    //     $data = [
    //         'propiedades' => $propiedades,
    //         'areas' => $areas,
    //     ];

    //     // Enviar la respuesta JSON
    //     header('Content-Type: application/json');
    //     echo json_encode($data);  
    // }

    // public static function propiedades() {
    //     $propiedades = Propiedad::all('tipoPropiedad_id', 1);

    //     // Enviar la respuesta JSON
    //     header('Content-Type: application/json');
    //     echo json_encode($propiedades);  
    // }

}
