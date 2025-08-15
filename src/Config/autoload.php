<?php
/**
 * Autoloader for the Employee Leave Tracker application
 * 
 * Simple PSR-4 compatible autoloader
 */

spl_autoload_register(function ($className) {
    // Base directory for the namespace prefix
    $baseDir = APP_ROOT . '/src/';
    
    // Replace namespace separators with directory separators
    $file = $baseDir . str_replace('\\', '/', $className) . '.php';
    
    // If the file exists, require it
    if (file_exists($file)) {
        require_once $file;
        return true;
    }
    
    return false;
});

// Load environment variables from .env if available
$envFile = APP_ROOT . '/.env';
if (file_exists($envFile)) {
    $env = parse_ini_file($envFile, false, INI_SCANNER_TYPED);
    if ($env !== false) {
        foreach ($env as $key => $value) {
            if (getenv($key) === false) {
                putenv("$key=$value");
                $_ENV[$key] = $value;
            }
        }
    }
}

// Load configuration files
$GLOBALS['config'] = [
    'app' => require_once APP_ROOT . '/src/Config/app.php',
    'database' => require_once APP_ROOT . '/src/Config/database.php'
];

// Set timezone
date_default_timezone_set($GLOBALS['config']['app']['timezone']);