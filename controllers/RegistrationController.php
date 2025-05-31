<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../config/config.php';

class RegistrationController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate input
            if (empty($_POST['Fullname']) || empty($_POST['Email']) || 
                empty($_POST['Password']) || empty($_POST['Repeat_password'])) {
                return ["success" => false, "message" => "All fields are required"];
            }

            if ($_POST['Password'] !== $_POST['Repeat_password']) {
                return ["success" => false, "message" => "Passwords do not match"];
            }

            if (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
                return ["success" => false, "message" => "Invalid email format"];
            }

            // Set user properties
            $this->user->fullname = $_POST['Fullname'];
            $this->user->email = $_POST['Email'];
            $this->user->password = $_POST['Password'];

            // Check if email exists
            if ($this->user->emailExists()) {
                return ["success" => false, "message" => "Email already exists"];
            }

            // Create user
            if ($this->user->create()) {
                return ["success" => true, "message" => "Registration successful"];
            } else {
                return ["success" => false, "message" => "Registration failed"];
            }
        }
        return ["success" => false, "message" => "Invalid request method"];
    }
}
?> 