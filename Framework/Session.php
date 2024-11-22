<?php

namespace Framework;
class Session
{
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Set a session key/value pair
     *
     * @param string $key
     * @param mixed $value 
     *
     * @return void
     *
     */
    public static function setSession($key, $value)
    {
        $_SESSION[$key] = $value;

    }

    /**
     * Get Session value by the key
     * @param string $key
     * @param $default
     * @return mixed|null
     */

    public static function getSession(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Check if session key exists
     * @param string $key
     * @return bool
     *
     */

    public static function hasSession(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Clear Session by key
     * @param string $key
     */
    public static function clearSession(string $key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * Clear All Session
     * @return void
     */

    public static function clearAllSession()
    {
        session_unset();
        session_destroy();
    }

    /**
     * Set a flash message
     * @param string $key
     * @param string $message
     * @return void
     */
    public static function setFlashMessage(string $key, string $message)
    {
        self::setSession('flash_' . $key, $message);
    }

    /**
     * Get a flash message
     * @param string $key
     * @param string $default
     * @return string
     */
    public static function getFlashMessage(string $key, string $default = null) 
    {
        $message = self::getSession('flash_' . $key, $default);
        self::clearSession('flash_' . $key);
        return $message;
    }
}