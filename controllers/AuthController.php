<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/User.php';

class AuthController extends BaseController {
    private $userModel;

    public function __construct() {
        parent::__construct();
        $this->userModel = new User($this->db);
    }

    public function register() {
        if ($this->isAuthenticated()) {
            $this->redirect('/');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->sanitize($_POST);
            
            $rules = [
                'name' => 'required|min:2|max:100',
                'email' => 'required|email|max:100',
                'password' => 'required|min:8|max:100',
                'confirm_password' => 'required|same:password',
                'phone' => 'max:20',
                'location' => 'max:100'
            ];

            if (!$this->validate($data, $rules)) {
                $this->json([
                    'success' => false,
                    'errors' => $this->getValidationErrors()
                ], 422);
                return;
            }

            try {
                // Check if email already exists
                if ($this->userModel->getByEmail($data['email'])) {
                    $this->json([
                        'success' => false,
                        'errors' => ['email' => 'Email already registered']
                    ], 422);
                    return;
                }

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Create user
                $userId = $this->userModel->create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'phone' => $data['phone'] ?? null,
                    'location' => $data['location'] ?? null
                ]);

                // Start session
                session_start();
                $_SESSION['user_id'] = $userId;
                $_SESSION['user_name'] = $data['name'];
                $_SESSION['user_email'] = $data['email'];

                $this->json([
                    'success' => true,
                    'message' => 'Registration successful',
                    'redirect' => '/'
                ]);
            } catch (Exception $e) {
                $this->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 500);
            }
        } else {
            $this->render('auth/register');
        }
    }

    public function login() {
        if ($this->isAuthenticated()) {
            $this->redirect('/');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->sanitize($_POST);
            
            $rules = [
                'email' => 'required|email',
                'password' => 'required'
            ];

            if (!$this->validate($data, $rules)) {
                $this->json([
                    'success' => false,
                    'errors' => $this->getValidationErrors()
                ], 422);
                return;
            }

            try {
                $user = $this->userModel->getByEmail($data['email']);
                
                if (!$user || !password_verify($data['password'], $user['password'])) {
                    $this->json([
                        'success' => false,
                        'errors' => ['email' => 'Invalid email or password']
                    ], 422);
                    return;
                }

                // Start session
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];

                $this->json([
                    'success' => true,
                    'message' => 'Login successful',
                    'redirect' => '/'
                ]);
            } catch (Exception $e) {
                $this->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 500);
            }
        } else {
            $this->render('auth/login');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        $this->redirect('/login');
    }

    public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->sanitize($_POST);
            
            $rules = [
                'email' => 'required|email'
            ];

            if (!$this->validate($data, $rules)) {
                $this->json([
                    'success' => false,
                    'errors' => $this->getValidationErrors()
                ], 422);
                return;
            }

            try {
                $user = $this->userModel->getByEmail($data['email']);
                
                if (!$user) {
                    $this->json([
                        'success' => false,
                        'errors' => ['email' => 'Email not found']
                    ], 422);
                    return;
                }

                // Generate reset token
                $token = bin2hex(random_bytes(32));
                $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
                
                $this->userModel->updateResetToken($user['id'], $token, $expires);

                // TODO: Send reset email with token
                // For now, just return success
                $this->json([
                    'success' => true,
                    'message' => 'Password reset instructions sent to your email'
                ]);
            } catch (Exception $e) {
                $this->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 500);
            }
        } else {
            $this->render('auth/forgot-password');
        }
    }

    public function resetPassword($token) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->sanitize($_POST);
            
            $rules = [
                'password' => 'required|min:8|max:100',
                'confirm_password' => 'required|same:password'
            ];

            if (!$this->validate($data, $rules)) {
                $this->json([
                    'success' => false,
                    'errors' => $this->getValidationErrors()
                ], 422);
                return;
            }

            try {
                $user = $this->userModel->getByResetToken($token);
                
                if (!$user || strtotime($user['reset_token_expires']) < time()) {
                    $this->json([
                        'success' => false,
                        'errors' => ['token' => 'Invalid or expired reset token']
                    ], 422);
                    return;
                }

                // Update password and clear reset token
                $this->userModel->updatePassword($user['id'], password_hash($data['password'], PASSWORD_DEFAULT));

                $this->json([
                    'success' => true,
                    'message' => 'Password reset successful',
                    'redirect' => '/login'
                ]);
            } catch (Exception $e) {
                $this->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 500);
            }
        } else {
            $this->render('auth/reset-password', ['token' => $token]);
        }
    }
} 