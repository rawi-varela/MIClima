<?php

namespace Controllers;

use MVC\Router;
USE Model\Anfitrion;
use Model\Admin;

class LoginController {
    public static function login( Router $router) {
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Anfitrion($_POST); //Nueva instancia con lo que haya en POST (No necesaria instancia de ADMIN)
            $alertas = $auth->validarLogin(); //Retornar errores

            if(empty($alertas)) {
                //Comprobar que existe usuario
                $usuario = Anfitrion::where('id', $auth->id);

                //Comprobar que existe Admin
                $admin = Admin::where('id', $auth->id);

                if($usuario) { //Usuario Existe
                    // Verificar el password
                    if( $usuario->comprobarPassword($auth->contraseña) ) {
                        // Autenticar el usuario
                        session_start();

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellidoPat . " " . $usuario->apellidoMat;
                        $_SESSION['propiedad'] = $usuario->propiedad_id;
                        $_SESSION['posicion'] = $usuario->posicion_id;
                        $_SESSION['area'] = $usuario->area_id;
                        $_SESSION['login'] = true;

                        
                        // Redireccionamiento
                        if($usuario->tipoUsuario_id === "1") {
                            $_SESSION['lider'] = $usuario->tipoUsuario_id ?? null;
                            header('Location: /lider-perfil');
                        }
                        else if($usuario->tipoUsuario_id === "2") {
                            $_SESSION['th'] = $usuario->tipoUsuario_id ?? null;
                            header('Location: /th-perfil');
                        }  else {
                            $_SESSION['anfitrion'] = $usuario->tipoUsuario_id ?? null;
                            header('Location: /anfitrion-perfil');
                        }
                        
                    }
                }
                else if ($admin) { // Admin Existe
                     // Verificar el password
                     if( $admin->comprobarPasswordAdmin($auth->contraseña) ) {
                        // Autenticar al Admin
                        session_start();

                        $_SESSION['id'] = $admin->id;
                        $_SESSION['administrador'] = $admin->name;
                        $_SESSION['admin'] = true; 

                        header('Location: /admin');
                     }
                }else {
                    Anfitrion::setAlerta('error', 'Usuario no encontrado');
                }
            }
        }

        $alertas = Anfitrion::getAlertas();
        
        $router->render('auth/login', [
            'alertas' => $alertas
        ]);
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }

}