<?php

namespace Johnoye742\Assignment\Models;

use Johnoye742\Assignment\Models\BaseModel;

class User {
    public $username;
    public $password;
    public $role;
    public $tableName = 'users';
    public $connection;
    

    public function __construct($username = '', $password = '', $role = 'user') {
        $this->username = $username;
        $this->password = $password;
        $this -> role = $role;
        $this -> connection = $GLOBALS['connection'];
    }

    public function createTable() {
        
        
        // Create Users Table
        $this -> connection -> exec("CREATE TABLE $this -> tableName (id INT(10) PRIMARY KEY AUTO_INCREMENT UNSIGNED, username TEXT NOT NULL, pwd TEXT NOT NULL, rle TEXT NOT NULL)");
        echo "Table created successfully";
    }

    public function createUser() {

        // Set values to be used from the model
        $tableName = $this -> tableName;
        $username = $this -> username;
        $password = $this -> password;
        $role = $this -> role;
        
        // Make query statement to insert all the values into the users table
        $query = $this -> connection -> query("INSERT INTO $tableName (username, pwd, rle)
        VALUES ('$username', '$password', '$role')");

        /* If the query statement returns true, return true, why? IDK jus... oops just realised
        I could just return the query statement instead, smartass when?
        */
            return $query;

    }

    public function authenticate () {
        $username = $this->username;
        $password = $this->password;
        $role = $this->role;

        // Login query statement to know if a user with the credentials exist
        $sql = "SELECT * FROM users WHERE username = :username AND rle = :role;";

        // Check if $connection is not equal to null before proceeding

        if($this -> connection != null) {
            // Prepare the SQL statement
            $stmt = $this -> connection->prepare($sql);
    
            // Not adding the values directly to prevent SQL injections
            $stmt->execute(['username' => $username, 'role' => $role]);
    
            // Fetch the results in an array
            $result = $stmt->fetch();
    
            // Will return false if there was no result
            if($result) {
            
                /* Check if the result is greater than zero, which now thinking about it, that's not really necessary with the 
                   command checking if there is or isnt a result above already, so I commented the line,
                   the password_verify function basically verifies if the stored hash is equal to the password recieved from the login form
                   and if it isn't it'll output "Login failed".
                */
                if (/* !count($result) > 0 || */ !password_verify($password, $result['pwd'])) {
                    echo 'Login failed';
                } else {
                    /* If login was successful, add the user data from the model to the session
                       excluding the password for security reasons, though not really necessary to exclude.
                    */
                    
                    header('Location: /home');
                    // Set the session variable for the current user using an array, we could also use a json using json_encode
                    $_SESSION['current_user'] = array("username" => $result['username'], "role" => $result['rle']);
                    
                    session_commit();
                    exit;
                    
                    echo 'Login successful';
                }
            } else {
    
                // Return login failed if there's no user with those credentials
                echo 'Login failed';
            }
        } else {
            echo 'why?';
        }
    }
    
    
}
    