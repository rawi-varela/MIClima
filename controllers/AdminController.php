<?php

namespace Controllers;

use Model\Area;
use MVC\Router;
use Model\Admin;
use Model\UserTH;
use Model\Posicion;
use Model\Anfitrion;
use Model\Propiedad;
use Model\ThPropiedad;
use Classes\Paginacion;
use Model\TipoEmpleado;
use Model\EstadoUsuario;
use Model\TipoPropiedad;
use Model\AnfitrionRelacional;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController {
    // // Consulta BD Propiedad
    // $consulta = "SELECT propiedad.id, propiedad.nombrePropiedad, propiedad.imagen, tipoPropiedad.tipo as tipoPropiedad_id"; // Truco sucio, revisar después
    // $consulta .= " FROM propiedad ";
    // $consulta .= " LEFT OUTER JOIN tipoPropiedad ";
    // $consulta .= " ON propiedad.tipoPropiedad_id=tipoPropiedad.id ";
    // $propiedades = Propiedad::SQL($consulta);
    // // Consulta BD tipoPropiedad
    // $tipoPropiedades = TipoPropiedad::all();

    // // Consulta BD Area
    // $consulta = "SELECT area.id, area.nombreArea, area.propiedad_id, propiedad.nombrePropiedad as propiedad_id ";// Truco sucio, revisar después
    // $consulta .= " FROM area ";
    // $consulta .= " LEFT OUTER JOIN propiedad ";
    // $consulta .= " ON area.propiedad_id=propiedad.id ";
    // $areas = Area::SQL($consulta);

    // // Consulta BD PuestoSelect
    // $consulta = "SELECT posicion.id, posicion.nombrePosicion, tipoEmpleado.tipo as tipo, ";
    // $consulta .= " area.nombreArea as area, propiedad.nombrePropiedad as propiedad ";
    // $consulta .= " FROM posicion ";
    // $consulta .= " LEFT OUTER JOIN tipoEmpleado ";
    // $consulta .= " ON posicion.tipoEmpleado_id=tipoEmpleado.id ";
    // $consulta .= " LEFT OUTER JOIN area ";
    // $consulta .= " ON area.id=posicion.area_id ";
    // $consulta .= " LEFT OUTER JOIN propiedad ";
    // $consulta .= " ON propiedad.id=area.propiedad_id ";
    // $puestos = PosicionSelect::SQL($consulta);

    // // Consultar BD Usuarios TH
    // $consulta = "SELECT anfitriones.id, anfitriones.nombre, anfitriones.apellidoPat, anfitriones.apellidoMat, anfitriones.genero, anfitriones.fechaInicio, estadoUsuario.estado, ";
    // $consulta .= " area.nombreArea as area, posicion.nombrePosicion as posicion, propiedad.nombrePropiedad as propiedad ";
    // $consulta .= " FROM anfitriones ";
    // $consulta .= " LEFT OUTER JOIN estadoUsuario ";
    // $consulta .= " ON estadoUsuario.id=anfitriones.estadoUsuario_id ";
    // $consulta .= " LEFT OUTER JOIN posicion ";
    // $consulta .= " ON posicion.id=anfitriones.posicion_id ";
    // $consulta .= " LEFT OUTER JOIN area ";
    // $consulta .= " ON area.id=posicion.area_id ";
    // $consulta .= " LEFT OUTER JOIN propiedad ";
    // $consulta .= " ON propiedad.id=area.propiedad_id ";
    // $anfitriones = AnfitrionRelacional::SQL($consulta);
    // // Consultar BD Propiedades con Privilegios de Usuarios TH
    // $consulta = "SELECT thPropiedad.id, propiedad.nombrePropiedad as propiedad_id, thPropiedad.anfitriones_id "; // Truco sucio, revisar después
    // $consulta .= " FROM thPropiedad ";
    // $consulta .= " LEFT OUTER JOIN propiedad ";
    // $consulta .= " ON thPropiedad.propiedad_id=propiedad.id ";
    // $consulta .= " LEFT OUTER JOIN anfitriones ";
    // $consulta .= " ON anfitriones.id=thPropiedad.anfitriones_id ";
    // $ths = UserTH::SQL($consulta);
    // // debuguear($consulta);

    public static function index( Router $router) {
        if(!is_admin() && !is_th()) { //Maybe un método diferente para TH //Compartir acceso a TH
            header('Location: /login');
        }

        $propiedadesTotal = Propiedad::total();
        $areasTotal = Area::total();
        $puestosTotal = Posicion::total();
        $anfitrionesTotal = Anfitrion::total();
        $userThTotal = Anfitrion::total('tipoUsuario_id', 3);
        $lideresTotal = Anfitrion::total('tipoUsuario_id', 1);
        
        
        $router->render('admin/index', [
            'propiedadesTotal' => $propiedadesTotal,
            'areasTotal' => $areasTotal,
            'puestosTotal' => $puestosTotal,
            'anfitrionesTotal' => $anfitrionesTotal,
            'userThTotal' => $userThTotal,
            'lideresTotal' => $lideresTotal
        ]);
    }

    public static function propiedades( Router $router) {
        if(!is_admin() && !is_th()) { //Compartir acceso a TH
            header('Location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/propiedades?page=1');
        }
        $registros_por_pagina = 6;
        $total = Propiedad::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/propiedades?page=1');
        }

        $propiedades = Propiedad::paginar($registros_por_pagina, $paginacion->offset());

        foreach($propiedades as $propiedad) {
            $propiedad->tipoP = TipoPropiedad::find($propiedad->tipoPropiedad_id);
        }


        // // Consulta BD Propiedad
        // $consulta = "SELECT propiedad.id, propiedad.nombrePropiedad, propiedad.imagen, tipoPropiedad.tipo as tipoPropiedad_id"; // Truco sucio, revisar después
        // $consulta .= " FROM propiedad ";
        // $consulta .= " LEFT OUTER JOIN tipoPropiedad ";
        // $consulta .= " ON propiedad.tipoPropiedad_id=tipoPropiedad.id ";
        // $propiedades = Propiedad::SQL($consulta);
        // Consulta BD tipoPropiedad
        // $tipoPropiedades = TipoPropiedad::all();
        
        $router->render('admin/propiedad/index', [
            'propiedades' => $propiedades,
            // 'tipoPropiedades' => $tipoPropiedades,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crearPropiedad (Router $router) {
        if(!is_admin() && !is_th()) { //Compartir acceso a TH
            header('Location: /login');
        }
        $alertas = [];
        
        $tipoPropiedades = TipoPropiedad::all(); // Consulta BD tipoPropiedad
        $propiedad = new Propiedad; //Instancia vacia (Necesaria?)

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin() && !is_th()) { //Compartir acceso a TH
                header('Location: /login');
            }

            // Leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                
                // $carpeta_imagenes = '../public/imagenes/propiedades';

                // Crear la carpeta si no existe
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true) );

                $_POST['imagen'] = $nombre_imagen;
            }        

            $propiedad->sincronizar($_POST);

            $alertas = $propiedad->validar();

            if(empty($alertas)) {
                // Guardar las imagenes
                $imagen_png->save(CARPETA_IMAGENES . '/' . $nombre_imagen . ".png" );
                $imagen_webp->save(CARPETA_IMAGENES . '/' . $nombre_imagen . ".webp" );

                // Guardar en la BD
                $resultado = $propiedad->create();

                if($resultado) {
                    header('Location: /admin/propiedades');
                }
            }
        }
    
        $router->render('admin/propiedad/crear', [
            'propiedad' => $propiedad,
            'tipoPropiedades' => $tipoPropiedades,
            'alertas' => $alertas
        ]);
    }

    public static function actualizarPropiedad (Router $router) {
        if(!is_admin() && !is_th()) { //Compartir acceso a TH
            header('Location: /login');
        }

        $alertas = [];

        // Sanitizar o Escapar SIEMPRE LOS ID de GET
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/propiedades');
        }

        // Obtener los datos de la propiedad
        $propiedad = Propiedad::find($id);
        $tipoPropiedades = TipoPropiedad::all(); // Consulta BD tipoPropiedad

        if(!$propiedad) {
            header('Location: /admin/propiedades');
        }

        // $alertas = Propiedad::getAlertas();

        // Variable auxiliar
        $propiedad->imagen_actual = $propiedad->imagen;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin() && !is_th()) { //Compartir acceso a TH
                header('Location: /login');
            }

            // Leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                
                // $carpeta_imagenes = '../public/imagenes/propiedades';

                // Eliminar la imagen previa
                unlink(CARPETA_IMAGENES . '/' . $propiedad->imagen_actual . ".png" );
                unlink(CARPETA_IMAGENES . '/' . $propiedad->imagen_actual . ".webp" );

                // Crear la carpeta si no existe
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true) );

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $propiedad->imagen_actual;
            }

            $propiedad->sincronizar($_POST);

            $alertas = $propiedad->validar();

            if(empty($alertas)) {
                if(isset($nombre_imagen)) {
                    $imagen_png->save(CARPETA_IMAGENES . '/' . $nombre_imagen . ".png" );
                    $imagen_webp->save(CARPETA_IMAGENES . '/' . $nombre_imagen . ".webp" );
                }
                $resultado = $propiedad->guardar();
                if($resultado) {
                    header('Location: /admin/propiedades');
                }
            }
        }
        
        $router->render('admin/propiedad/actualizar', [
            'propiedad' => $propiedad,
            'tipoPropiedades' => $tipoPropiedades,
            'alertas' => $alertas
        ]);
    }

    public static function eliminarPropiedad () {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin() && !is_th()) { //Compartir acceso a TH
                header('Location: /login');
            }

            $id = $_POST['id'];
            $propiedad = Propiedad::find($id);
            if(!isset($propiedad)) {
                header('Location: /admin/propiedades');
            }
            $resultado = $propiedad->eliminar();
            if($resultado) {
                unlink(CARPETA_IMAGENES . '/' . $propiedad->imagen . ".png");
                unlink(CARPETA_IMAGENES . '/' . $propiedad->imagen . ".webp");
                header('Location: /admin/propiedades');
            }
        }
    }

    public static function areas(Router $router) {
        if(!is_admin() && !is_th()) { //Compartir acceso a TH
            header('Location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/areas?page=1');
        }
        $registros_por_pagina = 25;
        $total = Area::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/areas?page=1');
        }

        $areas = Area::paginar($registros_por_pagina, $paginacion->offset());

        foreach($areas as $area) {
            $area->propiedad = Propiedad::find($area->propiedad_id);
        }

        $router->render('admin/area/index', [
            'areas' => $areas,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crearArea (Router $router) {
        if(!is_admin() && !is_th()) { //Compartir acceso a TH
            header('Location: /login');
        }
        $alertas = [];
        
        $propiedades = Propiedad::all(); // Consulta BD Propiedad
        $area = new Area; //Instancia vacia (Necesaria?)

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin() && !is_th()) { //Compartir acceso a TH
                header('Location: /login');
            }

            $area->sincronizar($_POST);

            $alertas = $area->validar();

            if(empty($alertas)) {
                // Guardar en la BD
                $resultado = $area->create();

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
        if(!is_admin() && !is_th()) { //Compartir acceso a TH
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
        $area = Area::find($id);
        $propiedades = Propiedad::all(); // Consulta BD Propiedades

        if(!$area) {
            header('Location: /admin/areas');
        }

        // $alertas = Area::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin() && !is_th()) { //Compartir acceso a TH
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
            if(!is_admin() && !is_th()) { //Compartir acceso a TH
                header('Location: /login');
            }

            $id = $_POST['id'];
            $area = Area::find($id);
            if(!isset($area)) {
                header('Location: /admin/areas');
            }
            $resultado = $area->eliminar();
            if($resultado) {
                header('Location: /admin/areas');
            }
        }
    }

    public static function puestos(Router $router) {
        if(!is_admin() && !is_th()) { //Compartir acceso a TH
            header('Location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/puestos?page=1');
        }
        $registros_por_pagina = 25;
        $total = Posicion::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/puestos?page=1');
        }

        $puestos = Posicion::paginar($registros_por_pagina, $paginacion->offset());

        foreach($puestos as $puesto) {
            $puesto->nivel = TipoEmpleado::find($puesto->tipoEmpleado_id);
            $puesto->area = Area::find($puesto->area_id);
            $puesto->propiedad = Propiedad::find($puesto->area->propiedad_id); //Ya que el idPropiedad está en Area
        }

        $router->render('admin/puesto/index', [
            'puestos' => $puestos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }


    public static function crearPuesto (Router $router) {
        if(!is_admin() && !is_th()) { //Compartir acceso a TH
            header('Location: /login');
        }
        $alertas = [];
        
        $areas = Area::all(); // Consulta BD Area
        $tipoEmpleados = TipoEmpleado::all(); // Consulta BD Area
        $puesto = new Posicion(); //Instancia vacia (Necesaria?)
        

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin() && !is_th()) { //Compartir acceso a TH
                header('Location: /login');
            }
            
            $puesto->sincronizar($_POST);
            $alertas = $puesto->validar();
            // debuguear($puesto);

            if(empty($alertas)) {
                // Guardar en la BD
                $resultado = $puesto->create();

                if($resultado) {
                    header('Location: /admin/puestos');
                }
            }

        }
    
        $router->render('admin/puesto/crear', [
            'puesto' => $puesto,
            'areas' => $areas,
            'tipoEmpleados' => $tipoEmpleados,
            'alertas' => $alertas
        ]);
    }

    
    public static function actualizarPuesto (Router $router) { 
        if(!is_admin() && !is_th()) { //Compartir acceso a TH
            header('Location: /login');
        }
        $alertas = [];

        // Sanitizar o Escapar SIEMPRE LOS ID de GET
        $id = $_GET['id'];
        $id = s($id);

        if(!$id) {
            header('Location: /admin/puestos');
        }

        // Obtener los datos del Puesto
        $puesto = Posicion::find($id);
        $tipoEmpleados = TipoEmpleado::all();

        if(!$puesto) {
            header('Location: /admin/puestos');
        }

        // $alertas = Area::getAlertas();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin() && !is_th()) { //Compartir acceso a TH
                header('Location: /login');
            }

            $puesto->sincronizar($_POST);

            $alertas = $puesto->validar();

            if(empty($alertas)) {
                $resultado = $puesto->guardar();
                if($resultado) {
                    header('Location: /admin/puestos');
                }
            }

        }

        $router->render('admin/puesto/actualizar', [
            'puesto' => $puesto,
            'tipoEmpleados' => $tipoEmpleados,
            'alertas' => $alertas
        ]);
    }

    public static function eliminarPuesto () {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin() && !is_th()) { //Compartir acceso a TH
                header('Location: /login');
            }

            $id = $_POST['id'];
            $puesto = Posicion::find($id);
            if(!isset($puesto)) {
                header('Location: /admin/puestos');
            }
            $resultado = $puesto->eliminar();
            if($resultado) {
                header('Location: /admin/puestos');
            }
        }
    }
    
    public static function THs (Router $router) {
        if(!is_admin() && !is_th()) { //Compartir acceso a TH
            header('Location: /login');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/th?page=1');
        }
        $registros_por_pagina = 6;
        $total = Anfitrion::total('tipoUsuario_id', 3); //Anfitriones con tipoUsuario_id = 2

        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/th?page=1');
        }

        $anfitriones = Anfitrion::paginar($registros_por_pagina, $paginacion->offset(), 'tipoUsuario_id', 3);


        foreach($anfitriones as $anfitrion) {
            $anfitrion->estadoU = EstadoUsuario::find($anfitrion->estadoUsuario_id);
            $anfitrion->puesto = Posicion::find($anfitrion->posicion_id);
            $anfitrion->area = Area::find($anfitrion->puesto->area_id);
            $anfitrion->propiedad = Propiedad::find($anfitrion->area->propiedad_id);

            // //Privilegios
            // $Auxiliar = UserTH::where('anfitriones_id',$anfitrion->id);
            // $anfitrion->privilegios = Propiedad::find($Auxiliar->propiedad_id);
        }

        $router->render('admin/th/index', [
            'anfitriones' => $anfitriones,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crearTH (Router $router) {
        if(!is_admin() && !is_th()) { //Compartir acceso a TH
            header('Location: /login');
        }
        $alertas = [];
        
        $estadoUsuarios = EstadoUsuario::all(); //Consulta BD estadoUsuario
        // $propiedades = Propiedad::all(); //Consulta BD propiedad
        // $areas = Area::all(); // Consulta BD Area
        // // $tipoEmpleados = TipoEmpleado::all(); // Consulta BD Area
        // $puestos = Posicion::all(); 
        $anfitrion = new Anfitrion(); //Instancia vacia
        $thPropiedad = new ThPropiedad();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin() && !is_th()) { //Compartir acceso a TH
                header('Location: /login');
            }

            $anfitrion->sincronizar($_POST);
            $alertas = $anfitrion->validar();

            $thPropiedad->sincronizar($_POST);
            // $alertas = $thPropiedad->validar();
            
            if(empty($alertas)) {
                $resultado = $anfitrion->existeUsuario();

                if($resultado->num_rows) {
                    $alertas = Anfitrion::getAlertas();
                } else {
                    // Hashear el Password
                    $anfitrion->hashPassword();

                    // Guarda el Anfitrión en BD
                    $resultado = $anfitrion->create();

                    $thPropiedad->anfitriones_id = $anfitrion->id; // Asignar el ID del anfitrión recién creado
                    $thPropiedad->create();

                    if($resultado) {
                        header('Location: /admin/th');
                    }
                }
            }

        }
    
        $router->render('admin/th/crear', [
            'anfitrion' => $anfitrion,
            'thPropiedad' => $thPropiedad,
            'estadoUsuarios' => $estadoUsuarios,
            // 'propiedades' => $propiedades,
            // 'areas' => $areas,
            // 'puestos' => $puestos,
            // // 'tipoEmpleados' => $tipoEmpleados,
            'alertas' => $alertas
        ]);
    }

    public static function actualizarTH (Router $router) {
        if(!is_admin() && !is_th()) { //Compartir acceso a TH
            header('Location: /login');
        }
        $alertas = [];

        // Sanitizar o Escapar SIEMPRE LOS ID de GET
        $id = $_GET['id'];
        $id = s($id);

        if(!$id) {
            header('Location: /admin/th');
        }

        // Obtener los datos del Anfitrion
        $anfitrion = Anfitrion::find($id);
        $thPropiedad = ThPropiedad::where('anfitriones_id', $anfitrion->id);
        $estadoUsuarios = EstadoUsuario::all(); //Consulta BD estadoUsuario

        if(!$anfitrion) {
            header('Location: /admin/th');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin() && !is_th()) { //Compartir acceso a TH
                header('Location: /login');
            }
            
            $anfitrion->sincronizar($_POST);
            $alertas = $anfitrion->validar();

            $thPropiedad->sincronizar($_POST);
            // debuguear($_POST);
            
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

                $thPropiedad->anfitriones_id = $anfitrion->id; // Asignar el ID del anfitrión recién creado
                $thPropiedad->guardar();

                if($resultado) {
                    header('Location: /admin/th');
                }
            }
        }

        $router->render('admin/th/actualizar', [
            'anfitrion' => $anfitrion,
            'estadoUsuarios' => $estadoUsuarios,
            'thPropiedad' => $thPropiedad,
            'alertas' => $alertas
        ]);
    }

    public static function eliminarTH (Router $router) {
        
    }

    public static function crearPrivilegios (router $router) {
        if(!is_admin() && !is_th()) { //Compartir acceso a TH
            header('Location: /login');
        }
        $alertas = [];

        $id = $_GET['id'];

        $anfitrion = Anfitrion::find($id);

        // // Consultar BD Propiedades con Privilegios de Usuarios TH
        // $consulta = "SELECT thPropiedad.id, propiedad.nombrePropiedad as propiedad_id, thPropiedad.anfitriones_id "; // Truco sucio, revisar después
        // $consulta .= " FROM thPropiedad ";
        // $consulta .= " LEFT OUTER JOIN propiedad ";
        // $consulta .= " ON thPropiedad.propiedad_id=propiedad.id ";
        // $consulta .= " LEFT OUTER JOIN anfitriones ";
        // $consulta .= " ON anfitriones.id=thPropiedad.anfitriones_id ";
        // $consulta .= " WHERE anfitriones_id = '$id' ";
        // $privilegios = UserTH::SQL($consulta);

        $privilegios = UserTH::whereArray(['anfitriones_id' => $anfitrion->id]);

        foreach ($privilegios as $privilegio) {
            $privilegio->propiedad = Propiedad::find($privilegio->propiedad_id);
        }

        $propiedades = Propiedad::all();

        // Insert
        $thPropiedad = new ThPropiedad();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin() && !is_th()) { //Compartir acceso a TH
                header('Location: /login');
            }
            
            $thPropiedad->sincronizar($_POST);
            if(empty($alertas)) {
                // Guarda en la base de datos
                $thPropiedad->create();
                header('Location: /admin/th');
            }
        }



        $router->render('admin/th/privilegios',[
            'privilegios' => $privilegios,
            'propiedades' => $propiedades,
            'anfitrion' => $anfitrion,
            'alertas' => $alertas
        ]);
    }

    public static function eliminarPrivilegios () {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin() && !is_th()) { //Compartir acceso a TH
                header('Location: /login');
            }

            // Validar id
            $id = $_POST['id'];

            if($id) {
                $thPropiedad = UserTH::find($id);
                $thPropiedad->eliminar();  
                header('Location: /admin/th');     
            }   
        }

    }

    
}



