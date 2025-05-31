<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/controllers/AuthController.php';

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
    // Home and Authentication Routes
    case '/':
        require_once __DIR__ . '/controllers/HomeController.php';
        $home = new HomeController();
        $home->index();
        break;

    case '/register':
        if ($request_method === 'POST') {
            $auth->register();
        } else {
            $auth->register();
        }
        break;

    case '/login':
        if ($request_method === 'POST') {
            $auth->login();
        } else {
            $auth->login();
        }
        break;

    case '/logout':
        $auth->logout();
        break;

    case '/forgot-password':
        if ($request_method === 'POST') {
            $auth->forgotPassword();
        } else {
            $auth->forgotPassword();
        }
        break;

    case (preg_match('/^\/reset-password\/([a-zA-Z0-9]+)$/', $request_uri, $matches) ? true : false):
        $token = $matches[1];
        if ($request_method === 'POST') {
            $auth->resetPassword($token);
        } else {
            $auth->resetPassword($token);
        }
        break;

    // Product Routes
    case '/products':
        require_once __DIR__ . '/controllers/ProductController.php';
        $products = new ProductController();
        $products->index();
        break;

    case '/products/create':
        require_once __DIR__ . '/controllers/ProductController.php';
        $products = new ProductController();
        if ($request_method === 'POST') {
            $products->create();
        } else {
            $products->create();
        }
        break;

    case (preg_match('/^\/products\/(\d+)$/', $request_uri, $matches) ? true : false):
        require_once __DIR__ . '/controllers/ProductController.php';
        $products = new ProductController();
        $productId = $matches[1];
        if ($request_method === 'POST') {
            $products->update($productId);
        } else {
            $products->show($productId);
        }
        break;

    case (preg_match('/^\/products\/(\d+)\/delete$/', $request_uri, $matches) ? true : false):
        require_once __DIR__ . '/controllers/ProductController.php';
        $products = new ProductController();
        $products->delete($matches[1]);
        break;

    // Transaction Routes
    case '/transactions':
        require_once __DIR__ . '/controllers/TransactionController.php';
        $transactions = new TransactionController();
        $transactions->index();
        break;

    case '/transactions/create':
        require_once __DIR__ . '/controllers/TransactionController.php';
        $transactions = new TransactionController();
        if ($request_method === 'POST') {
            $transactions->create();
        } else {
            $transactions->create();
        }
        break;

    case (preg_match('/^\/transactions\/(\d+)$/', $request_uri, $matches) ? true : false):
        require_once __DIR__ . '/controllers/TransactionController.php';
        $transactions = new TransactionController();
        $transactionId = $matches[1];
        if ($request_method === 'POST') {
            $transactions->update($transactionId);
        } else {
            $transactions->show($transactionId);
        }
        break;

    case (preg_match('/^\/transactions\/(\d+)\/cancel$/', $request_uri, $matches) ? true : false):
        require_once __DIR__ . '/controllers/TransactionController.php';
        $transactions = new TransactionController();
        $transactions->cancel($matches[1]);
        break;

    // Profile Routes
    case '/profile':
        require_once __DIR__ . '/controllers/ProfileController.php';
        $profile = new ProfileController();
        $profile->index();
        break;

    case '/profile/edit':
        require_once __DIR__ . '/controllers/ProfileController.php';
        $profile = new ProfileController();
        if ($request_method === 'POST') {
            $profile->update();
        } else {
            $profile->edit();
        }
        break;

    case '/profile/products':
        require_once __DIR__ . '/controllers/ProfileController.php';
        $profile = new ProfileController();
        $profile->products();
        break;

    case '/profile/transactions':
        require_once __DIR__ . '/controllers/ProfileController.php';
        $profile = new ProfileController();
        $profile->transactions();
        break;

    // Search and Category Routes
    case '/search':
        require_once __DIR__ . '/controllers/SearchController.php';
        $search = new SearchController();
        $search->index();
        break;

    case (preg_match('/^\/categories\/([a-zA-Z0-9-]+)$/', $request_uri, $matches) ? true : false):
        require_once __DIR__ . '/controllers/CategoryController.php';
        $category = new CategoryController();
        $category->show($matches[1]);
        break;

    case (preg_match('/^\/categories\/([a-zA-Z0-9-]+)\/([a-zA-Z0-9-]+)$/', $request_uri, $matches) ? true : false):
        require_once __DIR__ . '/controllers/CategoryController.php';
        $category = new CategoryController();
        $category->showSubcategory($matches[1], $matches[2]);
        break;

    // Help and Support Routes
    case '/help':
        require_once __DIR__ . '/controllers/HelpController.php';
        $help = new HelpController();
        $help->index();
        break;

    case '/help/contact':
        require_once __DIR__ . '/controllers/HelpController.php';
        $help = new HelpController();
        if ($request_method === 'POST') {
            $help->contact();
        } else {
            $help->contact();
        }
        break;

    case '/help/faq':
        require_once __DIR__ . '/controllers/HelpController.php';
        $help = new HelpController();
        $help->faq();
        break;

    // API Routes
    case '/api/products/search':
        require_once __DIR__ . '/controllers/ApiController.php';
        $api = new ApiController();
        $api->searchProducts();
        break;

    case '/api/categories':
        require_once __DIR__ . '/controllers/ApiController.php';
        $api = new ApiController();
        $api->getCategories();
        break;

    case '/api/locations':
        require_once __DIR__ . '/controllers/ApiController.php';
        $api = new ApiController();
        $api->getLocations();
        break;

    default:
        // 404 Not Found
        header("HTTP/1.0 404 Not Found");
        require_once __DIR__ . '/views/404.php';
        break;
} 