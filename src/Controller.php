<?php

namespace Johnoye742\Assignment;

class Controller {
    protected function render($view, $data = []) {
        extract($data);
        include "src/overhead.php";
        include "Views/$view.php";

        session_destroy();
    }
}
    