<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\PlantaController;
use MVC\Router;
use Controllers\SahumerioController;
use Controllers\PaginasController;
use Controllers\LoginController;
use Controllers\CarritoController;

$router = new Router();


// Zona privada
$router->get('/admin', [SahumerioController::class, 'index']);
$router->get('/sahumerios/crear', [SahumerioController::class, 'crear']);
$router->post('/sahumerios/crear', [SahumerioController::class, 'crear']);
$router->get('/sahumerios/actualizar', [SahumerioController::class, 'actualizar']);
$router->post('/sahumerios/actualizar', [SahumerioController::class, 'actualizar']);
$router->post('/sahumerios/eliminar', [SahumerioController::class, 'eliminar']);
$router->get('/sahumerios/pedidos', [SahumerioController::class, 'pedidos']);


$router->get('/plantas/crear', [PlantaController::class, 'crear']);
$router->post('/plantas/crear', [PlantaController::class, 'crear']);
$router->get('/plantas/actualizar', [PlantaController::class, 'actualizar']);
$router->post('/plantas/actualizar', [PlantaController::class, 'actualizar']);
$router->post('/plantas/eliminar', [PlantaController::class, 'eliminar']);

// Zona publica
$router->get('/', [PaginasController::class, 'index']);
$router->get('/productos', [PaginasController::class, 'productos']);
$router->get('/sahumerios', [PaginasController::class, 'sahumerios']);
$router->get('/plantas', [PaginasController::class, 'plantas']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

// Login y autenticacion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Recuperar password
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

// Crear Cuenta
$router->get('/registrar', [LoginController::class, 'registrar']);
$router->post('/registrar', [LoginController::class, 'registrar']);

// Confirmar cuenta
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

$router->get('/api/carrito', [CarritoController::class, 'carrito']);
$router->post('/api/venta', [CarritoController::class, 'direccion']);
$router->post('/api/eliminar', [CarritoController::class, 'eliminar']);

$router->comprobarRutas();

?>