<?php

use Johnoye742\Asher\Session;

include 'src/Asher/Session.php';

$array = ['e' => 'ew'];

$session = new Session(password_hash('session', PASSWORD_BCRYPT), 0);

$session -> setSession($array);

$session -> save();