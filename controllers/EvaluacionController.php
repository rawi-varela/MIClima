<?php

namespace Controllers;

use MVC\Router;
USE Model\Evaluacion;
use Model\AnfitrionRelacional;

class EvaluacionController {
    public static function anfitrion(Router $router) {
        if(!is_auth()) {
            header('Location: /login');
        }
        
        //Obtener los resultados del anfitrion evaluado
        $anfitrion = Evaluacion::find($_SESSION['id']);

        // Consultar la base de datos
        $consulta = "SELECT anfitriones.id, anfitriones.nombre, anfitriones.apellidoPat, anfitriones.apellidoMat, anfitriones.fechaInicio, anfitriones.estadoUsuario_id, ";
        $consulta .= " area.nombreArea as area, posicion.nombrePosicion as posicion, propiedad.nombrePropiedad as propiedad ";
        $consulta .= " FROM anfitriones ";
        $consulta .= " LEFT OUTER JOIN posicion ";
        $consulta .= " ON posicion.id=anfitriones.posicion_id ";
        $consulta .= " LEFT OUTER JOIN area ";
        $consulta .= " ON posicion.area_id=area.id ";
        $consulta .= " LEFT OUTER JOIN propiedad ";
        $consulta .= " ON propiedad.id=area.propiedad_id ";
        $consulta .= " WHERE anfitriones.id = '$_SESSION[id]'"; //Nuevamente me pide '' para poner como string y que funcione
        // debuguear($consulta);

        $datos = AnfitrionRelacional::SQL($consulta);
        
        $router->render('anfitrion/index', [
            'anfitrion' => $anfitrion,
            'datos' => $datos
        ]);
    }

    
}