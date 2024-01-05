<?php

namespace Johnoye742\Assignment\Controllers;

use Johnoye742\Assignment\Controller;
use Johnoye742\Assignment\Models\User;

class UserController extends Controller {
    

    public function register() {
        $this -> render('register');
    }

    public function registerPost() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = htmlspecialchars($_POST['username']);
            
            // using password_hash to hash the password with the PASSWORD_DEFAULT method of php, for security reasons
            $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
            $role = htmlspecialchars($_POST['role']);
            $newUser = new User($username, $password, $role);

            if($newUser -> createUser()) echo 'success';
        }
        
    }

    public function login() {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Clean the request data to prevent XSS attacks
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            // Set the user data on a model object
            $user = new User($username, $password);

            // Check whether user with the above data exist and logged them in if it does
            $user -> authenticate();
        }

        $this -> render('login', []);
    }

    public function hasher() {
        $this -> render('hasher');
    }

    public function logout() {
        // Only log out if there's a logged in user
        if(isset($_SESSION['current_user'])) {
            // Destroy the session and then redirect to index page
            session_destroy();
            header('Location: /index.php');
        } else {
            echo 'there is no user';
            // If there's a logged in user already, redirect back
            header('Location: /home');
        }
    }
}
    