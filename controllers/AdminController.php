<?php

namespace Controllers;

use Model\Area;
use MVC\Router;
use Model\Admin;
use Model\UserTH;
use Model\Posicion;
use Model\Propiedad;
use Model\TipoPropiedad;
use Intervention\Image\ImageManagerStatic as Image;
use Model\AnfitrionRelacional;
use Model\PosicionSelect;
use Model\TipoEmpleado;

class AdminController {
    public static function admin( Router $router) {
        session_start();
        isAdmin();

        // Consulta BD Propiedad
        $consulta = "SELECT propiedad.id, propiedad.nombrePropiedad, propiedad.imagen, tipoPropiedad.tipo as tipoPropiedad_id"; // Truco sucio, revisar después
        $consulta .= " FROM propiedad ";
        $consulta .= " LEFT OUTER JOIN tipoPropiedad ";
        $consulta .= " ON propiedad.tipoPropiedad_id=tipoPropiedad.id ";
        $propiedades = Propiedad::SQL($consulta);
        // Consulta BD tipoPropiedad
        $tipoPropiedades = TipoPropiedad::all();

        // Consulta BD Area
        $consulta = "SELECT area.id, area.nombreArea, area.propiedad_id, propiedad.nombrePropiedad as propiedad_id ";// Truco sucio, revisar después
        $consulta .= " FROM area ";
        $consulta .= " LEFT OUTER JOIN propiedad ";
        $consulta .= " ON area.propiedad_id=propiedad.id ";
        $areas = Area::SQL($consulta);

        // Consulta BD PuestoSelect
        $consulta = "SELECT posicion.id, posicion.nombrePosicion, tipoEmpleado.tipo as tipo, ";
        $consulta .= " area.nombreArea as area, propiedad.nombrePropiedad as propiedad ";
        $consulta .= " FROM posicion ";
        $consulta .= " LEFT OUTER JOIN tipoEmpleado ";
        $consulta .= " ON posicion.tipoEmpleado_id=tipoEmpleado.id ";
        $consulta .= " LEFT OUTER JOIN area ";
        $consulta .= " ON area.id=posicion.area_id ";
        $consulta .= " LEFT OUTER JOIN propiedad ";
        $consulta .= " ON propiedad.id=area.propiedad_id ";
        $puestos = PosicionSelect::SQL($consulta);

        // Consultar BD Usuarios TH
        $consulta = "SELECT anfitriones.id, anfitriones.nombre, anfitriones.apellidoPat, anfitriones.apellidoMat, anfitriones.genero, anfitriones.fechaInicio, estadoUsuario.estado, ";
        $consulta .= " area.nombreArea as area, posicion.nombrePosicion as posicion, propiedad.nombrePropiedad as propiedad ";
        $consulta .= " FROM anfitriones ";
        $consulta .= " LEFT OUTER JOIN estadoUsuario ";
        $consulta .= " ON estadoUsuario.id=anfitriones.estadoUsuario_id ";
        $consulta .= " LEFT OUTER JOIN posicion ";
        $consulta .= " ON posicion.id=anfitriones.posicion_id ";
        $consulta .= " LEFT OUTER JOIN area ";
        $consulta .= " ON area.id=posicion.area_id ";
        $consulta .= " LEFT OUTER JOIN propiedad ";
        $consulta .= " ON propiedad.id=area.propiedad_id ";
        $anfitriones = AnfitrionRelacional::SQL($consulta);
        // Consultar BD Propiedades con Privilegios de Usuarios TH
        $consulta = "SELECT propiedad.id, propiedad.nombrePropiedad as privilegios ";
        $consulta .= " FROM propiedad ";
        $consulta .= " LEFT OUTER JOIN thPropiedad ";
        $consulta .= " ON propiedad.id=thPropiedad.propiedad_id ";
        $consulta .= " LEFT OUTER JOIN anfitriones ";
        $consulta .= " ON anfitriones.id=thPropiedad.anfitriones_id ";
        $ths = UserTH::SQL($consulta);
        // debuguear($consulta);
        
        $router->render('admin/index', [
            'propiedades' => $propiedades,
            'tipoPropiedades' => $tipoPropiedades,
            'areas' => $areas,
            'puestos' => $puestos,
            'anfitriones' => $anfitriones,
            'ths' => $ths
        ]);
    }

    public static function crearPropiedad (Router $router) {
        session_start();
        isAdmin();
        $alertas = [];
        
        $tipoPropiedades = TipoPropiedad::all(); // Consulta BD tipoPropiedad
        $propiedad = new Propiedad; //Instancia vacia (Necesaria?)

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $propiedad->sincronizar($_POST);

            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            if($_FILES['imagen']['tmp_name']) {
                $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }

            $alertas = $propiedad->validar();

            if(empty($alertas)) {
                // Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                // Guarda en la base de datos
                $propiedad->create();
                header('Location: /admin');
            }

        }
    
        $router->render('admin/propiedad/crear', [
            'propiedad' => $propiedad,
            'tipoPropiedades' => $tipoPropiedades,
            'alertas' => $alertas
        ]);
    }

    public static function actualizarPropiedad (Router $router) {

        $router->render('', [

        ]);
    }

    public static function eliminarPropiedad (Router $router) {
        
    }

    public static function crearArea (Router $router) {
        session_start();
        isAdmin();
        $alertas = [];
        
        $propiedades = Propiedad::all(); // Consulta BD Propiedad
        $area = new Area; //Instancia vacia (Necesaria?)

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $area->sincronizar($_POST);

            $alertas = $area->validar();

            if(empty($alertas)) {
                // Guarda en la base de datos
                $area->create();
                header('Location: /admin');
            }

        }
    
        $router->render('admin/area/crear', [
            'propiedades' => $propiedades,
            'area' => $area,
            'alertas' => $alertas
        ]);
    }

    public static function actualizarArea (Router $router) {

        $router->render('', [

        ]);
    }

    public static function eliminarArea (Router $router) {
        
    }

    public static function crearPuesto (Router $router) {
        session_start();
        isAdmin();
        $alertas = [];
        
        $areas = Area::all(); // Consulta BD Area
        $tipoEmpleados = TipoEmpleado::all(); // Consulta BD Area
        $puesto = new Posicion(); //Instancia vacia (Necesaria?)

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $puesto->sincronizar($_POST);

            $alertas = $puesto->validar();

            if(empty($alertas)) {
                // Guarda en la base de datos
                $puesto->create();
                header('Location: /admin');
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

        $router->render('', [

        ]);
    }

    public static function eliminarPuesto (Router $router) {
        
    }

    public static function crearTH (Router $router) {
        session_start();
        isAdmin();
        $alertas = [];
        
        $areas = Area::all(); // Consulta BD Area
        $tipoEmpleados = TipoEmpleado::all(); // Consulta BD Area
        $puesto = new Posicion(); //Instancia vacia (Necesaria?)

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $puesto->sincronizar($_POST);

            $alertas = $puesto->validar();

            if(empty($alertas)) {
                // Guarda en la base de datos
                $puesto->create();
                header('Location: /admin');
            }

        }
    
        $router->render('admin/th/crear', [
            'puesto' => $puesto,
            'areas' => $areas,
            'tipoEmpleados' => $tipoEmpleados,
            'alertas' => $alertas
        ]);
    }

    public static function actualizarTH (Router $router) {

        $router->render('', [

        ]);
    }

    public static function eliminarTH (Router $router) {
        
    }


}



