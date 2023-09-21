<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class AdminController {
    public static function admin( Router $router) {
        session_start();
        isAdmin();
        
        $router->render('admin/index', [

        ]);
    }
}



