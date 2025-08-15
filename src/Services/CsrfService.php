<?php
/**
 * CSRF Service
 *
 * Utility class for generating and validating CSRF tokens
 */

class CsrfService {

    /**
     * Get token name from configuration
     */
    public static function getTokenName() {
        return $GLOBALS['config']['app']['security']['csrf_token_name'] ?? '_token';
    }

    /**
     * Generate or retrieve existing token
     */
    public static function getToken() {
        $name = self::getTokenName();
        if (empty($_SESSION[$name])) {
            $_SESSION[$name] = bin2hex(random_bytes(32));
        }
        return $_SESSION[$name];
    }

    /**
     * Validate provided token against session token
     */
    public static function validate($token) {
        $name = self::getTokenName();
        if (empty($_SESSION[$name]) || !is_string($token)) {
            return false;
        }

        return hash_equals($_SESSION[$name], $token);
    }
}

