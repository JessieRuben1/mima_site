<?php
// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Session configuration
session_start();

// Site configuration
define('SITE_NAME', 'Trade with Me');
define('SITE_URL', 'http://localhost/Mima-Website');

// Path configuration
define('ROOT_PATH', dirname(__DIR__));
define('INCLUDES_PATH', ROOT_PATH . '/includes');
define('VIEWS_PATH', ROOT_PATH . '/views');
define('CONTROLLERS_PATH', ROOT_PATH . '/controllers');
define('MODELS_PATH', ROOT_PATH . '/models');

// Security configuration
define('HASH_COST', 12); // For password hashing
?> 