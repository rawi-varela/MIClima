<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\THController;
use Controllers\APIController;
use Controllers\AdminController;
use Controllers\APICompetencias;
use Controllers\LiderController;
use Controllers\LoginController;
use Controllers\PaginasController;
use Controllers\AnfitrionController;
use Controllers\EvaluacionController;
use Controllers\AnfitrionRelacionalController;

$router = new Router(); //Instancia de Router para mostrar vistas

//Iniciar Sesión
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->post('/logout', [LoginController::class, 'logout']);

// ZONA PÚBLICA
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'us']);
$router->get('/404', [PaginasController::class, 'error']);

// ZONA PRIVADA
$router->get('/admin/dashboard', [AdminController::class, 'index']);
// Propiedades
$router->get('/admin/propiedades', [AdminController::class, 'propiedades']);
$router->get('/admin/propiedades-crear', [AdminController::class, 'crearPropiedad']);
$router->post('/admin/propiedades-crear', [AdminController::class, 'crearPropiedad']);
$router->get('/admin/propiedades-actualizar', [AdminController::class, 'actualizarPropiedad']);
$router->post('/admin/propiedades-actualizar', [AdminController::class, 'actualizarPropiedad']);
$router->post('/admin/propiedades-eliminar', [AdminController::class, 'eliminarPropiedad']);
// Areas
$router->get('/admin/areas', [AdminController::class, 'areas']);
$router->get('/admin/areas-crear', [AdminController::class, 'crearArea']);
$router->post('/admin/areas-crear', [AdminController::class, 'crearArea']);
$router->get('/admin/areas-actualizar', [AdminController::class, 'actualizarArea']);
$router->post('/admin/areas-actualizar', [AdminController::class, 'actualizarArea']);
$router->post('/admin/areas-eliminar', [AdminController::class, 'eliminarArea']);
// Puestos
$router->get('/admin/puestos', [AdminController::class, 'puestos']);
$router->get('/admin/puestos-crear', [AdminController::class, 'crearPuesto']);
$router->get('/admin/api', [APIController::class, 'puestos']);
$router->post('/admin/puestos-crear', [AdminController::class, 'crearPuesto']);
$router->get('/admin/puestos-actualizar', [AdminController::class, 'actualizarPuesto']);
$router->post('/admin/puestos-actualizar', [AdminController::class, 'actualizarPuesto']);
$router->post('/admin/puestos-eliminar', [AdminController::class, 'eliminarPuesto']);
// Usuarios TH
$router->get('/admin/th', [AdminController::class, 'THs']);
$router->get('/admin/th-crear', [AdminController::class, 'crearTH']);
$router->get('/admin/api', [APIController::class, 'index']);
$router->post('/admin/th-crear', [AdminController::class, 'crearTH']);
$router->get('/admin/th-privilegios', [AdminController::class, 'crearPrivilegios']);
$router->post('/admin/th-privilegios', [AdminController::class, 'crearPrivilegios']);
$router->post('/admin/th-privilegios-eliminar', [AdminController::class, 'eliminarPrivilegios']);
$router->get('/admin/th-actualizar', [AdminController::class, 'actualizarTH']);
$router->post('/admin/th-actualizar', [AdminController::class, 'actualizarTH']);
$router->post('/admin/th-eliminar', [AdminController::class, 'eliminarTH']); //Antes Inactivar el AnfitrionTH


// ANFITRION
$router->get('/anfitrion-perfil', [EvaluacionController::class, 'anfitrion']);
$router->post('/anfitrion-perfil', [AnfitrionController::class, 'anfitrion']);
$router->get('/anfitrion/api', [APICompetencias::class, 'index']);


// LIDER
$router->get('/lider-perfil', [LiderController::class, 'index']);
$router->get('/lider-evaluar', [LiderController::class, 'evaluar']);
$router->post('/lider-evaluar', [LiderController::class, 'evaluar']);
$router->get('/lider-historial', [LiderController::class, 'historial']);
$router->post('/lider-historial', [LiderController::class, 'historial']);


// TH
$router->get('/th-perfil', [THController::class, 'th']);
// $router->post('/th-perfil', [THController::class, 'th']);
$router->get('/api/propiedades', [APIController::class, 'propiedades']);
$router->get('/th-administrar-anfitriones', [AnfitrionRelacionalController::class, 'anfitrionesCompletos']);
$router->get('/th-agregar-anfitriones', [THController::class, 'crearAnfitrion']);
$router->post('/th-agregar-anfitriones', [THController::class, 'crearAnfitrion']);
$router->get('/th-actualizar-anfitriones', [THController::class, 'actualizarAnfitrion']);
$router->post('/th-actualizar-anfitriones', [THController::class, 'actualizarAnfitrion']);
$router->get('/th-deshabilitar-anfitriones', [THController::class, 'deshabilitarAnfitrion']);
$router->post('/th-deshabilitar-anfitriones', [THController::class, 'deshabilitarAnfitrion']);
$router->get('/th-activar-anfitriones', [THController::class, 'activarAnfitrion']);
$router->post('/th-activar-anfitriones', [THController::class, 'activarAnfitrion']);
//




// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();