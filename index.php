<?php
// Start session
session_start();

// Check if user is logged in and redirect accordingly
if (isset($_SESSION['user_id'])) {
    // User is logged in - show home page
    require_once __DIR__ . '/controllers/HomeController.php';
    $home = new HomeController();
    $home->index();
} else {
    // User is not logged in - show landing page
    require_once __DIR__ . '/views/index.php';
}
?>