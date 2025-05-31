<?php
$pageTitle = '404 Not Found';
require_once __DIR__ . '/layouts/header.php';
?>

<div class="min-h-screen bg-gray-100 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            404 - Page Not Found
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            The page you're looking for doesn't exist or has been moved.
        </p>
        <div class="mt-6 text-center">
            <a href="/" class="font-medium text-indigo-600 hover:text-indigo-500">
                Return to Home
            </a>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/layouts/footer.php'; ?> 