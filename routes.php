<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/controllers/AuthController.php';

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get the request URI and method
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_method = $_SERVER['REQUEST_METHOD'];

// Remove base path from URI if needed
$base_path = '/Mima-Website';
if (strpos($request_uri, $base_path) === 0) {
    $request_uri = substr($request_uri, strlen($base_path));
}

// Initialize the AuthController
$auth = new AuthController();

// Define routes
switch ($request_uri) {
    // Home and Landing Routes
    case '/':
    case '':
        // Show landing page for non-authenticated users, home for authenticated
        if (isset($_SESSION['user_id'])) {
            require_once __DIR__ . '/controllers/HomeController.php';
            $home = new HomeController();
            $home->index();
        } else {
            require_once __DIR__ . '/views/index.php';
        }
        break;

    case '/home':
        require_once __DIR__ . '/controllers/HomeController.php';
        $home = new HomeController();
        $home->index();
        break;

    // Authentication Routes
    case '/register':
        if ($request_method === 'POST') {
            $auth->register();
        } else {
            require_once __DIR__ . '/views/auth/register.php';
        }
        break;

    case '/login':
        if ($request_method === 'POST') {
            $auth->login();
        } else {
            require_once __DIR__ . '/views/auth/login.php';
        }
        break;

    case '/logout':
        $auth->logout();
        break;

    case '/forgot-password':
        if ($request_method === 'POST') {
            $auth->forgotPassword();
        } else {
            require_once __DIR__ . '/views/auth/forgot-password.php';
        }
        break;

    case (preg_match('/^\/reset-password\/([a-zA-Z0-9]+)$/', $request_uri, $matches) ? true : false):
        $token = $matches[1];
        if ($request_method === 'POST') {
            $auth->resetPassword($token);
        } else {
            require_once __DIR__ . '/views/auth/reset-password.php';
        }
        break;

    // Product Routes
    case '/products':
        echo "<h1>Products Coming Soon!</h1>";
        echo "<p>This will show all products.</p>";
        echo '<a href="/">← Back to Home</a>';
        break;

    case '/products/create':
        echo "<h1>Sell Your Products</h1>";
        echo "<p>Product creation form will be here.</p>";
        echo '<a href="/">← Back to Home</a>';
        break;

    // Help Route
    case '/help':
        echo "<h1>Help Center</h1>";
        echo "<p>Help documentation will be here.</p>";
        echo '<a href="/">← Back to Home</a>';
        break;

    // Profile Route
    case '/profile':
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit;
        }
        echo "<h1>My Profile</h1>";
        echo "<p>Welcome, " . htmlspecialchars($_SESSION['user_name']) . "!</p>";
        echo '<a href="/">← Back to Home</a>';
        break;

    default:
        // 404 Not Found
        header("HTTP/1.0 404 Not Found");
        require_once __DIR__ . '/views/404.php';
        break;
}