<?php

namespace Johnoye742\Assignment\Models;

class BaseModel {
    public $connection;

    public function __construct() {
        $host = 'localhost';
        $username = 'ash';
        $password = 'me';
        $dbName = 'asher';
        
        $this -> connection = new \PDO("mysql:host=$host;dbname=$dbName;", "$username", "$password");
        
    }
}