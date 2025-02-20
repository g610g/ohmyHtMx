<?php

namespace App;

class Route
{

    private $routes = [];
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function get($route, $callback)
    {
        $this->register('get', $route, $callback);
    }

    public function post($route, $callback)
    {
        $this->register('post', $route, $callback);
    }

    private function register($verb, $route, $callback)
    {
        $this->routes[$verb][$route] = $callback;
    }
    public function execute()
    {
        $request = $this->request['REQUEST_URI'];
        $method = strtolower($this->request['REQUEST_METHOD']);
        if (isset($this->routes[$method][$request])) {
            if (is_callable($this->routes[$method][$request])) {
                return call_user_func($this->routes[$method][$request]);
            } else {
                echo "callback is not called";
            }
        }
    }
};
