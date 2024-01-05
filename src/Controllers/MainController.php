<?php
namespace Johnoye742\Assignment\Controllers;

use Johnoye742\Assignment\Controller;

class MainController extends Controller {
    public function home () {
        $this -> render('home');
    }
}