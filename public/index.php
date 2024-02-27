<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\APIController;
use Controllers\AdminController;
use Controllers\LoginController;
use Controllers\PaginasController;

$router = new Router(); //Instancia de Router para mostrar vistas

//Iniciar Sesión
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->post('/logout', [LoginController::class, 'logout']);

// ZONA PÚBLICA
$router->get('/', [PaginasController::class, 'index']);
$router->get('/encuesta', [PaginasController::class, 'responder']);
$router->post('/encuesta', [PaginasController::class, 'responder']);
$router->get('/encuesta/api', [APIController::class, 'departamentos']);
$router->get('/404', [PaginasController::class, 'error']);
$router->get('/respuestas-enviadas', [PaginasController::class, 'volver']);


// ZONA PRIVADA
$router->get('/admin/dashboard', [AdminController::class, 'index']);
// Areas
$router->get('/admin/areas', [AdminController::class, 'areas']);
$router->get('/admin/areas-crear', [AdminController::class, 'crearArea']);
$router->post('/admin/areas-crear', [AdminController::class, 'crearArea']);
$router->get('/admin/areas-actualizar', [AdminController::class, 'actualizarArea']);
$router->post('/admin/areas-actualizar', [AdminController::class, 'actualizarArea']);
$router->post('/admin/areas-eliminar', [AdminController::class, 'eliminarArea']);
// Progreso
$router->get('/admin/progreso', [AdminController::class, 'progreso']);
// Resultado
$router->get('/admin/resultados', [AdminController::class, 'resultados']);
$router->post('/admin/resultados', [AdminController::class, 'resultados']);
$router->get('/resultados/api', [APIController::class, 'filtro']);



// Registrar Users USUARIO MASTER
$router->get('/admin/administradores', [AdminController::class, 'administradores']);
$router->get('/admin/administradores-crear', [AdminController::class, 'crearAdministradores']);
$router->post('/admin/administradores-crear', [AdminController::class, 'crearAdministradores']);
$router->get('/admin/administradores-actualizar', [AdminController::class, 'actualizAradministradores']);
$router->post('/admin/administradores-actualizar', [AdminController::class, 'actualizAradministradores']);
$router->post('/admin/administradores-eliminar', [AdminController::class, 'eliminarAdministradores']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();


