<?php

$host = 'localhost';
$username = 'ash';
$password = 'me';
$dbName = 'asher';

$connection = new \PDO("mysql:host=$host;dbname=$dbName;", "$username", "$password");