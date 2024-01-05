<?php

// Overhead to be added to every route, for redirecting unauthorized users

session_start();
echo $_COOKIE['current_user'];
echo 'fu';
if(isset($_SESSION['current_user']) && !empty($_SESSION['current_user']) && $_SESSION['current_user'] != null) {
    echo 'foo';
    if($_SERVER['REQUEST_URI'] != '/home')
        header('Location: /home');
} else {
    if($_SERVER['REQUEST_URI'] != '/login' && $_SERVER['REQUEST_URI'] = '/')
        header('Location: /login');
}

?>