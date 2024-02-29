<?php

namespace Controllers;

use Model\Departamentos;

class APIController {
   
    //
    public static function departamentos() {
        $departamentos = departamentos::all();
        
        // Crear un array que contenga todas las entidades
        $data = [
            'departamentos' => $departamentos
        ];

        // Enviar la respuesta JSON
        header('Content-Type: application/json');
        echo json_encode($data);  
    }



    // public static function ejemplo() {
    //     // Asegúrate de obtener el ID de la propiedad desde la solicitud
    //     $propiedades_id = $_GET['propiedades_id'] ?? null;

    //     if ($propiedades_id) {
    //         // Filtrar los departamentos basándose en la propiedad seleccionada
    //         $areas = Departamentos::all('propiedades_id', $propiedades_id);
    //     } else {
    //         // Si no se proporciona una propiedades_id, podrías decidir devolver todos los departamentos o una respuesta vacía
    //         $areas = [];
    //     }

    //     // Enviar la respuesta JSON
    //     header('Content-Type: application/json');
    //     echo json_encode($areas);  
    // }  

}
    


