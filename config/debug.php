<?php
// Debug configuration
define('DEBUG_MODE', true);

// Error reporting
if (DEBUG_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Logging configuration
define('LOG_PATH', __DIR__ . '/../logs');
if (!file_exists(LOG_PATH)) {
    mkdir(LOG_PATH, 0777, true);
}

// Debug logging function
function debug_log($message, $type = 'INFO') {
    if (!DEBUG_MODE) return;
    
    $timestamp = date('Y-m-d H:i:s');
    $log_message = "[{$timestamp}] [{$type}] {$message}\n";
    
    $log_file = LOG_PATH . '/debug.log';
    file_put_contents($log_file, $log_message, FILE_APPEND);
}

// Request logging
function log_request() {
    if (!DEBUG_MODE) return;
    
    $request = [
        'method' => $_SERVER['REQUEST_METHOD'],
        'uri' => $_SERVER['REQUEST_URI'],
        'ip' => $_SERVER['REMOTE_ADDR'],
        'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        'get' => $_GET,
        'post' => $_POST
    ];
    
    debug_log("Request: " . json_encode($request), 'REQUEST');
}

// Database query logging
function log_query($sql, $params = []) {
    if (!DEBUG_MODE) return;
    
    $query = [
        'sql' => $sql,
        'params' => $params
    ];
    
    debug_log("Query: " . json_encode($query), 'QUERY');
}

// Session debugging
function debug_session() {
    if (!DEBUG_MODE) return;
    
    debug_log("Session: " . json_encode($_SESSION), 'SESSION');
}

// Initialize debugging
if (DEBUG_MODE) {
    log_request();
    debug_session();
} 