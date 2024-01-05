<?php

$host = 'localhost';
$username = 'ash';
$password = 'me';
$dbName = 'asher';

$GLOBALS["connection"] = new \PDO("mysql:host=$host;dbname=$dbName;", "$username", "$password");