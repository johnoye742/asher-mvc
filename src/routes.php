<?php

use Johnoye742\Assignment\Router;
use Johnoye742\Assignment\Controllers\UserController;
use Johnoye742\Assignment\Controllers\MainController;

$router = new Router();

$router->addRoute('/', UserController::class, 'index');

$router -> addRoute('/register', UserController::class, 'register');

$router -> addRoute('/login', UserController::class, 'login');

$router -> addRoute('/createUser', UserController::class, 'registerPost');

$router -> addRoute('/hasher', UserController::class, 'hasher');
    
$router -> addRoute('/home', MainController::class, 'home');

$router -> addRoute('/logout', UserController::class, 'logout');