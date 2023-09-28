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
        isAuth();

        // Consultar la base de datos
        $consulta = "SELECT anfitriones.id, anfitriones.nombre, anfitriones.apellidoPat, anfitriones.apellidoMat, anfitriones.genero, anfitriones.fechaInicio, estadoUsuario.estado, ";
        $consulta .= " area.nombreArea as area, posicion.nombrePosicion as posicion, propiedad.nombrePropiedad as propiedad ";
        $consulta .= " FROM anfitriones ";
        $consulta .= " LEFT OUTER JOIN estadoUsuario ";
        $consulta .= " ON estadoUsuario.id=anfitriones.estadoUsuario_id ";
        $consulta .= " LEFT OUTER JOIN posicion ";
        $consulta .= " ON posicion.id=anfitriones.posicion_id ";
        $consulta .= " LEFT OUTER JOIN area ";
        $consulta .= " ON area.id=posicion.area_id ";
        $consulta .= " LEFT OUTER JOIN propiedad ";
        $consulta .= " ON propiedad.id=area.propiedad_id ";

        if(array_key_exists('th', $_SESSION)){ //Si el User es TH va a validar la propiedad
            $consulta .= " WHERE propiedad_id = $_SESSION[propiedad]";
        }

        $anfitriones = AnfitrionRelacional::SQL($consulta);

        //Consultar Área y Posición para los Select en th-administrar-anfitriones
        //Corregir, ya no servirá el all 26/09
        $areas = Area::all();
        $posiciones = Posicion::all();
        $propiedades = Propiedad::all();

        if(array_key_exists('lider', $_SESSION)){
            $router->render('lider/index', [
                'anfitriones' => $anfitriones
            ]);
        } else if(array_key_exists('th', $_SESSION)) {
            $router->render('th/contentAnfitriones', [
                'anfitriones' => $anfitriones,
                'areas' => $areas,
                'posiciones' => $posiciones,
                'propiedades' => $propiedades
            ]);
        } else if(array_key_exists('admin', $_SESSION)) {
            $router->render('admin/index', [
                'anfitriones' => $anfitriones,
                'areas' => $areas,
                'posiciones' => $posiciones,
                'propiedades' => $propiedades
            ]);
        }
    }
}


