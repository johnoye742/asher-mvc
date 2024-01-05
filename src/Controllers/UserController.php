<?php

namespace Johnoye742\Assignment\Controllers;

use Johnoye742\Assignment\Controller;
use Johnoye742\Assignment\Models\User;

class UserController extends Controller {
    public function index() {
        $this->render('index');
    }

    public function register() {
        $this -> render('register');
    }

    public function registerPost() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
            $role = htmlspecialchars($_POST['role']);
            $newUser = new User($username, $password, $role);

            if($newUser -> createUser()) echo 'success';
        }
        
    }

    public function login() {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $user = new User($username, $password);

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
            // Remove the user data from the session and then redirect to index
            unset($_SESSION['current_user']);
            header('Location: /index.php');
        } else {
            echo 'there is no user';
            // If there's a logged in user already, redirect back
            header('Location: /home');
        }
    }
}
    