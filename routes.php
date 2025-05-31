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
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_method = $_SERVER['REQUEST_METHOD'];

// Remove base path from URI if needed
$base_path = '/Mima-Website';
if (strpos($request_uri, $base_path) === 0) {
    $request_uri = substr($request_uri, strlen($base_path));
}

// Ensure URI starts with /
if (empty($request_uri) || $request_uri === '') {
    $request_uri = '/';
}

// Debug: Log the request URI
error_log("Request URI: " . $request_uri);

// Define routes
switch ($request_uri) {
    // Home and Landing Routes
    case '/':
    case '':
    case '/index':
        // Show landing page for non-authenticated users, home for authenticated
        if (isset($_SESSION['user_id'])) {
            // User is logged in - show home page
            require_once __DIR__ . '/controllers/HomeController.php';
            $home = new HomeController();
            $home->index();
        } else {
            // User is not logged in - show landing page
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
            require_once __DIR__ . '/controllers/AuthController.php';
            $auth = new AuthController();
            $auth->register();
        } else {
            require_once __DIR__ . '/views/auth/register.php';
        }
        break;

    case '/login':
        if ($request_method === 'POST') {
            require_once __DIR__ . '/controllers/AuthController.php';
            $auth = new AuthController();
            $auth->login();
        } else {
            require_once __DIR__ . '/views/auth/login.php';
        }
        break;

    case '/logout':
        require_once __DIR__ . '/controllers/AuthController.php';
        $auth = new AuthController();
        $auth->logout();
        break;

    case '/forgot-password':
        if ($request_method === 'POST') {
            require_once __DIR__ . '/controllers/AuthController.php';
            $auth = new AuthController();
            $auth->forgotPassword();
        } else {
            require_once __DIR__ . '/views/auth/forgot-password.php';
        }
        break;

    // Product Routes
    case '/products':
        echo "<div class='container' style='padding: 2rem; text-align: center;'>";
        echo "<h1>Products Coming Soon!</h1>";
        echo "<p>This will show all products.</p>";
        echo '<a href="/Mima-Website/" class="btn btn-primary">← Back to Home</a>';
        echo "</div>";
        break;

    case '/products/create':
        echo "<div class='container' style='padding: 2rem; text-align: center;'>";
        echo "<h1>Sell Your Products</h1>";
        echo "<p>Product creation form will be here.</p>";
        echo '<a href="/Mima-Website/" class="btn btn-primary">← Back to Home</a>';
        echo "</div>";
        break;

    // Help Route
    case '/help':
        echo "<div class='container' style='padding: 2rem; text-align: center;'>";
        echo "<h1>Help Center</h1>";
        echo "<p>Help documentation will be here.</p>";
        echo '<a href="/Mima-Website/" class="btn btn-primary">← Back to Home</a>';
        echo "</div>";
        break;

    // Profile Route
    case '/profile':
        if (!isset($_SESSION['user_id'])) {
            header("Location: /Mima-Website/login");
            exit;
        }
        echo "<div class='container' style='padding: 2rem; text-align: center;'>";
        echo "<h1>My Profile</h1>";
        echo "<p>Welcome, " . htmlspecialchars($_SESSION['user_name'] ?? 'User') . "!</p>";
        echo '<a href="/Mima-Website/" class="btn btn-primary">← Back to Home</a>';
        echo "</div>";
        break;

    default:
        // 404 Not Found
        header("HTTP/1.0 404 Not Found");
        require_once __DIR__ . '/views/404.php';
        break;
}