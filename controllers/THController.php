<?php

namespace Controllers;

use MVC\Router;

class THController {

    public static function th( Router $router ) {
        session_start();
        isAuth();

        //Seria un find, para obtener el id de la propiedad con ese se establecen lso permisos

        
        $router->render('th/index', [
        ]);
    }
    
}