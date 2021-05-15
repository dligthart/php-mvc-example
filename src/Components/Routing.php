<?php
/**
 * Class Routing.
 * 
 * @author dligthart
 * @package example
 */
class Routing 
{
    private $routes = array();
    private $errors = array();

    public function __construct() {
        //echo 'Router loaded <br/>' . PHP_EOL;
    }

	public function add($route, $controllerClass, $controllerMethod = 'index', $method = 'GET') {
		array_push($this->routes, array($route, $controllerClass, $controllerMethod, $method));
	}

	public function run() {
        
		$requestUri = explode('?', $_SERVER['REQUEST_URI'], 2);

		$requestedRoute = $requestUri[0];
        
        if(!in_array_r($requestedRoute, $this->routes)) {
            header('HTTP/1.0 404 Not Found');
        	echo (new View('404'))->fetch();
            exit;
        }

		foreach($this->routes as $routeArr) {
			
			$route = $routeArr[0];
			$controllerClass = $routeArr[1];
            $controllerMethod = $routeArr[2];
            $requestMethod = $routeArr[3];
            
			if ($route == $requestedRoute && $_SERVER['REQUEST_METHOD'] == $requestMethod) {
            
				load('Controllers/' . $controllerClass);

                $controller = new $controllerClass;
                
                if(!method_exists($controller, $controllerMethod)) {

                    // should throw an exception.
                    $error = "The controller does not provide an {$controllerMethod} method";
                    array_push($this->errors, $error);
                    die($error);
                }

                if($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'PUT') {
                    $response = $controller->{$controllerMethod}($_REQUEST);
                }
                else {
                    $response = $controller->{$controllerMethod}(...$_GET);
                }

                if($response instanceof View) {
                    echo $response->fetch();
                }
			} 
		}
	}
}