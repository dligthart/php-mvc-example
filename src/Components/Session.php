<?php
/**
 * Class Session.
 * 
 * @author dligthart
 * @package example
 */
class Session 
{

    public static function start(): bool {
        return session_start();
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key): string {
        return $_SESSION[$key]??'';
    }

    public static function stop(): bool {
        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        return session_destroy();
    }
}