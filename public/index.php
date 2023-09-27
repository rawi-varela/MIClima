<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\THController;
use Controllers\LiderController;
use Controllers\LoginController;
use Controllers\AnfitrionController;
use Controllers\AnfitrionRelacionalController;
use Controllers\EvaluacionController;
use Controllers\PaginasController;
use Controllers\AdminController;

$router = new Router(); //Instancia de Router para mostrar vistas

//Iniciar Sesión
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// ZONA PÚBLICA
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'us']);

// ZONA PRIVADA
$router->get('/admin', [AdminController::class, 'admin']);
// Propiedades
$router->get('/admin/propiedades-crear', [AdminController::class, 'crearPropiedad']);
$router->post('/admin/propiedades-crear', [AdminController::class, 'crearPropiedad']);
$router->get('/admin/propiedades-actualizar', [AdminController::class, 'actualizarPropiedad']);
$router->post('/admin/propiedades-actualizar', [AdminController::class, 'actualizarPropiedad']);
$router->post('/admin/propiedades-eliminar', [AdminController::class, 'eliminarPropiedad']);
// Areas
$router->get('/admin/areas-crear', [AdminController::class, 'crearArea']);
$router->post('/admin/areas-crear', [AdminController::class, 'crearArea']);
$router->get('/admin/areas-actualizar', [AdminController::class, 'actualizarArea']);
$router->post('/admin/areas-actualizar', [AdminController::class, 'actualizarArea']);
$router->post('/admin/areas-eliminar', [AdminController::class, 'eliminarArea']);
// Puestos
$router->get('/admin/puestos-crear', [AdminController::class, 'crearPuesto']);
$router->post('/admin/puestos-crear', [AdminController::class, 'crearPuesto']);
$router->get('/admin/puestos-actualizar', [AdminController::class, 'actualizarPuesto']);
$router->post('/admin/puestos-actualizar', [AdminController::class, 'actualizarPuesto']);
$router->post('/admin/puestos-eliminar', [AdminController::class, 'eliminarPuesto']);
// Usuarios TH
$router->get('/admin/th-crear', [AdminController::class, 'crearTH']);
$router->post('/admin/th-crear', [AdminController::class, 'crearTH']);
$router->get('/admin/th-actualizar', [AdminController::class, 'actualizarTH']);
$router->post('/admin/th-actualizar', [AdminController::class, 'actualizarTH']);
$router->post('/admin/th-eliminar', [AdminController::class, 'eliminarTH']); //Antes Inactivar el AnfitrionTH


$router->get('/anfitrion-perfil', [EvaluacionController::class, 'anfitrion']);
$router->post('/anfitrion-perfil', [AnfitrionController::class, 'anfitrion']);

// $router->get('/lider-perfil', [LiderController::class, 'lider']);
$router->get('/lider-evaluar', [LiderController::class, 'evaluar']);
$router->post('/lider-evaluar', [LiderController::class, 'evaluar']);
$router->get('/lider-historial', [LiderController::class, 'historial']);

$router->get('/th-perfil', [THController::class, 'th']);
$router->post('/th-perfil', [THController::class, 'th']);

//
$router->get('/lider-perfil', [AnfitrionRelacionalController::class, 'anfitrionesCompletos']);
$router->get('/th-administrar-anfitriones', [AnfitrionRelacionalController::class, 'anfitrionesCompletos']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();