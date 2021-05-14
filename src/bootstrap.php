<?php
/**
 * Bootstrap.
 * 
 * @author dligthart <ligthart@pm.me>
 * @package phpcursus
 */


function load($class_name) {
    include_once $class_name . '.php';
}

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