<?php

use Johnoye742\Assignment\Models\User;

include 'config.php';
include 'src/Models/User.php';

print "Creating database 'asher' \n";
$GLOBALS['connection'] -> exec('CREATE DATABASE IF NOT EXISTS asher');

$user = new User();

print "Creating table 'users' \n";
$user -> createTable();