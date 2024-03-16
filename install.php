<?php


$con = new \PDO('mysql:host=localhost', 'ash', 'me');
$con -> exec('CREATE DATABASE IF NOT EXISTS asher');

function createTable() {
        
    $connection = new \PDO('mysql:host=localhost;dbname=asher;', 'ash', 'me');
    $connection -> exec("CREATE TABLE users (id INT(10) UNSIGNED PRIMARY KEY AUTO_INCREMENT, username TEXT NOT NULL, pwd TEXT NOT NULL, rle TEXT NOT NULL)");
    echo "Table created successfully";
}

createTable();