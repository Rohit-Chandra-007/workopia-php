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
     * @return void
     */

    public function route($uri)
    {
        // get the current method
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        // loop through the routes and match the route
        foreach ($this->routes as $route) {
            // split the uri into parts

            $uriSegments = array_filter(explode('/', trim($uri, '/')));
            // split the route into parts
            # inspectAndDie($uriSegments);
            $routeSegments = array_filter(explode('/', trim($route['uri'], '/')));

            // check if the route matches the uri
            $match = true;
            if (
                count($uriSegments) === count($routeSegments)
                && strtoupper($requestMethod === $route['method'])
            ) {
                $params = [];
                $match = true;
                // loop through the uri parts and check if they match the route parts
                for ($i = 0; $i < count($uriSegments); $i++) {

                    // if the uri part does not match the route part and the route part is not a parameter
                    if ($uriSegments[$i] !== $routeSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
                        $match = false;
                        break;
                    }
                    // check for the parameters in the route and add them to the params array
                    if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                        $params[$matches[1]] = $uriSegments[$i];
                    }
                }

                if ($match) {
                    $controller = 'App\Controllers\\' . $route['controller'];
                    $controllerMethod = $route['controllerMethod'];

                    // create a new instance of the controller and call the method
                    $controllerInstantance = new $controller();
                    $controllerInstantance->$controllerMethod($params);

                    return;
                }
            }
        }

        ErrorController::show404();
    }
}
