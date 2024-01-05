<?php
namespace Johnoye742\Asher\Controllers;

use Johnoye742\Asher\Controller;

class MainController extends Controller {

    public function index() {
        $this->render('index');
    }

    public function home() {
        $this -> render('home');
    }
}