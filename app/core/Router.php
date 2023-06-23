<?php

class Router
{
    private $routes = [];

    public function addRoute($url, $callback, $method = 'GET')
    {
        $this->routes[$method][$url] = $callback;
    }

    public function get($url, $callback)
    {
        $this->addRoute($url, $callback, 'GET');
    }

    public function post($url, $callback)
    {
        $this->addRoute($url, $callback, 'POST');
    }

    public function handleRequest($url, $method)
    {
        if (array_key_exists($method, $this->routes) && array_key_exists($url, $this->routes[$method])) {
            $callback = $this->routes[$method][$url];
            if (is_callable($callback)) {
                $callback();
            } else {
                echo "Invalid callback for route: " . $url;
            }
        } else {
            echo "Route not found: " . $url;
        }
    }

    public function run()
    {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        $this->handleRequest($url, $method);
    }
}
