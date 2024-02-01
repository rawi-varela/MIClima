<?php

namespace Controllers;

use Model\Area;
use MVC\Router;
use Model\Posicion;
use Model\Anfitrion;
use Model\Propiedad;
use Model\ThPropiedad;
use Model\EstadoUsuario;
use Model\AnfitrionRelacional;

class AnfitrionRelacionalController {
    public static function anfitrionesCompletos( Router $router) {
        if(!is_th()) {
            header('Location: /login');
        }

        $anfitriones = allAnfitriones('estadoUsuario_id', 1);

        //Consultar Área y Posición para los Select en th-administrar-anfitriones
        //Corregir, ya no servirá el all 26/09
        $estados = EstadoUsuario::all();
        $areas = Area::all();
        $posiciones = Posicion::all();
        $propiedades = Propiedad::all();
        
        $router->render('th/contentAnfitriones', [
            'anfitriones' => $anfitriones,
            'estados' => $estados,
            'areas' => $areas,
            'posiciones' => $posiciones,
            'propiedades' => $propiedades
        ]); 
    }

}


