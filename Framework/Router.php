<?php

namespace Framework;

use App\Controllers\ErrorController;


class Router
{
    protected $routes = [];

    /**
     * Register a route
     * @param string $method
     * @param string $uri
     * @param string $action
     * @return void
     */

    public function registerRoute($method, $uri, $action)
    {

        list($controller, $controllerMethod) = explode('@', $action);
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod
        ];
    }

    /**
     * Add a GET routes 
     * @param string $route
     * @param string $controller
     * @return void
     */

    public function get($uri, $controller)
    {

        $this->registerRoute('GET', $uri, $controller);
    }

    /**
     * Add a POST routes 
     * @param string $route
     * @param string $controller
     * @return void
     */

    public function post($uri, $controller)
    {

        $this->registerRoute('POST', $uri, $controller);
    }

    /**
     * Add a PUT routes 
     * @param string $route
     * @param string $controller
     * @return void
     */

    public function put($uri, $controller)
    {

        $this->registerRoute('PUT', $uri, $controller);
    }

    /**
     * Add a DELETE routes 
     * @param string $route
     * @param string $controller
     * @return void
     */

    public function delete($uri, $controller)
    {

        $this->registerRoute('DELETE', $uri, $controller);
    }


    /**
     * Route the request 
     * @param string $route
     * @param string $method
     * @return void
     */

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                //code..
                $controller = 'App\Controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];

                // create a new instance of the controller and call the method
                $controllerInstantance = new $controller();
                $controllerInstantance->$controllerMethod();

                return;
            }
        }

        ErrorController::show404();
    }
}
