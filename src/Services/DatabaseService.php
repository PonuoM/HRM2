<?php
/**
 * Database Service
 * 
 * Singleton class for managing database connections using PDO
 */

class DatabaseService {
    private static $instance = null;
    private $connection;
    private $config;
    
    private function __construct() {
        $this->config = $GLOBALS['config']['database'];
        $this->connect();
    }
    
    /**
     * Get singleton instance
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Establish database connection
     */
    private function connect() {
        try {
            $dsn = "mysql:host={$this->config['host']};port={$this->config['port']};dbname={$this->config['dbname']};charset={$this->config['charset']}";
            
            $this->connection = new PDO(
                $dsn,
                $this->config['username'],
                $this->config['password'],
                $this->config['options']
            );
            
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }
    
    /**
     * Get PDO connection
     */
    public function getConnection() {
        return $this->connection;
    }
    
    /**
     * Prepare SQL statement
     */
    public function prepare($sql) {
        return $this->connection->prepare($sql);
    }
    
    /**
     * Execute SQL query
     */
    public function query($sql) {
        return $this->connection->query($sql);
    }
    
    /**
     * Get last insert ID
     */
    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }
    
    /**
     * Begin transaction
     */
    public function beginTransaction() {
        return $this->connection->beginTransaction();
    }
    
    /**
     * Commit transaction
     */
    public function commit() {
        return $this->connection->commit();
    }
    
    /**
     * Rollback transaction
     */
    public function rollback() {
        return $this->connection->rollback();
    }
    
    /**
     * Check if connection is alive
     */
    public function isConnected() {
        try {
            $this->connection->query('SELECT 1');
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    // Prevent cloning and unserialization
    private function __clone() {}
    public function __wakeup() {}
}