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
}
    