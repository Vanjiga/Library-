<?php
session_start();
require_once('vendor/autoload.php');
use app\Router;
use \app\controller\GlobalController;


 $router = new Router;
 // Start of routing for homepage
 $router->getMethod('/', [GlobalController::class, 'index']);
 $router->postMethod('/', [GlobalController::class, 'index']);
 $router->getMethod('/index', [GlobalController::class, 'index']);
 $router->postMethod('/index', [GlobalController::class, 'index']);
 // Start of routing for login
 $router->getMethod('/login', [GlobalController::class, 'login']);
 $router->postMethod('/login', [GlobalController::class, 'login']);
 // Start of routing for register
 $router->getMethod('/register', [GlobalController::class, 'register']);
 $router->postMethod('/register', [GlobalController::class, 'register']);
 // Start of routing for logout
 $router->getMethod('/logout', [GlobalController::class, 'logout']);
 // Start of routing for no-auth book loadout
 $router->getMethod('/showcase', [GlobalController::class, 'showcase']);
 $router->postMethod('/showcase', [GlobalController::class, 'showcase']);

// Start of routing for auth admin das
$router->getMethod("/library", [GlobalController::class, 'library']);
$router->postMethod('/library', [GlobalController::class, 'library']);



 
 $router->resolver();


