<?php
/**
 * Base Controller
 * 
 * Base class for all controllers with common functionality
 */

abstract class BaseController {
    protected $config;
    
    public function __construct() {
        $this->config = $GLOBALS['config'];
    }
    
    /**
     * Render a view with data
     */
    protected function render($view, $data = []) {
        extract($data);
        $viewFile = APP_ROOT . '/src/Views/' . $view . '.php';
        
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            throw new Exception("View file not found: $view");
        }
    }
    
    /**
     * Return JSON response
     */
    protected function jsonResponse($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }
    
    /**
     * Check if user is authenticated
     */
    protected function requireAuth() {
        if (!isset($_SESSION['user_id'])) {
            if ($this->isAjaxRequest()) {
                $this->jsonResponse([
                    'success' => false,
                    'message' => 'กรุณาเข้าสู่ระบบ',
                    'redirect' => '/login'
                ], 401);
            } else {
                header('Location: /login');
                exit;
            }
        }
    }
    
    /**
     * Check if request is AJAX
     */
    protected function isAjaxRequest() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
               strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
    
    /**
     * Get current user data from session
     */
    protected function getCurrentUser() {
        if (isset($_SESSION['user_id'])) {
            return [
                'id' => $_SESSION['user_id'],
                'username' => $_SESSION['username'] ?? '',
                'role' => $_SESSION['role'] ?? 'employee',
                'first_name' => $_SESSION['first_name'] ?? '',
                'last_name' => $_SESSION['last_name'] ?? ''
            ];
        }
        return null;
    }
}