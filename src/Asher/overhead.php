<?php

// Overhead to be added to every route, for redirecting unauthorized users

use Johnoye742\Asher\Session;

include 'src/Asher/Session.php';

$uri = $_SERVER['REQUEST_URI'];

// Do not redirect on these routes
$unprotected = ['/login', '/', '/register', '/hasher'];

// Get session from Asher Session helper
$session = Session::getSession();

// Checks if the session is set or not
if($session != false) {
    // If the session is set redirect the user to the home page and do nothing if they are already one the home page
    if($_SERVER['REQUEST_URI'] != '/home')
        header('Location: /home');
} else {
    // If the session is not set redirect the user to the login page, do nothing if it they are on the login page or the index page
    if(array_search($uri, $unprotected) == null && $uri != '/login')
        header('Location: /login');
}

?>