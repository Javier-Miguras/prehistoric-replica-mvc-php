<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
use Controllers\PaginasController;
use Controllers\PostController;
use Controllers\ProductController;
use Controllers\SellerController;

$router = new Router();

//Login & Logout

$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);

$router->get('/logout', [LoginController::class, 'logout']);

//Public Zone

$router->get('/', [PaginasController::class, 'index']);
$router->get('/about', [PaginasController::class, 'about']);
$router->get('/explore', [PaginasController::class, 'explore']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/post', [PaginasController::class, 'post']);
$router->get('/product', [PaginasController::class, 'product']);
$router->get('/contact', [PaginasController::class, 'contact']);
$router->post('/contact', [PaginasController::class, 'contact']);

//Private Zone

$router->get('/admin', [ProductController::class, 'index']);
$router->get('/product/create', [ProductController::class, 'create']);
$router->post('/product/create', [ProductController::class, 'create']);
$router->get('/product/update', [ProductController::class, 'update']);
$router->post('/product/update', [ProductController::class, 'update']);
$router->post('/product/delete', [ProductController::class, 'delete']);

$router->get('/post/create', [PostController::class, 'create']);
$router->post('/post/create', [PostController::class, 'create']);
$router->get('/post/update', [PostController::class, 'update']);
$router->post('/post/update', [PostController::class, 'update']);
$router->post('/post/delete', [PostController::class, 'delete']);

$router->get('/seller/create', [SellerController::class, 'create']);
$router->post('/seller/create', [SellerController::class, 'create']);
$router->get('/seller/update', [SellerController::class, 'update']);
$router->post('/seller/update', [SellerController::class, 'update']);
$router->post('/seller/delete', [SellerController::class, 'delete']);




// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();