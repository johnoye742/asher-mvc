<?php

namespace Johnoye742\Asher;

class Controller {
    protected function render($view, $data = []) {

        include "src/Asher/overhead.php";
        extract($data);
        
        include "Views/$view.php";

        session_destroy();
    }
}
    