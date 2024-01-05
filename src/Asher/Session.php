<?php

namespace Johnoye742\Asher;
use Johnoye742\Asher\Models\BaseModel;
use Johnoye742\Asher\Models\Model;

use PDOException;

class Session extends BaseModel implements Model {
    public $value;
    public $tableName = 'sessions';
    
    public function __construct(public $key = 0, public $user_id = 0)
    {
        $this -> connection = $GLOBALS['connection'];
    }

    public function setSession(array $array) {
        $this -> value = json_encode($array);
    }

    public function save() {
        try {
            $tableName = $GLOBALS['sessions_table'];
            $key = $this -> key;
            $value = $this -> value;
            $userid = $this -> user_id;
            setcookie('session_key', $this -> key, time() + 606024*30);
            $stmt = $this -> connection -> query("INSERT INTO $tableName (session_key, session_array, user_id)
            VALUES ('$key', '$value', '$userid')");

            return true;
        } catch (PDOException $ex) {
            return false;
            print $ex -> getMessage();
        }
    }

    public static function getSession() {
        $tableName = $GLOBALS['sessions_table'];
        $session_key = $_COOKIE['session_key'];

        if($session_key == null) return false;

        $sql = "SELECT * FROM $tableName WHERE session_key = :ses_key;";

        $stmt = $GLOBALS['connection'] -> prepare($sql);

        $stmt -> execute(['ses_key' => $session_key]);

        $result = $stmt -> fetchAll();

        return $result[0]['session_array'];
    }

    public function createTable () {
        // Create Sessions Table
        $this -> connection -> exec("CREATE TABLE IF NOT EXISTS $this -> tableName (id INT(10) PRIMARY KEY AUTO_INCREMENT UNSIGNED, session_key TEXT NOT NULL, session_array ARRAY, user_id INT(10))");
        echo "Sessions table created successfully";
    } 

    public static function destroySession() {
        $tableName = $GLOBALS['sessions_table'];
        $session_key = $_COOKIE['session_key'];

        $sql = "DELETE * FROM $tableName WHERE session_key = :ses_key";

        $stmt = $GLOBALS['connection'] -> prepare($sql);

        $stmt -> execute(['ses_key' => $session_key]);

        header('Location: /');
    }
}