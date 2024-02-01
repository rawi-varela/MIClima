<?php

namespace Controllers;

use MVC\Router;
use Model\Anfitrion;
use Model\EstadoUsuario;

class THController {

    public static function th( Router $router ) {
        if(!is_th()) {
            header('Location: /login');
        }
        

        //Seria un find, para obtener el id de la propiedad con ese se establecen lso permisos
        
        $router->render('th/index', [
        ]);
    }

    public static function crearAnfitrion(Router $router) {
        if(!is_th()) {
            header('Location: /login');
        }
        $alertas = [];
        
        $estadoUsuarios = EstadoUsuario::all(); //Consulta BD estadoUsuario 
        $anfitrion = new Anfitrion(); //Instancia vacia

        // $rutaAnterior = $_SERVER['HTTP_REFERER'];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_th()) {
                header('Location: /login');
            }

            $anfitrion->sincronizar($_POST);
            $alertas = $anfitrion->validar();
            
            if(empty($alertas)) {
                $resultado = $anfitrion->existeUsuario();

                if($resultado->num_rows) {
                    $alertas = Anfitrion::getAlertas();
                } else {
                    // Hashear el Password
                    $anfitrion->hashPassword();

                    // Guarda el Anfitrión en BD
                    $resultado = $anfitrion->create();

                    if($resultado) {
                        header('Location: /th-administrar-anfitriones');
                    }
                }
            }

        }

        $router->render('th/crear', [
            'anfitrion' => $anfitrion,
            'estadoUsuarios' => $estadoUsuarios, 
            'alertas' => $alertas
        ]);
    }

    public static function actualizarAnfitrion (Router $router) {
        if(!is_th()) {
            header('Location: /login');
        }
        $alertas = [];

        // Sanitizar o Escapar SIEMPRE LOS ID de GET
        $id = $_GET['id'];
        $id = s($id);

        if(!$id) {
            header('Location: /th-administrar-anfitriones');
        }

        // Obtener los datos del Anfitrion
        $anfitrion = Anfitrion::find($id);
        $estadoUsuarios = EstadoUsuario::all(); //Consulta BD estadoUsuario

        if(!$anfitrion) {
            header('Location: /th-administrar-anfitriones');
        }

        // // Para cargar los datos de los SELECTS (IDEAL SERÁ MODIFICAR EL JS)
        // $anfitrion->posicion = Posicion::find($anfitrion->posicion_id);
        // $anfitrion->area = Area::find($anfitrion->posicion->area_id);
        // $anfitrion->propiedad = Propiedad::find($anfitrion->area->propiedad_id);
        // // debuguear($anfitrion);


        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_th()) {
                header('Location: /login');
            }
            
            $anfitrion->sincronizar($_POST);
            $alertas = $anfitrion->validar();

            if(empty($alertas)) {
                $resultado = $anfitrion->existeRegistro('contraseña', $anfitrion->contraseña);
                

                if($resultado->num_rows) { //Es la misma pass, es decir, no se modificó la contraseña
                    // $alertas = Anfitrion::getAlertas();
                } else {
                    // Hashear el Password
                    $anfitrion->hashPassword();
                }

                // Guarda el Anfitrión en BD
                $resultado = $anfitrion->guardar();


                if($resultado) {
                    header('Location: /th-administrar-anfitriones');
                }
            }
        }

        $router->render('th/actualizar', [
            'anfitrion' => $anfitrion,
            'estadoUsuarios' => $estadoUsuarios,
            'alertas' => $alertas
        ]);
    }
    
    public static function deshabilitarAnfitrion(Router $router) {
        if(!is_th()) {
            header('Location: /login');
        }

        // Sanitizar o Escapar SIEMPRE LOS ID de GET
        $id = $_GET['id'];
        $id = s($id);

        if(!$id) {
            header('Location: /th-administrar-anfitriones');
        }

        // Obtener los datos del Anfitrion
        $anfitrion = Anfitrion::find($id);

        if(!$anfitrion) {
            header('Location: /th-administrar-anfitriones');
        }

        
            
            $anfitrion->estadoUsuario_id = 2;
            // debuguear($anfitrion);
            // Guarda el Anfitrión en BD
            $resultado = $anfitrion->guardar();


            if($resultado) {
                header('Location: /th-administrar-anfitriones');
            }
        

        // $router->render('th/actualizar', [
        //     'anfitrion' => $anfitrion,
        //     'estadoUsuarios' => $estadoUsuarios,
        //     'alertas' => $alertas
        // ]);
    }




}