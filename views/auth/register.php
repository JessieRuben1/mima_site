<?php
$pageTitle = 'Register';
require_once __DIR__ . '/../layouts/header.php';
?>

<style>
/* Auth page specific styles */
.auth-container {
    min-height: calc(100vh - var(--header-height));
    background: linear-gradient(135deg, var(--primary-50) 0%, var(--success-50) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem 1rem;
}

.auth-card {
    background: white;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
    width: 100%;
    max-width: 500px;
    overflow: hidden;
}

.auth-header {
    background: linear-gradient(135deg, var(--primary-600) 0%, var(--primary-700) 100%);
    color: white;
    padding: 2rem;
    text-align: center;
}

.auth-body {
    padding: 2rem;
}

.auth-footer {
    background: var(--gray-50);
    padding: 1.5rem 2rem;
    text-align: center;
    border-top: 1px solid var(--gray-200);
}

.form-floating {
    position: relative;
    margin-bottom: 1.5rem;
}

.form-floating input {
    width: 100%;
    padding: 1rem 1rem 1rem 3rem;
    border: 2px solid var(--gray-200);
    border-radius: var(--radius-md);
    font-size: 1rem;
    transition: all 0.3s ease;
    background: white;
}

.form-floating input:focus {
    border-color: var(--primary-500);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    outline: none;
}

.form-floating .form-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray-400);
    transition: color 0.3s ease;
}

.form-floating input:focus + .form-icon {
    color: var(--primary-500);
}

.checkbox-container {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1.5rem;
}

.checkbox-container input[type="checkbox"] {
    margin-right: 0.75rem;
    margin-top: 0.25rem;
    transform: scale(1.2);
}

.error-message {
    color: var(--error-500);
    font-size: 0.875rem;
    margin-top: 0.5rem;
    display: none;
}

.success-message {
    background: var(--success-50);
    border: 1px solid var(--success-200);
    color: var(--success-800);
    padding: 1rem;
    border-radius: var(--radius-md);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
}

.btn-auth {
    width: 100%;
    padding: 1rem;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: var(--radius-md);
    transition: all 0.3s ease;
}

.divider {
    position: relative;
    text-align: center;
    margin: 1.5rem 0;
}

.divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: var(--gray-200);
}

.divider span {
    background: white;
    padding: 0 1rem;
    color: var(--gray-500);
    font-size: 0.875rem;
}

@media (max-width: 640px) {
    .auth-container {
        padding: 1rem;
    }
    
    .auth-header,
    .auth-body {
        padding: 1.5rem;
    }
    
    .auth-footer {
        padding: 1.5rem;
    }
}
</style>

<div class="auth-container">
    <div class="auth-card fade-in">
        <!-- Header -->
        <div class="auth-header">
            <div style="font-size: 3rem; margin-bottom: 1rem;">
                <i class="fas fa-handshake"></i>
            </div>
            <h1 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 0.5rem;">
                Join Trade with Me
            </h1>
            <p style="opacity: 0.9; font-size: 1rem;">
                Start your trading journey today
            </p>
        </div>

        <!-- Body -->
        <div class="auth-body">
            <form id="registerForm" action="/register" method="POST">
                <div class="form-floating">
                    <input type="text" id="name" name="name" placeholder="Full Name" required>
                    <i class="fas fa-user form-icon"></i>
                    <div class="error-message" data-field="name"></div>
                </div>

                <div class="form-floating">
                    <input type="email" id="email" name="email" placeholder="Email Address" required>
                    <i class="fas fa-envelope form-icon"></i>
                    <div class="error-message" data-field="email"></div>
                </div>

                <div class="form-floating">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class="fas fa-lock form-icon"></i>
                    <div class="error-message" data-field="password"></div>
                </div>

                <div class="form-floating">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                    <i class="fas fa-lock form-icon"></i>
                    <div class="error-message" data-field="confirm_password"></div>
                </div>

                <div class="form-floating">
                    <input type="tel" id="phone" name="phone" placeholder="Phone Number (Optional)">
                    <i class="fas fa-phone form-icon"></i>
                    <div class="error-message" data-field="phone"></div>
                </div>

                <div class="form-floating">
                    <input type="text" id="location" name="location" placeholder="Location (Optional)">
                    <i class="fas fa-map-marker-alt form-icon"></i>
                    <div class="error-message" data-field="location"></div>
                </div>

                <div class="checkbox-container">
                    <input type="checkbox" id="terms" required>
                    <label for="terms" style="color: var(--gray-600); line-height: 1.5;">
                        I agree to the <a href="#" style="color: var(--primary-600);">Terms of Service</a> 
                        and <a href="#" style="color: var(--primary-600);">Privacy Policy</a>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-auth">
                    <i class="fas fa-user-plus" style="margin-right: 0.5rem;"></i>
                    Create Account
                </button>
            </form>
        </div>

        <!-- Footer -->
        <div class="auth-footer">
            <p style="margin: 0; color: var(--gray-600);">
                Already have an account? 
                <a href="/login" style="color: var(--primary-600); text-decoration: none; font-weight: 600;">
                    Sign in here
                </a>
            </p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registerForm');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    
    // Password confirmation validation
    function validatePasswords() {
        if (password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity("Passwords don't match");
            showError('confirm_password', "Passwords don't match");
        } else {
            confirmPassword.setCustomValidity('');
            hideError('confirm_password');
        }
    }
    
    password.addEventListener('input', validatePasswords);
    confirmPassword.addEventListener('input', validatePasswords);
    
    // Form submission
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Clear previous errors
        clearErrors();
        
        const formData = new FormData(form);
        
        try {
            const response = await fetch('/register', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                showSuccess('Registration successful! Redirecting...');
                setTimeout(() => {
                    window.location.href = data.redirect || '/';
                }, 2000);
            } else {
                if (data.errors) {
                    Object.entries(data.errors).forEach(([field, message]) => {
                        showError(field, message);
                    });
                } else {
                    showError('general', data.message || 'Registration failed');
                }
            }
        } catch (error) {
            showError('general', 'Network error. Please try again.');
        }
    });
    
    function showError(field, message) {
        const errorElement = document.querySelector(`.error-message[data-field="${field}"]`);
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.style.display = 'block';
        }
    }
    
    function hideError(field) {
        const errorElement = document.querySelector(`.error-message[data-field="${field}"]`);
        if (errorElement) {
            errorElement.style.display = 'none';
        }
    }
    
    function clearErrors() {
        document.querySelectorAll('.error-message').forEach(el => {
            el.style.display = 'none';
        });
    }
    
    function showSuccess(message) {
        const successDiv = document.createElement('div');
        successDiv.className = 'success-message';
        successDiv.innerHTML = `
            <i class="fas fa-check-circle" style="margin-right: 0.5rem;"></i>
            ${message}
        `;
        
        const form = document.getElementById('registerForm');
        form.parentNode.insertBefore(successDiv, form);
    }
});
</script>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>