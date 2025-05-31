<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/Validation.php';

class BaseController {
    protected $db;
    protected $validation;
    protected $user;

    public function __construct() {
        $this->db = new Database();
        $this->validation = new Validation();
        $this->initUser();
    }

    protected function initUser() {
        // Only start session if one isn't already active
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (isset($_SESSION['user_id'])) {
            // TODO: Load user from database
            $this->user = [
                'id' => $_SESSION['user_id'],
                'name' => $_SESSION['user_name'],
                'email' => $_SESSION['user_email']
            ];
        }
    }

    protected function render($view, $data = []) {
        extract($data);
        require_once __DIR__ . "/../views/{$view}.php";
    }

    protected function redirect($url) {
        header("Location: {$url}");
        exit;
    }

    protected function isAuthenticated() {
        return isset($_SESSION['user_id']);
    }

    protected function requireAuth() {
        if (!$this->isAuthenticated()) {
            $this->redirect('/login');
        }
    }

    protected function json($data, $status = 200) {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
        exit;
    }

    protected function validate($data, $rules) {
        $this->validation->setRules($rules);
        return $this->validation->validate($data);
    }

    protected function getValidationErrors() {
        return $this->validation->getErrors();
    }

    protected function sanitize($data) {
        return $this->validation->sanitize($data);
    }

    protected function handleFileUpload($file, $destination, $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'], $maxSize = 5) {
        if (!isset($file['error']) || is_array($file['error'])) {
            throw new Exception('Invalid file parameters');
        }

        switch ($file['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new Exception('File size exceeds limit');
            case UPLOAD_ERR_PARTIAL:
                throw new Exception('File was only partially uploaded');
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('No file was uploaded');
            case UPLOAD_ERR_NO_TMP_DIR:
                throw new Exception('Missing temporary folder');
            case UPLOAD_ERR_CANT_WRITE:
                throw new Exception('Failed to write file to disk');
            case UPLOAD_ERR_EXTENSION:
                throw new Exception('A PHP extension stopped the file upload');
            default:
                throw new Exception('Unknown upload error');
        }

        if ($file['size'] > $maxSize * 1024 * 1024) {
            throw new Exception('File size exceeds limit');
        }

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($file['tmp_name']);

        if (!in_array($mimeType, $allowedTypes)) {
            throw new Exception('Invalid file type');
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $extension;
        $filepath = $destination . '/' . $filename;

        if (!move_uploaded_file($file['tmp_name'], $filepath)) {
            throw new Exception('Failed to move uploaded file');
        }

        return $filename;
    }
}