<?php

namespace Controllers;

use Model\Area;
USE Model\Anfitrion;
use MVC\Router;
use Model\Posicion;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Evaluacion;

class LiderController {
    public static function index( Router $router) {
        if(!is_thlider() and !is_lider()) {
            header('Location: /login');
        }

        $anfitriones = allAnfitriones('estadoUsuario_id', 1);
       
        
        $router->render('lider/index', [
            'anfitriones' => $anfitriones
        ]);
    }


    public static function evaluar(Router $router) {
        if(!is_thlider() and !is_lider()) {
            header('Location: /login');
        }
        
        $id = $_GET['id'];
        $id = s($id);
        
        $anfitrion = Anfitrion::find($id);
        $anfitrion->posicion = Posicion::find($anfitrion->posicion_id);
        $anfitrion->area = Area::find($anfitrion->posicion->area_id);
        


        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Validaciones del formulario de evaluacion
        }

        $router->render('lider/evaluacion', [
            'anfitrion' => $anfitrion
        ]);
    }

    public static function historial(Router $router) {
        if(!is_thlider() and !is_lider()) {
            header('Location: /login');
        }
        
        $id = $_GET['id'];
        $id = s($id);
        

        if(!$id) {
            header('Location: /lider-perfil');
        }
        // Obtener los datos del anfitrion
        $anfitrion = Anfitrion::find($id);
        $anfitrion->posicion = Posicion::find($anfitrion->posicion_id);
        $anfitrion->area = Area::find($anfitrion->posicion->area_id);

        $evaluacion = Evaluacion::where('anfitriones_id', $id);
        

        // Variable auxiliar
        // $evaluacion->imagen_actual = $evaluacion->imagen;

        // NO ESTÁ ENTRANDO AL POST
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_thlider() and !is_lider()) {
                header('Location: /login');
            }
            debuguear($_POST);
            // Leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                
                // // Eliminar la imagen previa
                // unlink(CARPETA_IMAGENES . '/' . $evaluacion->imagen_actual . ".png" );
                // unlink(CARPETA_IMAGENES . '/' . $evaluacion->imagen_actual . ".webp" );

                // Crear la carpeta si no existe
                if(!is_dir(CARPETA_IMAGENES_EVALUACIONES)) {
                    mkdir(CARPETA_IMAGENES_EVALUACIONES, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true) );

                $_POST['imagen'] = $nombre_imagen;
            } else {
                // $_POST['imagen'] = $evaluacion->imagen_actual;
            }

            $evaluacion->sincronizar($_POST);
            

            if(isset($nombre_imagen)) {
                $imagen_png->save(CARPETA_IMAGENES_EVALUACIONES . '/' . $nombre_imagen . ".png" );
                $imagen_webp->save(CARPETA_IMAGENES_EVALUACIONES . '/' . $nombre_imagen . ".webp" );
            }

            $resultado = $evaluacion->guardar();
            if($resultado) {
                header('Location: /lider-historial?=$evaluacion->id');
            }
            
        }
      
        $router->render('lider/historial', [
            'anfitrion' => $anfitrion
        ]);
    }
}