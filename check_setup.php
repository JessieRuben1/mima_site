<?php
echo "<h2>Setup Check</h2>";

// Check directories
$dirs = [
    'views',
    'views/auth',
    'config',
    'assets',
    'assets/css'
];

echo "<h3>Directory Check:</h3>";
foreach ($dirs as $dir) {
    echo $dir . ": " . (is_dir($dir) ? "✅ EXISTS" : "❌ MISSING") . "<br>";
}

// Check files
$files = [
    'routes.php',
    '.htaccess',
    'config/config.php',
    'views/landing.php',
    'views/auth/login.php',
    'views/auth/register.php',
    'assets/css/style.css'
];

echo "<h3>File Check:</h3>";
foreach ($files as $file) {
    echo $file . ": " . (file_exists($file) ? "✅ EXISTS" : "❌ MISSING") . "<br>";
}

// Test links
echo "<h3>Test Links:</h3>";
echo '<a href="/Mima-Website/">Home</a><br>';
echo '<a href="/Mima-Website/login">Login</a><br>';
echo '<a href="/Mima-Website/register">Register</a><br>';
?>