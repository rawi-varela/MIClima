<?php

namespace Controllers;

use Model\Modelo;
use Model\Rubros;
use Model\Competencias;

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


}
