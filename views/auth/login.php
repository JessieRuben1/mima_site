<?php
$page_title = "Login";
require_once __DIR__ . '/../../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?php echo SITE_NAME; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
</head>
<body>
    <div class="container" style="max-width: 500px; margin: 2rem auto; padding: 0 1rem;">
        <div class="card">
            <div class="card-header text-center">
                <h2 style="margin: 0; color: var(--gray-900);">
                    <i class="fas fa-sign-in-alt" style="color: var(--primary-500); margin-right: 0.5rem;"></i>
                    Login to <?php echo SITE_NAME; ?>
                </h2>
            </div>
            
            <div class="card-body">
                <form action="<?php echo SITE_URL; ?>/login" method="POST">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        Login
                    </button>
                </form>
            </div>
            
            <div class="card-footer text-center">
                <p>Don't have an account? <a href="<?php echo SITE_URL; ?>/register">Sign up here</a></p>
                <p><a href="<?php echo SITE_URL; ?>/">Back to Home</a></p>
            </div>
        </div>
    </div>
</body>
</html>