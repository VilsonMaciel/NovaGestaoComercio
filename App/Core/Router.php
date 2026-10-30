<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function dispatch()
    {
        $config = require __DIR__ . '/../../config/app.php';
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $baseFolder = $config['base_folder'] ?? '/NovaGestaoComercio/';
        $uri = str_ireplace($baseFolder, '/', $uri);
        $uri = str_ireplace('/NovaGestaoComercio/', '/', $uri);
        $uri = str_ireplace('/novagestao/', '/', $uri);
        $uri = str_ireplace('/index.php', '', $uri);
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['uri'] === $uri) {
                list($controllerName, $methodName) = explode('@', $route['controller']);
                $controllerName = "Controllers\\" . $controllerName;
                
                if (class_exists($controllerName)) {
                    $controller = new $controllerName();
                    if (method_exists($controller, $methodName)) {
                        $controller->$methodName();
                        return;
                    }
                }
            }
        }

        http_response_code(404);
        echo "404 - Page Not Found";
    }
}
