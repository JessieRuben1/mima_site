<?php
$pageTitle = 'Login';
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
                <i class="fas fa-sign-in-alt"></i>
            </div>
            <h1 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 0.5rem;">
                Welcome Back
            </h1>
            <p style="opacity: 0.9; font-size: 1rem;">
                Sign in to continue trading
            </p>
        </div>

        <!-- Body -->
        <div class="auth-body">
            <form id="loginForm" action="/login" method="POST">
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

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                    <label style="display: flex; align-items: center; cursor: pointer; color: var(--gray-600);">
                        <input type="checkbox" name="remember_me" style="margin-right: 0.5rem;">
                        Remember me
                    </label>
                    <a href="/forgot-password" style="color: var(--primary-600); text-decoration: none; font-size: 0.9rem;">
                        Forgot password?
                    </a>
                </div>

                <button type="submit" class="btn btn-primary btn-auth">
                    <i class="fas fa-sign-in-alt" style="margin-right: 0.5rem;"></i>
                    Sign In
                </button>
            </form>

            <div class="divider">
                <span>or</span>
            </div>

            <div style="text-align: center;">
                <a href="#" class="btn btn-secondary" style="width: 100%; margin-bottom: 1rem;">
                    <i class="fab fa-google" style="margin-right: 0.5rem;"></i>
                    Continue with Google
                </a>
                <p style="font-size: 0.85rem; color: var(--gray-500);">
                    No smartphone? Dial <strong>*134*555#</strong> for USSD access
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="auth-footer">
            <p style="margin: 0; color: var(--gray-600);">
                Don't have an account? 
                <a href="/register" style="color: var(--primary-600); text-decoration: none; font-weight: 600;">
                    Sign up here
                </a>
            </p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('loginForm');
    
    // Form submission
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Clear previous errors
        clearErrors();
        
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin" style="margin-right: 0.5rem;"></i>Signing In...';
        submitBtn.disabled = true;
        
        const formData = new FormData(form);
        
        try {
            const response = await fetch('/login', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                showSuccess('Login successful! Redirecting...');
                setTimeout(() => {
                    window.location.href = data.redirect || '/home';
                }, 1500);
            } else {
                if (data.errors) {
                    Object.entries(data.errors).forEach(([field, message]) => {
                        showError(field, message);
                    });
                } else {
                    showError('general', data.message || 'Login failed');
                }
            }
        } catch (error) {
            showError('general', 'Network error. Please try again.');
        } finally {
            // Restore button
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    });
    
    function showError(field, message) {
        const errorElement = document.querySelector(`.error-message[data-field="${field}"]`);
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.style.display = 'block';
        } else {
            // Show general error at top of form
            const generalError = document.createElement('div');
            generalError.className = 'error-message';
            generalError.style.display = 'block';
            generalError.style.marginBottom = '1rem';
            generalError.style.padding = '0.75rem';
            generalError.style.background = 'var(--error-50)';
            generalError.style.border = '1px solid var(--error-200)';
            generalError.style.borderRadius = 'var(--radius-md)';
            generalError.textContent = message;
            
            form.insertBefore(generalError, form.firstChild);
        }
    }
    
    function clearErrors() {
        document.querySelectorAll('.error-message').forEach(el => {
            el.style.display = 'none';
        });
        
        // Remove general errors
        const generalErrors = form.querySelectorAll('.error-message:not([data-field])');
        generalErrors.forEach(el => el.remove());
    }
    
    function showSuccess(message) {
        const successDiv = document.createElement('div');
        successDiv.className = 'success-message';
        successDiv.innerHTML = `
            <i class="fas fa-check-circle" style="margin-right: 0.5rem;"></i>
            ${message}
        `;
        
        form.parentNode.insertBefore(successDiv, form);
    }
});
</script>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>