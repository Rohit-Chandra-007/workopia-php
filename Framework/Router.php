<?php

namespace Framework;

use App\controllers\ErrorController;
use Framework\middleware\Authorize;


class Router
{
    protected array $routes = [];

    /**
     * Register a route
     * @param string $method
     * @param string $uri
     * @param string $action
     * @param array $middleware
     * @return void
     */

    public function registerRoute(string $method, string $uri, string $action, array $middleware = []): void
    {

        list($controller, $controllerMethod) = explode('@', $action);
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod,
            'middleware' => $middleware
        ];
    }

    /**
     * Add a GET routes
     * @param $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */

    public function get($uri, string $controller, array $middleware = []): void
    {

        $this->registerRoute('GET', $uri, $controller, $middleware);
    }

    /**
     * Add a POST routes
     * @param $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */

    public function post($uri, string $controller, array $middleware = []): void
    {

        $this->registerRoute('POST', $uri, $controller, $middleware);
    }

    /**
     * Add a PUT routes
     * @param $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */

    public function put($uri, string $controller, array $middleware = []): void
    {

        $this->registerRoute('PUT', $uri, $controller, $middleware);
    }

    /**
     * Add a DELETE routes
     * @param $uri
     * @param string $controller
     * @param array $middleware
     * @return void
     */

    public function delete($uri, string $controller, array $middleware = []): void
    {

        $this->registerRoute('DELETE', $uri, $controller, $middleware);
    }


    /**
     * Route the request
     * @param $uri
     * @return void
     */

    public function route($uri): void
    {
        // get the current method
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // check if the uri has a query string and remove it
        if ($requestMethod === 'POST' && isset($_POST['_method'])) {
            // override the request method with the value of the _method input
            $requestMethod = strtoupper($_POST['_method']);
        }
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

                // loop through the uri parts and check if they match the route parts
                for ($i = 0; $i < count($uriSegments); $i++) {

                    // if the uri part does not match the route part and the route part is not a parameter
                    if ($uriSegments[$i] !== $routeSegments[$i] && !preg_match('/\{(.+?)}/', $routeSegments[$i])) {
                        $match = false;
                        break;
                    }
                    // check for the parameters in the route and add them to the params array
                    if (preg_match('/\{(.+?)}/', $routeSegments[$i], $matches)) {
                        $params[$matches[1]] = $uriSegments[$i];
                    }
                }

                if ($match) {
                    foreach ($route['middleware'] as $middleware) {
                        (new Authorize())->handle($middleware);
                    }
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
