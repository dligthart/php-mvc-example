<?php
/**
 * Class Http.
 * 
 * @author dligthart
 * @package example
 */
class Http 
{

    public static function redirect($route) {
        header('location: /' . $route);
        exit;
    }
}