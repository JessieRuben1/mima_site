<?php
class Validation {
    private $errors = [];
    private $data = [];
    private $rules = [];

    public function __construct($data = []) {
        $this->data = $data;
    }

    public function setRules($rules) {
        $this->rules = $rules;
        return $this;
    }

    public function validate() {
        foreach ($this->rules as $field => $rules) {
            $rules = explode('|', $rules);
            
            foreach ($rules as $rule) {
                if (strpos($rule, ':') !== false) {
                    list($rule, $parameter) = explode(':', $rule);
                } else {
                    $parameter = null;
                }

                $value = $this->data[$field] ?? null;
                
                if (!$this->validateRule($field, $rule, $value, $parameter)) {
                    break;
                }
            }
        }

        return empty($this->errors);
    }

    private function validateRule($field, $rule, $value, $parameter = null) {
        switch ($rule) {
            case 'required':
                if (empty($value) && $value !== '0') {
                    $this->errors[$field] = ucfirst($field) . ' is required';
                    return false;
                }
                break;

            case 'email':
                if (!empty($value) && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->errors[$field] = 'Invalid email format';
                    return false;
                }
                break;

            case 'min':
                if (strlen($value) < $parameter) {
                    $this->errors[$field] = ucfirst($field) . ' must be at least ' . $parameter . ' characters';
                    return false;
                }
                break;

            case 'max':
                if (strlen($value) > $parameter) {
                    $this->errors[$field] = ucfirst($field) . ' must not exceed ' . $parameter . ' characters';
                    return false;
                }
                break;

            case 'numeric':
                if (!empty($value) && !is_numeric($value)) {
                    $this->errors[$field] = ucfirst($field) . ' must be a number';
                    return false;
                }
                break;

            case 'decimal':
                if (!empty($value) && !preg_match('/^\d+(\.\d{1,2})?$/', $value)) {
                    $this->errors[$field] = ucfirst($field) . ' must be a valid decimal number';
                    return false;
                }
                break;

            case 'in':
                $allowed = explode(',', $parameter);
                if (!in_array($value, $allowed)) {
                    $this->errors[$field] = ucfirst($field) . ' must be one of: ' . implode(', ', $allowed);
                    return false;
                }
                break;

            case 'same':
                if ($value !== ($this->data[$parameter] ?? null)) {
                    $this->errors[$field] = ucfirst($field) . ' must match ' . $parameter;
                    return false;
                }
                break;

            case 'image':
                if (!empty($value) && !in_array($value['type'], ['image/jpeg', 'image/png', 'image/gif'])) {
                    $this->errors[$field] = 'Invalid image format. Allowed formats: JPG, PNG, GIF';
                    return false;
                }
                break;

            case 'max_size':
                if (!empty($value) && $value['size'] > ($parameter * 1024 * 1024)) {
                    $this->errors[$field] = 'File size must not exceed ' . $parameter . 'MB';
                    return false;
                }
                break;
        }

        return true;
    }

    public function sanitize($data) {
        $sanitized = [];
        
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $sanitized[$key] = $this->sanitize($value);
            } else {
                $sanitized[$key] = $this->sanitizeValue($value);
            }
        }

        return $sanitized;
    }

    private function sanitizeValue($value) {
        if (is_string($value)) {
            // Remove HTML tags
            $value = strip_tags($value);
            
            // Convert special characters to HTML entities
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            
            // Remove whitespace from beginning and end
            $value = trim($value);
        }
        
        return $value;
    }

    public function getErrors() {
        return $this->errors;
    }

    public function getFirstError() {
        return reset($this->errors);
    }

    public function hasErrors() {
        return !empty($this->errors);
    }
} 