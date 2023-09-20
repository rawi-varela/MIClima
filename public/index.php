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

$router = new Router(); //Instancia de Router para mostrar vistas

//Iniciar Sesión
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// ZONA PÚBLICA
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'us']);



// ZONA PRIVADA
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