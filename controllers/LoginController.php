<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;
use Model\Master;

class LoginController {
    public static function login( Router $router) {
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST); //Nueva instancia con lo que haya en POST (No necesaria instancia de ADMIN)
            $alertas = $auth->validarLogin(); //Retornar errores

            if(empty($alertas)) {
                //Comprobar que existe usuario
                // $usuario = Anfitrion::where('id', $auth->id);

                //Comprobar que existe Admin
                $admin = Admin::where('id', $auth->id);
                //Comprobar que existe Master 
                $master = Master::where('id', $auth->id);

                if ($admin) { // Admin Existe
                     // Verificar el password
                     if( $admin->comprobarPassword($auth->contraseña) ) {
                        // Autenticar al Admin
                        session_start();

                        $_SESSION['id'] = $admin->id;
                        $_SESSION['admin'] = true; 
                        $_SESSION['nombre'] = $admin->nombreAnfitrion;
                        $_SESSION['propiedad'] = $admin->propiedades_id; //ID de la propiedad

                        header('Location: /admin/dashboard');
                     }
                }
                else if ($master) { // Master Existe
                    // Verificar el password
                    if( $master->comprobarPasswordMaster($auth->contraseña) ) {
                       // Autenticar al Admin
                       session_start();

                       $_SESSION['id'] = $master->id;
                       $_SESSION['master'] = true; 

                       header('Location: /admin/administradores');
                    }
               }else{
                    Admin::setAlerta('error', 'Usuario no encontrado');
                }
            }
        }

        $alertas = Admin::getAlertas();
        
        $router->render('auth/login', [
            'alertas' => $alertas
        ]);
    }

    public static function logout() {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION = [];
            
            header('Location: /');
        }
    }

}