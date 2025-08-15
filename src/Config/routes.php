<?php
/**
 * Router Class
 * 
 * Simple router for handling HTTP requests and routing to appropriate controllers
 */

class Router {
    private $routes = [];
    
    public function __construct() {
        $this->defineRoutes();
    }
    
    /**
     * Define application routes
     */
    private function defineRoutes() {
        // Authentication routes
        $this->routes['GET']['/'] = ['AuthController', 'showLogin'];
        $this->routes['GET']['/login'] = ['AuthController', 'showLogin'];
        $this->routes['POST']['/login'] = ['AuthController', 'login'];
        $this->routes['POST']['/logout'] = ['AuthController', 'logout'];
        
        // Dashboard routes
        $this->routes['GET']['/dashboard'] = ['DashboardController', 'index'];
        
        // Time tracking routes
        $this->routes['GET']['/time-tracking'] = ['TimeTrackingController', 'index'];
        $this->routes['POST']['/api/clock-in'] = ['TimeTrackingController', 'clockIn'];
        $this->routes['POST']['/api/clock-out'] = ['TimeTrackingController', 'clockOut'];
        $this->routes['GET']['/api/current-status'] = ['TimeTrackingController', 'getCurrentStatus'];
        $this->routes['GET']['/time-log'] = ['TimeTrackingController', 'getTimeLog'];
        
        // Leave management routes
        $this->routes['GET']['/leave'] = ['LeaveController', 'index'];
        $this->routes['GET']['/leave/request'] = ['LeaveController', 'showRequestForm'];
        $this->routes['POST']['/api/leave/request'] = ['LeaveController', 'createLeaveRequest'];
        $this->routes['GET']['/api/leave/history'] = ['LeaveController', 'getLeaveHistory'];
        $this->routes['GET']['/api/leave/balance'] = ['LeaveController', 'getLeaveBalance'];
        
        // Manager routes
        $this->routes['GET']['/manager'] = ['ManagerController', 'index'];
        $this->routes['GET']['/api/manager/pending-requests'] = ['ManagerController', 'getPendingRequests'];
        $this->routes['POST']['/api/manager/approve'] = ['ManagerController', 'approveLeave'];
        $this->routes['POST']['/api/manager/reject'] = ['ManagerController', 'rejectLeave'];
    }
    
    /**
     * Handle incoming HTTP request
     */
    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        // Remove trailing slash except for root
        if ($uri !== '/' && substr($uri, -1) === '/') {
            $uri = rtrim($uri, '/');
        }
        
        // Check if route exists
        if (isset($this->routes[$method][$uri])) {
            $route = $this->routes[$method][$uri];
            $controllerName = $route[0];
            $methodName = $route[1];
            
            // Instantiate controller and call method
            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                if (method_exists($controller, $methodName)) {
                    return $controller->$methodName();
                }
            }
        }
        
        // Route not found
        $this->handleNotFound();
    }
    
    /**
     * Handle 404 Not Found
     */
    private function handleNotFound() {
        http_response_code(404);
        echo json_encode([
            'success' => false,
            'message' => 'ไม่พบหน้าที่ต้องการ'
        ]);
    }
}