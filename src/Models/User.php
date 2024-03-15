<?php

namespace Johnoye742\Assignment\Models;

class User {
    public $username;
    public $password;
    public $role;
    public $tableName = 'users';

    public function __construct($username, $password, $role = 'user') {
        $this->username = $username;
        $this->password = $password;
        $this -> password = $role;
    }

    public function createTable() {
        $connection = new \PDO('mysql:host=localhost;', 'root', '');
        $connection -> exec("CREATE TABLE $this -> tableName (id INT(10) PRIMARY KEY AUTO_INCREMENT UNSIGNED, username TEXT NOT NULL, pwd TEXT NOT NULL, rle TEXT NOT NULL)");
        echo "Table created successfully";
    }

    public function createUser() {
        $connection = new \PDO('mysql:host=localhost', 'root', '');
        $query = $connection -> query("INSERT INTO $this -> tableName (username, pwd, rle)
        VALUES ('$this -> username', '$this -> password', '$this -> role')");

        if($query) {
            return true;
        }
    }
}
    