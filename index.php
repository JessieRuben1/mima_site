<?php
// Include config without starting session (config will handle it)
require_once __DIR__ . '/config/config.php';

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in - show home page
    require_once __DIR__ . '/views/home.php';
} else {
    // User is not logged in - show landing page
    require_once __DIR__ . '/views/landing.php';
}
?>