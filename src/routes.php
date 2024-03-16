<?php

use Johnoye742\Assignment\Router;
use Johnoye742\Assignment\Controllers\UserController;

$router = new Router();

$router->addRoute('/', UserController::class, 'index');

$router -> addRoute('/register', UserController::class, 'register');

$router -> addRoute('/createUser', UserController::class, 'registerPost');
    