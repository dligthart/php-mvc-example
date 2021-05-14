<?php
/**
 * Class Http.
 * 
 * @author dligthart <ligthart@pm.me>
 * @package phpcursus
 */
class Http {

    public static function redirect($route) {
        header('location: /' . $route);
        exit;
    }
}