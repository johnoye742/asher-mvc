
<?php

// Start the session on every page
session_start();

// Load composer files
require 'vendor/autoload.php';

// Get the request uri
$uri = $_SERVER['REQUEST_URI'];

// Require routes.php so we can use the $router variable to display the requested route
require 'src/Asher/routes.php';

// Add database configs to every page
include 'config.php';

// Add database config and global connection
include "src/Asher/database.php";

// Show the requested route
$router->dispatch($uri);
    