<?php

namespace Controllers;

use MVC\Router;
USE Model\Anfitrion;

class LiderController {
    // public static function lider(Router $router) {
    //     session_start();
    //     isAuthALider();

    //     $anfitriones = Anfitrion::all(); //Consulta BD Todos los anfitriones
        
    //     $router->render('lider/index', [
    //         'anfitriones' => $anfitriones
    //     ]);
    // }
    
    public static function evaluar(Router $router) {
        $id = validarORedireccionar('/index'); //Redireccionar

        // Obtener los datos del anfitrion
        $anfitrion = Anfitrion::find($id);

        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Validaciones del formulario de evaluacion
        }

        $router->render('lider/evaluacion', [
            'anfitrion' => $anfitrion
        ]);
    }

    public static function historial(Router $router) {
        $id = validarORedireccionar('/index'); //Redireccionar

        // Obtener los datos del anfitrion
        $anfitrion = Anfitrion::find($id);


        $router->render('lider/historial', [
            'anfitrion' => $anfitrion
        ]);
    }
}