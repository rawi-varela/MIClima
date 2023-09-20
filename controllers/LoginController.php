<?php

namespace Controllers;

use MVC\Router;
USE Model\Anfitrion;

class LoginController {
    public static function login( Router $router) {
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Anfitrion($_POST); //Nueva instancia con lo que haya en POST
            $alertas = $auth->validarLogin(); //Retornar errores

            if(empty($alertas)) {
                //Comprobar que existe usuario
                $usuario = Anfitrion::where('id', $auth->id);

                if($usuario) {
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

                        // debuguear($_SESSION);
                        // Redireccionamiento
                        if($usuario->tipoUsuario === "1") {
                            $_SESSION['lider'] = $usuario->tipoUsuario ?? null;
                            header('Location: /lider-perfil');
                        }
                        else if($usuario->tipoUsuario === "2") {
                            $_SESSION['th'] = $usuario->tipoUsuario ?? null;
                            header('Location: /th-perfil');
                        }  else {
                            $_SESSION['anfitrion'] = $usuario->tipoUsuario ?? null;
                            header('Location: /anfitrion-perfil');
                        }
                        
                    }
                } else {
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

    public static function borrarestafuncion() {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}