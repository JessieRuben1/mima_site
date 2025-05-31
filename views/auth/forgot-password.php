<?php
$pageTitle = 'Forgot Password';
require_once __DIR__ . '/../layouts/header.php';
?>

<div class="min-h-screen bg-gray-100 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Reset your password
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            Enter your email address and we'll send you instructions to reset your password.
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form id="forgotPasswordForm" class="space-y-6" action="/forgot-password" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email address
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div class="error-message text-red-500 text-sm mt-1" data-field="email"></div>
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Send reset instructions
                    </button>
                </div>

                <div class="text-center">
                    <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Back to login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('forgotPasswordForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    // Clear previous errors
    document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
    
    try {
        const formData = new FormData(e.target);
        const response = await fetch('/forgot-password', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            // Show success message
            const form = e.target;
            form.innerHTML = `
                <div class="rounded-md bg-green-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">
                                ${data.message}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Back to login
                    </a>
                </div>
            `;
        } else {
            // Display validation errors
            if (data.errors) {
                Object.entries(data.errors).forEach(([field, message]) => {
                    const errorElement = document.querySelector(`.error-message[data-field="${field}"]`);
                    if (errorElement) {
                        errorElement.textContent = message;
                    }
                });
            }
        }
    } catch (error) {
        console.error('Error:', error);
    }
});
</script>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?> 