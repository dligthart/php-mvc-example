<?php
/**
 * Bootstrap.
 * 
 * @author dligthart
 * @package example
 */

/**
 * Load file
 *
 * @param [type] $class_name
 * @return void
 */
function load($class_name) {
    include_once $class_name . '.php';
}

/**
 * Bootstrap.
 *
 * @return void
 */
function bootstrap() {
    load('config');
    load('Support/helpers');
    load('Components/Session');
    load('Components/Http');
    load('Views/View');
    load('Controllers/Controller');
    load('Components/Routing');
}

bootstrap();

Session::start();

$router = new Routing;
$router->add('/login', 'LoginController', 'index', 'GET');
$router->add('/login', 'LoginController', 'login', 'POST');
$router->add('/logout', 'LoginController', 'logout', 'GET');
$router->run();