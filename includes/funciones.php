<?php

use Model\AnfitrionRelacional;

define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/propiedades'); //documento_root devuelve la carpeta public creo
define('CARPETA_IMAGENES_EVALUACIONES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/evaluaciones'); //documento_root devuelve la carpeta public creo

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

//Validar la URL por un ID válido
function validarORedireccionar(string $url) {
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header("Location: $url " );
    }

    return $id;
}

function pagina_actual($path ) : bool {
    return str_contains( $_SERVER['PATH_INFO'] ?? '/', $path  ) ? true : false;
}

// Función que revisa que el usuario este autenticado
// Para proteger las rutas
function is_auth() : bool {
    if(!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['login']) && !empty($_SESSION);
}
function is_admin() : bool {
    if(!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['admin']) && !empty($_SESSION['admin']);
}
function is_th() : bool {
    if(!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['th']) && !empty($_SESSION['th']);
}
function is_lider() : bool {
    if(!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['lider']) && !empty($_SESSION['lider']);
}
function is_anfitrion() : bool {
    if(!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION['anfitrion']) && !empty($_SESSION['anfitrion']);
}

function allAnfitriones($columna = '', $valor = '') {
    // Consultar la base de datos
    $consulta = "SELECT anfitriones.id, anfitriones.nombre, anfitriones.apellidoPat, anfitriones.apellidoMat, anfitriones.fechaInicio, estadoUsuario.estado, ";
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

    if($columna){
        $consulta .= " WHERE $columna = $valor";
        
    }

    $resultado = AnfitrionRelacional::SQL($consulta);
    return $resultado;
}


function aos_animacion() : void { //pendiente
    $efectos = ['fade-up', 'fade-down', 'fade-left', 'fade-right', 'flip-left', 'flip-right', 'zoom-in', 'zoom-in-up', 'zoom-in-down', 'zoom-out'];
    $efecto = array_rand($efectos, 1);
    echo ' data-aos="' . $efectos[$efecto] . '" ';
}