<?php

namespace Johnoye742\Assignment\Models;

class User {
    public $username;
    public $password;
    public $role;
    public $tableName = 'users';

    public function __construct($username = '', $password = '', $role = 'user') {
        $this->username = $username;
        $this->password = $password;
        $this -> role = $role;
    }

    public function createTable() {
        
        $connection = new \PDO('mysql:host=localhost;dbname=asher;', 'ash', 'me');        $connection -> exec("CREATE TABLE $this -> tableName (id INT(10) PRIMARY KEY AUTO_INCREMENT UNSIGNED, username TEXT NOT NULL, pwd TEXT NOT NULL, rle TEXT NOT NULL)");
        echo "Table created successfully";
    }

    public function createUser() {
        $tableName = $this -> tableName;
        $username = $this -> username;
        $password = $this -> password;
        $role = $this -> role;
        
        $connection = new \PDO('mysql:host=localhost;dbname=asher;', 'ash', 'me');
        $query = $connection -> query("INSERT INTO $tableName (username, pwd, rle)
        VALUES ('$username', '$password', '$role')");

        if($query) {
            return true;
        }
    }
}
    