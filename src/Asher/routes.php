<?php

use Johnoye742\Asher\Asher\Router;
use Johnoye742\Asher\Controllers\UserController;
use Johnoye742\Asher\Controllers\MainController;

$router = new Router();

$router->addRoute('/', MainController::class, 'index');

$router -> addRoute('/register', UserController::class, 'register');

$router -> addRoute('/login', UserController::class, 'login');

$router -> addRoute('/createUser', UserController::class, 'registerPost');

$router -> addRoute('/hasher', UserController::class, 'hasher');
    
$router -> addRoute('/home', MainController::class, 'home');

$router -> addRoute('/logout', UserController::class, 'logout');