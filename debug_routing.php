<?php
echo "<h2>Routing Debug Information</h2>";
echo "<pre>";
echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "\n";
echo "SCRIPT_NAME: " . $_SERVER['SCRIPT_NAME'] . "\n";
echo "PHP_SELF: " . $_SERVER['PHP_SELF'] . "\n";
echo "REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD'] . "\n";
echo "\n";

// Check if mod_rewrite is enabled
if (function_exists('apache_get_modules')) {
    $modules = apache_get_modules();
    echo "mod_rewrite enabled: " . (in_array('mod_rewrite', $modules) ? 'YES' : 'NO') . "\n";
}

// Check file existence
echo "\nFile Check:\n";
echo "routes.php exists: " . (file_exists('routes.php') ? 'YES' : 'NO') . "\n";
echo ".htaccess exists: " . (file_exists('.htaccess') ? 'YES' : 'NO') . "\n";
echo "views/index.php exists: " . (file_exists('views/index.php') ? 'YES' : 'NO') . "\n";
echo "includes/header.php exists: " . (file_exists('includes/header.php') ? 'YES' : 'NO') . "\n";

// Session check
session_start();
echo "\nSession Status:\n";
echo "Session ID: " . session_id() . "\n";
echo "User logged in: " . (isset($_SESSION['user_id']) ? 'YES (ID: ' . $_SESSION['user_id'] . ')' : 'NO') . "\n";

echo "</pre>";

// Links to test
echo "<h3>Test Links:</h3>";
echo "<ul>";
echo '<li><a href="/Mima-Website/">Home</a></li>';
echo '<li><a href="/Mima-Website/login">Login</a></li>';
echo '<li><a href="/Mima-Website/register">Register</a></li>';
echo '<li><a href="/Mima-Website/products">Products</a></li>';
echo '<li><a href="/Mima-Website/help">Help</a></li>';
echo "</ul>";
?>