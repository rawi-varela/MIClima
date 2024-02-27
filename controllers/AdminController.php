<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;
use Model\Departamentos;
use Model\Globales;
use Model\Periodos;
use Model\Preguntas;
use Model\Propiedades;
use Model\Resultados;
use Model\ResultadosDeptos;

class AdminController {

    public static function index( Router $router) {
        if(!is_admin()) { //Maybe un método diferente para TH 
            header('Location: /login');
        }

        $propiedad = $_SESSION['propiedad']; //Obtener el ID de Propiedad de User

        $namePropiedad = Propiedades::find($propiedad); //Name Propeidad H3

        // debuguear($namePropiedad);

        $totales = Periodos::all('propiedades_id', $propiedad, 'id DESC', '3'); //Ultimos 3 periodos de esa Propiedad

        //Calificaciones globales de esos 3 periodos
        foreach ($totales as $total) {
            $total->globales = Globales::find($total->id);

            //Asignar nombre del icono con base a porcentaje
            if($total->globales->porcentaje >= 90) {
                $total->globales->icono = 'Capitalizar';
            } else if($total->globales->porcentaje >= 85) {
                $total->globales->icono = 'Optimizar';
            } else if($total->globales->porcentaje >= 80) {
                $total->globales->icono = 'Mejorar';
            } else {
                $total->globales->icono = 'Corregir';
            }
        }
        
        // debuguear($totales);
        
        $router->render('admin/index', [
            'totales' => array_reverse($totales), //array_reverse para cambiar reordenar a ASC
            'namePropiedad' => $namePropiedad
        ]);
    }

    public static function areas(Router $router) {
        if(!is_admin()) { 
            header('Location: /login');
        }

        $propiedad =$_SESSION['propiedad']; //Obtener el ID de Propiedad de User
        $areas = Departamentos::all('propiedades_id', $propiedad); //Departamentos de la Propiedad del User

        foreach($areas as $area) {
            $area->propiedad = Propiedades::find($area->propiedades_id);
        }

        $router->render('admin/area/index', [
            'areas' => $areas
        ]);
    }

    public static function crearArea (Router $router) {
        if(!is_admin()) { 
            header('Location: /login');
        }
        $alertas = [];
        
        $propiedad = $_SESSION['propiedad'];
        $propiedades = Propiedades::all('id', $propiedad); // Consulta BD Propiedad
        $area = new Departamentos; //Instancia vacía

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) { 
                header('Location: /login');
            }

            $area->sincronizar($_POST);

            $alertas = $area->validar();

            if(empty($alertas)) {
                // Guardar en la BD
                $resultado = $area->crear();

                if($resultado) {
                    header('Location: /admin/areas');
                }
            }
        }
        
    
        $router->render('admin/area/crear', [
            'propiedades' => $propiedades,
            'area' => $area,
            'alertas' => $alertas
        ]);
    }

    public static function actualizarArea (Router $router) { 
        if(!is_admin()) { 
            header('Location: /login');
        }
        $alertas = [];

        // Sanitizar o Escapar SIEMPRE LOS ID de GET
        $id = $_GET['id'];
        $id = s($id);

        if(!$id) {
            header('Location: /admin/areas');
        }

        // Obtener los datos del Area
        $area = Departamentos::find($id);
        $propiedad =$_SESSION['propiedad'];
        $propiedades = Propiedades::all('id', $propiedad); // Consulta BD Propiedades

        if(!$area) {
            header('Location: /admin/areas');
        }

        // $alertas = Area::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) { 
                header('Location: /login');
            }

            $area->sincronizar($_POST);

            $alertas = $area->validar();

            if(empty($alertas)) {
                $resultado = $area->guardar();
                if($resultado) {
                    header('Location: /admin/areas');
                }
            }

        }

        $router->render('admin/area/actualizar', [
            'area' => $area,
            'propiedades' => $propiedades,
            'alertas' => $alertas
        ]);
    }

    public static function eliminarArea () {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) { 
                header('Location: /login');
            }

            $id = $_POST['id'];
            $area = Departamentos::find($id);
            if(!isset($area)) {
                header('Location: /admin/areas');
            }
            $resultado = $area->eliminar();
            if($resultado) {
                header('Location: /admin/areas');
            }
        }
    }

    public static function progreso(Router $router) {
        if(!is_admin()) { 
            header('Location: /login');
        }

        $propiedad = $_SESSION['propiedad'];
        $areas = Departamentos::all('propiedades_id', $propiedad);

        foreach($areas as $area) {
            // $area->propiedad = Propiedades::find($area->propiedades_id); //Nombre de la Propiedad
            $area->evaluados = Resultados::total('departamentos_id', $area->id); //Cantidad que ya respondió de ese depto
            $area->faltante =  $area->cantidad - $area->evaluados; //Cantidad que no ha respondido encuesta
            // $area->porcentaje = round(($area->evaluados / $area->cantidad) * 100, 2);
            $area->porcentaje = intval(($area->evaluados / $area->cantidad) * 100);
        }
        
        $router->render('admin/progreso/index', [
            'areas' => $areas
        ]);
    }

    public static function resultados(Router $router) {
        if(!is_admin()) { 
            header('Location: /login');
        }

        $preguntas = Preguntas::all();

        $propiedad = $_SESSION['propiedad']; //Obtener Propiedad

        $areas = Departamentos::all('propiedades_id', $propiedad);
        // $resultadosDeptops = ResultadosDeptos::all('propiedades_id', $propiedad);
        $periodos = Periodos::all('propiedades_id', $propiedad); // Periodos de esa Propiedad

        $globales = [];

        // Iterar sobre cada periodo
        foreach ($periodos as $periodo) {
            // Obtener el global asociado al id del periodo
            $global = Globales::where('periodos_id', $periodo->id);

            // Verificar si existe un global asociado
            if($global) {
                // Agregar el nombre del periodo al global
                $global->periodo = $periodo->periodo;
                $globales[] = $global;
            }
        }        

        
        $router->render('admin/resultados/index', [
            'preguntas' => $preguntas,
            'globales' => array_reverse($globales),
            'periodos' => $periodos,
            'areas' => $areas
        ]);
    }
    
    
    public static function administradores (Router $router) {
        if(!is_master()) {
            header('Location: /login');
        }

        $administradores = Admin::all();

        foreach($administradores as $administrador) {
            $administrador->propiedad = Propiedades::find($administrador->propiedades_id);
        }

        $router->render('admin/administradores/index', [
            'administradores' => $administradores
        ]);
    }

    public static function crearAdministradores (Router $router) {
        if(!is_master()) { 
            header('Location: /login');
        }
        $alertas = [];
        
        $administrador = new Admin(); //Instancia vacia
        $propiedades = Propiedades::all(); // Consulta BD Propiedad

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_master()) {
                header('Location: /login');
            }

            $administrador->sincronizar($_POST);
            $alertas = $administrador->validar();

            if(empty($alertas)) {
                $resultado = $administrador->existeUsuario();

                if($resultado->num_rows) {
                    $alertas = Admin::getAlertas();
                } else {
                    // Hashear el Password
                    // $anfitrion->hashPassword();

                    // Guarda el Anfitrión en BD
                    $resultado = $administrador->crear();

                    if($resultado) {
                        header('Location: /admin/administradores');
                    }
                }
            }
        }
    
        $router->render('admin/administradores/crear', [
            'administrador' => $administrador,
            'propiedades' => $propiedades,
            'alertas' => $alertas
        ]);
    }

    public static function actualizarAdministradores (Router $router) {
        if(!is_master()) { 
            header('Location: /login');
        }
        $alertas = [];

        // Sanitizar o Escapar SIEMPRE LOS ID de GET
        $id = $_GET['id'];
        $id = s($id);

        if(!$id) {
            header('Location: /admin/administradores');
        }

        // Obtener los datos del Administardor
        $administrador = Admin::find($id);
        $propiedades = Propiedades::all(); // Consulta BD Propiedades
    
        if(!$administrador) {
            header('Location: /admin/th');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_master()) {
                header('Location: /login');
            }
            
            $administrador->sincronizar($_POST);
            $alertas = $administrador->validar();

            
            if(empty($alertas)) {
                // Guarda el Anfitrión en BD
                $resultado = $administrador->guardar();

                if($resultado) {
                    header('Location: /admin/administradores');
                }
                
            }
        }

        $router->render('admin/administradores/actualizar', [
            'administrador' => $administrador,
            'propiedades' => $propiedades,
            'alertas' => $alertas
        ]);
    }

    public static function eliminarAdministradores (Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_master()) { 
                header('Location: /login');
            }

            $id = $_POST['id'];
            $administrador = Admin::find($id);
            if(!isset($administrador)) {
                header('Location: /admin/administradores');
            }
            $resultado = $administrador->eliminar();
            if($resultado) {
                header('Location: /admin/administradores');
            }
        }
    }

    
}



