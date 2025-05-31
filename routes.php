<?php
require_once __DIR__ . '/config/config.php';

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the request URI and method
$request_uri = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];

// Remove query string from URI
$request_uri = strtok($request_uri, '?');

// Remove base path from URI
$base_path = '/Mima-Website';
if (strpos($request_uri, $base_path) === 0) {
    $request_uri = substr($request_uri, strlen($base_path));
}

// Ensure URI starts with /
if (empty($request_uri)) {
    $request_uri = '/';
}

// Debug: Log the request
error_log("Processing URI: " . $request_uri);

// Don't include header here - let each view handle it

// Route handling
switch ($request_uri) {
    case '/':
    case '/index.php':
    case '/routes.php':
        // Check if user is logged in
        if (isset($_SESSION['user_id'])) {
            require_once __DIR__ . '/views/home.php';
        } else {
            require_once __DIR__ . '/views/index.php';
        }
        break;
        
    case '/home':
        require_once __DIR__ . '/views/home.php';
        break;
        
    case '/login':
        require_once __DIR__ . '/views/auth/login.php';
        break;
        
    case '/register':
        require_once __DIR__ . '/views/auth/register.php';
        break;
        
    case '/logout':
        session_destroy();
        header("Location: /Mima-Website/");
        exit;
        break;
        
    case '/products':
        echo '<div class="container" style="padding: 2rem; text-align: center;">';
        echo '<h1>Products Page</h1>';
        echo '<p>Products listing will be displayed here.</p>';
        echo '<a href="/Mima-Website/" class="btn btn-primary">Back to Home</a>';
        echo '</div>';
        break;
        
    case '/help':
        echo '<div class="container" style="padding: 2rem; text-align: center;">';
        echo '<h1>Help Center</h1>';
        echo '<p>Help and documentation will be displayed here.</p>';
        echo '<a href="/Mima-Website/" class="btn btn-primary">Back to Home</a>';
        echo '</div>';
        break;
        
    case '/profile':
        if (!isset($_SESSION['user_id'])) {
            header("Location: /Mima-Website/login");
            exit;
        }
        echo '<div class="container" style="padding: 2rem; text-align: center;">';
        echo '<h1>My Profile</h1>';
        echo '<p>Welcome, ' . htmlspecialchars($_SESSION['user_name'] ?? 'User') . '!</p>';
        echo '<a href="/Mima-Website/" class="btn btn-primary">Back to Home</a>';
        echo '</div>';
        break;
        
    default:
        // 404 Not Found
        header("HTTP/1.0 404 Not Found");
        echo '<div class="container" style="padding: 2rem; text-align: center;">';
        echo '<h1>404 - Page Not Found</h1>';
        echo '<p>The page you are looking for does not exist.</p>';
        echo '<a href="/Mima-Website/" class="btn btn-primary">Go to Home</a>';
        echo '</div>';
        break;
}

// Don't include footer here - let each view handle it
?>