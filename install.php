<?php

include 'config.php';

$tables = [
    "users" => ["username" => "TEXT NOT NULL", "pwd" => "TEXT NOT NULL", "rle" => "TEXT NOT NULL"],
    "sessions" => ["session_key" => "TEXT NOT NULL", "session_array" => "JSON NOT NULL", 'user_id' => "INT(10)"]
];

$connection = new \PDO("mysql:host=$host;", "$username", "$password");

print "Creating database 'asher' \n";
$connection -> exec('CREATE DATABASE IF NOT EXISTS asher');

$newConnection = new \PDO("mysql:host=$host;dbname=$dbName;", "$username", "$password");

foreach($tables as $table => $columns) {
    $stmt = 'CREATE TABLE IF NOT EXISTS ';
    $stmt .= $table . " (id INT(10) PRIMARY KEY AUTO_INCREMENT, ";

    foreach($columns as $column => $option) {
        $stmt .= $column . " " . $option . ", ";
    }

    $stmt = substr($stmt, 0, strlen($stmt) - 2);
    $stmt .= ");";
    
    if($newConnection -> query($stmt)) echo "Created Table $table \n";

}


