<?php

/**
 * The SessionManager class, its use is to manage session
 */
class SessionManager
{
    
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
   
    public function get($key)
    {
        if (array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }
        return null;
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function remove($key)
    {
        if (array_key_exists($key, $_SESSION)) {
            unset($_SESSION[$key]);
        }
    }

    public function clear()
    {
        session_unset();
    }
    public function destruct()
    {
        return session_destroy();
    }
   

    public function has($key)
    {
        return array_key_exists($key, $_SESSION);
    }
}
