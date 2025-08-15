<?php
/**
 * Application Configuration
 * 
 * General application settings and constants
 */

return [
    'app_name' => 'Employee Leave Tracker',
    'app_version' => '1.0.0',
    'timezone' => 'Asia/Bangkok',
    'locale' => 'th_TH',
    'debug' => true,
    
    // Session configuration
    'session' => [
        'name' => 'ELT_SESSION',
        'lifetime' => 3600, // 1 hour
        'secure' => false, // Set to true in production with HTTPS
        'httponly' => true,
        'samesite' => 'Strict'
    ],
    
    // Security settings
    'security' => [
        'csrf_token_name' => '_token',
        'password_min_length' => 8,
        'session_regenerate_interval' => 300 // 5 minutes
    ],
    
    // Default pagination
    'pagination' => [
        'per_page' => 20,
        'max_per_page' => 100
    ]
];