<?php

namespace Controllers;

use Model\AnfitrionRelacional;
use Model\Area;
use Model\Posicion;
use Model\Propiedad;
use MVC\Router;

class AnfitrionRelacionalController {
    public static function anfitrionesCompletos( Router $router) {
        session_start();
        // isAuthALider();

        // Consultar la base de datos
        $consulta = "SELECT anfitriones.id, anfitriones.nombre, anfitriones.apellidoPat, anfitriones.apellidoMat, anfitriones.genero, anfitriones.fechaInicio, anfitriones.estado, ";
        $consulta .= " area.nombreArea as area, posicion.nombrePosicion as posicion, propiedad.nombrePropiedad as propiedad ";
        $consulta .= " FROM anfitriones ";
        $consulta .= " LEFT OUTER JOIN area ";
        $consulta .= " ON anfitriones.area_id=area.id ";
        $consulta .= " LEFT OUTER JOIN posicion ";
        $consulta .= " ON posicion.id=anfitriones.posicion_id ";
        $consulta .= " LEFT OUTER JOIN propiedad ";
        $consulta .= " ON propiedad.id=anfitriones.propiedad_id ";

        if(array_key_exists('th', $_SESSION)){ //Si el User es TH va a validar la propiedad
            $consulta .= " WHERE propiedad_id = $_SESSION[propiedad]";
        }

        $anfitriones = AnfitrionRelacional::SQL($consulta);

        //Consultar Área y Posición para los Select en th-administrar-anfitriones
        $areas = Area::all();
        $posiciones = Posicion::all();
        $propiedades = Propiedad::all();

        if(array_key_exists('lider', $_SESSION)){
            $router->render('lider/index', [
                'anfitriones' => $anfitriones
            ]);
        } else {
            $router->render('th/contentAnfitriones', [
                'anfitriones' => $anfitriones,
                'areas' => $areas,
                'posiciones' => $posiciones,
                'propiedades' => $propiedades
            ]);
        }
    }
}


