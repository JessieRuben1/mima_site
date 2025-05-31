<?php
// Start session at the very beginning
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Test database connection
require_once __DIR__ . '/config/database.php';
try {
    $db = new Database();
    echo "✅ Database connection successful\n";
} catch (Exception $e) {
    echo "❌ Database connection failed: " . $e->getMessage() . "\n";
}

// Test required files exist
$required_files = [
    'routes.php',
    '.htaccess',
    'config/config.php',
    'config/database.php',
    'controllers/AuthController.php',
    'controllers/BaseController.php',
    'includes/Validation.php'
];

echo "\nChecking required files:\n";
foreach ($required_files as $file) {
    if (file_exists(__DIR__ . '/' . $file)) {
        echo "✅ {$file} exists\n";
    } else {
        echo "❌ {$file} is missing\n";
    }
}

// Test URL rewriting
echo "\nTesting URL rewriting:\n";
$test_urls = [
    '/',
    '/login',
    '/register',
    '/products',
    '/profile',
    '/help'
];

// Check if running from command line
$is_cli = (php_sapi_name() === 'cli');

if ($is_cli) {
    echo "Running in CLI mode - skipping URL tests\n";
} else {
    foreach ($test_urls as $url) {
        $full_url = 'http://localhost/Mima-Website' . $url;
        echo "Testing URL: {$full_url}\n";
        
        $ch = curl_init($full_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($http_code === 200) {
            echo "✅ {$url} returns 200 OK\n";
        } else {
            echo "❌ {$url} returns {$http_code}\n";
        }
    }
}

// Test POST requests
echo "\nTesting POST requests:\n";
$test_post_urls = [
    '/login' => ['email' => 'test@example.com', 'password' => 'password123'],
    '/register' => [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password123',
        'confirm_password' => 'password123'
    ]
];

if ($is_cli) {
    echo "Running in CLI mode - skipping POST tests\n";
} else {
    foreach ($test_post_urls as $url => $data) {
        $full_url = 'http://localhost/Mima-Website' . $url;
        echo "Testing POST to: {$full_url}\n";
        
        $ch = curl_init($full_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($http_code === 200 || $http_code === 302) {
            echo "✅ POST to {$url} successful\n";
        } else {
            echo "❌ POST to {$url} failed with code {$http_code}\n";
        }
    }
}

// Test session handling
echo "\nTesting session handling:\n";
if (session_status() === PHP_SESSION_ACTIVE) {
    echo "✅ Session handling is working\n";
} else {
    echo "❌ Session handling failed\n";
}

// Test file permissions
echo "\nTesting file permissions:\n";
$directories = [
    'controllers',
    'models',
    'views',
    'config',
    'includes'
];

foreach ($directories as $dir) {
    if (is_readable(__DIR__ . '/' . $dir)) {
        echo "✅ {$dir} is readable\n";
    } else {
        echo "❌ {$dir} is not readable\n";
    }
    
    if (is_writable(__DIR__ . '/' . $dir)) {
        echo "✅ {$dir} is writable\n";
    } else {
        echo "❌ {$dir} is not writable\n";
    }
}

echo "\nDebug information:\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Server Software: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'CLI') . "\n";
echo "Document Root: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'N/A (CLI)') . "\n";
echo "Current Directory: " . __DIR__ . "\n"; 