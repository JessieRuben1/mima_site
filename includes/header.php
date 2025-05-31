<?php
require_once __DIR__ . '/../config/config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' . SITE_NAME : SITE_NAME; ?></title>
    
    <!-- Meta Tags -->
    <meta name="description" content="South Africa's trusted platform for informal trading. Connect, trade, and grow your business safely.">
    <meta name="keywords" content="trading, marketplace, South Africa, informal trade, buy, sell">
    <meta name="author" content="<?php echo SITE_NAME; ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo SITE_URL; ?>/assets/favicon.ico">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
    
    <!-- Additional page-specific styles -->
    <?php if (isset($additional_css)): ?>
        <?php foreach ($additional_css as $css): ?>
            <link rel="stylesheet" href="<?php echo $css; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="<?php echo SITE_URL; ?>">
                <i class="fas fa-handshake" style="margin-right: 0.5rem;"></i>
                <?php echo SITE_NAME; ?>
            </a>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" id="mobileMenuToggle">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Navigation Links -->
            <ul class="nav-links" id="navLinks">
                <li><a class="nav-link" href="<?php echo SITE_URL; ?>">Home</a></li>
                <li><a class="nav-link" href="<?php echo SITE_URL; ?>/products">Products</a></li>
                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- Authenticated User Menu -->
                    <li><a class="nav-link" href="<?php echo SITE_URL; ?>/products/create">
                        <i class="fas fa-plus"></i> Sell
                    </a></li>
                    <li><a class="nav-link" href="<?php echo SITE_URL; ?>/transactions">
                        <i class="fas fa-exchange-alt"></i> Trades
                    </a></li>
                    
                    <!-- User Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button">
                            <i class="fas fa-user"></i>
                            <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'User'); ?>
                        </a>
                        <div class="dropdown-menu" id="userDropdownMenu">
                            <a class="dropdown-item" href="<?php echo SITE_URL; ?>/profile">
                                <i class="fas fa-user"></i> My Profile
                            </a>
                            <a class="dropdown-item" href="<?php echo SITE_URL; ?>/transactions">
                                <i class="fas fa-list"></i> My Transactions
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo SITE_URL; ?>/help">
                                <i class="fas fa-question-circle"></i> Help Center
                            </a>
                            <a class="dropdown-item" href="<?php echo SITE_URL; ?>/logout">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                <?php else: ?>
                    <!-- Guest User Menu -->
                    <li><a class="nav-link" href="<?php echo SITE_URL; ?>/help">Help</a></li>
                    <li><a class="nav-link" href="<?php echo SITE_URL; ?>/login">Login</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/register" class="btn btn-primary btn-sm">
                        <i class="fas fa-user-plus"></i> Sign Up
                    </a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <!-- Main Content Container -->
    <main>

<style>
/* Dropdown Styles */
.nav-item.dropdown {
    position: relative;
}

.dropdown-toggle {
    cursor: pointer;
    user-select: none;
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    right: 0;
    background: white;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-lg);
    min-width: 200px;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.2s ease;
    margin-top: 0.5rem;
}

.dropdown-menu.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-item {
    display: block;
    padding: 0.75rem 1rem;
    color: var(--gray-700);
    text-decoration: none;
    font-size: 0.9rem;
    transition: background-color 0.2s ease;
}

.dropdown-item:hover {
    background-color: var(--gray-50);
    color: var(--primary-600);
}

.dropdown-item i {
    width: 16px;
    margin-right: 0.5rem;
    color: var(--gray-400);
}

.dropdown-divider {
    height: 1px;
    background-color: var(--gray-200);
    margin: 0.5rem 0;
}

/* Mobile dropdown adjustments */
@media (max-width: 768px) {
    .dropdown-menu {
        position: static;
        box-shadow: none;
        background: var(--primary-800);
        margin-top: 0;
        transform: none;
        opacity: 1;
        visibility: visible;
        border-radius: 0;
    }
    
    .dropdown-item {
        color: rgba(255, 255, 255, 0.9);
        border-left: 3px solid transparent;
        padding-left: 2rem;
    }
    
    .dropdown-item:hover {
        background-color: var(--primary-700);
        border-left-color: white;
        color: white;
    }
    
    .dropdown-divider {
        background-color: var(--primary-600);
    }
}

/* Alert styles for flash messages */
.alert {
    padding: 1rem;
    margin: 1rem 0;
    border-radius: var(--radius-md);
    border: 1px solid transparent;
}

.alert-success {
    background-color: var(--success-50);
    border-color: var(--success-200);
    color: var(--success-800);
}

.alert-danger {
    background-color: var(--error-50);
    border-color: var(--error-200);
    color: var(--error-800);
}

.alert-warning {
    background-color: var(--warning-50);
    border-color: var(--warning-200);
    color: var(--warning-800);
}

.alert-info {
    background-color: var(--primary-50);
    border-color: var(--primary-200);
    color: var(--primary-800);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const navLinks = document.getElementById('navLinks');
    
    if (mobileMenuToggle && navLinks) {
        mobileMenuToggle.addEventListener('click', function() {
            navLinks.classList.toggle('active');
            
            // Toggle icon
            const icon = this.querySelector('i');
            if (navLinks.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    }
    
    // User dropdown toggle
    const userDropdown = document.getElementById('userDropdown');
    const userDropdownMenu = document.getElementById('userDropdownMenu');
    
    if (userDropdown && userDropdownMenu) {
        userDropdown.addEventListener('click', function(e) {
            e.preventDefault();
            userDropdownMenu.classList.toggle('show');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!userDropdown.contains(e.target) && !userDropdownMenu.contains(e.target)) {
                userDropdownMenu.classList.remove('show');
            }
        });
    }
    
    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
            }, 300);
        }, 5000);
    });
    
    // Add active class to current page nav link
    const currentPage = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPage) {
            link.style.color = 'white';
            link.style.fontWeight = '600';
        }
    });
});
</script>