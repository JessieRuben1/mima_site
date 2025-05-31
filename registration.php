<?php
require_once __DIR__ . '/controllers/RegistrationController.php';

$controller = new RegistrationController();
$result = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $result = $controller->register();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade with Me - Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container" style="max-width: 500px; margin: 2rem auto; padding: 0 1rem;">
        <?php if ($result): ?>
            <div class="alert <?php echo $result['success'] ? 'alert-success' : 'alert-danger'; ?>">
                <?php echo $result['message']; ?>
                <?php if ($result['success']): ?>
                    <script>
                        setTimeout(() => {
                            window.location.href = 'routes.php';
                        }, 2000);
                    </script>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header text-center">
                <h2 style="margin: 0; color: var(--gray-900);">
                    <i class="fas fa-handshake" style="color: var(--primary-500); margin-right: 0.5rem;"></i>
                    Join Trade with Me
                </h2>
                <p style="margin: 0.5rem 0 0; color: var(--gray-600);">Create your free account to start trading</p>
            </div>
            
            <div class="card-body">
                <form action="registration.php" method="post">
                    <div class="form-group">
                        <label for="Fullname" class="form-label">
                            <i class="fas fa-user" style="margin-right: 0.5rem; color: var(--gray-400);"></i>
                            Full Name
                        </label>
                        <input type="text" class="form-control" name="Fullname" id="Fullname" placeholder="Enter your full name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Email" class="form-label">
                            <i class="fas fa-envelope" style="margin-right: 0.5rem; color: var(--gray-400);"></i>
                            Email Address
                        </label>
                        <input type="email" class="form-control" name="Email" id="Email" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Password" class="form-label">
                            <i class="fas fa-lock" style="margin-right: 0.5rem; color: var(--gray-400);"></i>
                            Password
                        </label>
                        <input type="password" class="form-control" name="Password" id="Password" placeholder="Create a strong password" required>
                        <small style="color: var(--gray-500); font-size: 0.8rem;">Must be at least 8 characters long</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="Repeat_password" class="form-label">
                            <i class="fas fa-lock" style="margin-right: 0.5rem; color: var(--gray-400);"></i>
                            Confirm Password
                        </label>
                        <input type="password" class="form-control" name="Repeat_password" id="Repeat_password" placeholder="Repeat your password" required>
                    </div>
                    
                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: flex; align-items: flex-start; cursor: pointer;">
                            <input type="checkbox" required style="margin-right: 0.5rem; margin-top: 0.25rem;">
                            <span style="font-size: 0.9rem; color: var(--gray-600);">
                                I agree to the <a href="#" style="color: var(--primary-600);">Terms of Service</a> 
                                and <a href="#" style="color: var(--primary-600);">Privacy Policy</a>
                            </span>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        <i class="fas fa-user-plus" style="margin-right: 0.5rem;"></i>
                        Create Account
                    </button>
                </form>
            </div>
            
            <div class="card-footer text-center">
                <p style="margin: 0; color: var(--gray-600);">
                    Already have an account? 
                    <a href="routes.php?route=login" style="color: var(--primary-600); text-decoration: none; font-weight: 500;">
                        Sign in here
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Password confirmation validation
        const password = document.getElementById('Password');
        const confirmPassword = document.getElementById('Repeat_password');
        
        function validatePasswords() {
            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity("Passwords don't match");
            } else {
                confirmPassword.setCustomValidity('');
            }
        }
        
        password.addEventListener('change', validatePasswords);
        confirmPassword.addEventListener('change', validatePasswords);
        
        // Form animation
        const form = document.querySelector('form');
        form.style.opacity = '0';
        form.style.transform = 'translateY(20px)';
        form.style.transition = 'all 0.6s ease';
        
        setTimeout(() => {
            form.style.opacity = '1';
            form.style.transform = 'translateY(0)';
        }, 200);
    });
    </script>
</body>
</html>