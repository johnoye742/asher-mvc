<?php
namespace Johnoye742\Asher\Models;

class BaseModel {
    public $connection;
    public function __construct()
    {
        $this -> connection = $GLOBALS['connection'];
    }
    public function setValue($identifier, $val) {
        $this -> $identifier = $val;
    }

    public function getValue($identifier) {
        return $this -> $identifier;
    }

}