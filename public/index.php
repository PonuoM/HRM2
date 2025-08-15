<?php
/**
 * Employee Leave Tracker - Main Entry Point
 * 
 * This is the main entry point for the employee leave tracking application.
 * It handles routing and initializes the MVC framework.
 */

// Start session
session_start();

// Set error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define application constants
define('APP_ROOT', dirname(__DIR__));
define('PUBLIC_ROOT', __DIR__);
define('APP_DEBUG', true);

// Include autoloader and configuration
require_once APP_ROOT . '/src/Config/autoload.php';
require_once APP_ROOT . '/src/Config/routes.php';

// Initialize the application
try {
    $router = new Router();
    $router->handleRequest();
} catch (Exception $e) {
    if (APP_DEBUG) {
        echo "Error: " . $e->getMessage();
    } else {
        echo "เกิดข้อผิดพลาดในระบบ กรุณาลองใหม่อีกครั้ง";
    }
}