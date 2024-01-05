<?php
include "config.php";
$GLOBALS["connection"] = new \PDO("mysql:host=$host;dbname=$dbName;", "$username", "$password");