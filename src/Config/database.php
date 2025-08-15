<?php
/**
 * Database Configuration
 * 
 * Configuration settings for MariaDB database connection
 */

return [
    'host' => 'localhost',
    'dbname' => 'employee_tracker',
    'username' => 'primacom_bloguser',
    'password' => '', // Set your password here
    'charset' => 'utf8mb4',
    'port' => 3306,
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
    ]
];