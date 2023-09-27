<?php

namespace Controllers;

use Model\Area;
use MVC\Router;
use Model\Admin;
use Model\Posicion;
use Model\Propiedad;
use Model\AnfitrionRelacional;
use Model\UserTH;

class AdminController {
    public static function admin( Router $router) {
        session_start();
        isAdmin();

        // Consulta BD Propiedad
        $propiedades = Propiedad::all();

        // Consulta BD Area
        $consulta = "SELECT area.id, area.nombreArea, area.propiedad_id, propiedad.nombrePropiedad as propiedad ";
        $consulta .= " FROM area ";
        $consulta .= " LEFT OUTER JOIN propiedad ";
        $consulta .= " ON area.propiedad_id=propiedad.id ";
        $areas = Area::SQL($consulta);

        // Consulta BD Puesto
        $consulta = "SELECT posicion.id, posicion.nombrePosicion, posicion.area_id, posicion.tipoEmpleado_id, ";
        $consulta .= " tipoEmpleado.tipo as tipoEmpleado, area.nombreArea as area, propiedad.nombrePropiedad as propiedad ";
        $consulta .= " FROM posicion ";
        $consulta .= " LEFT OUTER JOIN tipoEmpleado ";
        $consulta .= " ON posicion.tipoEmpleado_id=tipoEmpleado.id ";
        $consulta .= " LEFT OUTER JOIN area ";
        $consulta .= " ON area.id=posicion.area_id ";
        $consulta .= " LEFT OUTER JOIN propiedad ";
        $consulta .= " ON propiedad.id=area.propiedad_id ";
        $puestos = Posicion::SQL($consulta);

        // Consultar BD Usuarios TH
        $consulta = "SELECT anfitriones.id, anfitriones.nombre, anfitriones.apellidoPat, anfitriones.apellidoMat, anfitriones.genero, anfitriones.fechaInicio, anfitriones.estado, ";
        $consulta .= " area.nombreArea as area, posicion.nombrePosicion as posicion, propiedad.nombrePropiedad as propiedad ";
        $consulta .= " FROM anfitriones ";
        $consulta .= " LEFT OUTER JOIN area ";
        $consulta .= " ON anfitriones.area_id=area.id ";
        $consulta .= " LEFT OUTER JOIN posicion ";
        $consulta .= " ON posicion.id=anfitriones.posicion_id ";
        $consulta .= " LEFT OUTER JOIN propiedad ";
        $consulta .= " ON propiedad.id=anfitriones.propiedad_id ";
        $anfitriones = AnfitrionRelacional::SQL($consulta);

        // Consultar BD Propiedades de Usuarios TH
        $consulta = "SELECT propiedad.id, propiedad.nombrePropiedad as privilegios ";
        $consulta .= " FROM propiedad ";
        $consulta .= " LEFT OUTER JOIN thPropiedad ";
        $consulta .= " ON propiedad.id=thPropiedad.propiedad_id ";
        $consulta .= " LEFT OUTER JOIN anfitriones ";
        $consulta .= " ON anfitriones.id=thPropiedad.anfitriones_id ";
        // $th = UserTH::SQL($consulta);

        debuguear($consulta);
        
        $router->render('admin/index', [
            'propiedades' => $propiedades,
            'areas' => $areas,
            'puestos' => $puestos,
            'anfitriones' => $anfitriones,
            'th' => $th
        ]);
    }

    public static function crearPropiedad (Router $router) {

        $router->render('', [

        ]);
    }


}



