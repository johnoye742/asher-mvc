<?php

// Overhead to be added to every route, for redirecting unauthorized users


// Checks if the session is set or not
if(isset($_SESSION['current_user']) && !empty($_SESSION['current_user']) && $_SESSION['current_user'] != null) {
    // If the session is set redirect the user to the home page and do nothing if they are already one the home page
    if($_SERVER['REQUEST_URI'] != '/home')
        header('Location: /home');
} else {
    // If the session is not set redirect the user to the login page, do nothing if it they are on the login page or the index page
    if($_SERVER['REQUEST_URI'] != '/login' && $_SERVER['REQUEST_URI'] != '/' && $_SERVER['REQUEST_URI'] != '/register')
        header('Location: /login');
}

?>