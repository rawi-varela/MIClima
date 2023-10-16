<?php

namespace Controllers;
use MVC\Router;

class PaginasController {
    public static function index( Router $router) {

        $inicio = true;

        $router->render('paginas/index', [
            'inicio' => $inicio
        ]);
    }

    public static function us( Router $router) {
        $router->render('paginas/nosotros', [

        ]);
    }

    public static function error(Router $router) {

        $router->render('paginas/error', [
            'titulo' => 'Página no encontrada'
        ]);
    }

    // public static function admin( Router $router) {
    //     $router->render('paginas/usuario', [

    //     ]);
    // }
}