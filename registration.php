<!-- <?php
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <?php if ($result): ?>
            <div class="alert alert-<?php echo $result['success'] ? 'success' : 'danger'; ?>">
                <?php echo $result['message']; ?>
            </div>
        <?php endif; ?>

        <form action="registration.php" method="post" class="col-md-6 mx-auto">
            <h2 class="text-center mb-4">Registration</h2>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="Fullname" placeholder="Full Name" required>
            </div>
            <div class="form-group mb-3">
                <input type="email" class="form-control" name="Email" placeholder="Email" required>
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" name="Password" placeholder="Password" required>
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" name="Repeat_password" placeholder="Repeat Password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </div>
            <div class="text-center mt-3">
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </div>
        </form>
    </div>
</body>
</html> -->