<?php
require_once __DIR__ . '/../../config/config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' . SITE_NAME : SITE_NAME; ?></title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="<?php echo SITE_URL; ?>">
                <i class="fas fa-handshake" style="margin-right: 0.5rem;"></i>
                <?php echo SITE_NAME; ?>
            </a>

            <ul class="nav-links">
                <li><a class="nav-link" href="<?php echo SITE_URL; ?>">Home</a></li>
                <li><a class="nav-link" href="<?php echo SITE_URL; ?>/products">Products</a></li>
                <li><a class="nav-link" href="<?php echo SITE_URL; ?>/help">Help</a></li>
                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a class="nav-link" href="<?php echo SITE_URL; ?>/profile">Profile</a></li>
                    <li><a class="nav-link" href="<?php echo SITE_URL; ?>/logout">Logout</a></li>
                <?php else: ?>
                    <li><a class="nav-link" href="<?php echo SITE_URL; ?>/login">Login</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/register" class="btn btn-primary btn-sm">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <main>