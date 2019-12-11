<?php

namespace DesafioVk\Vk;

class Router
{
    protected $routes = [
        'get' => [],
        'post' => [],
        'patch' => [],
        'put' => []
    ];

    public function listRoutes()
    {
        return $this->routes;
    }

    public static function config($file)
    {
        $router = new static;

        if( file_exists($file) ) {
            require $file;
        }

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['get'][$uri] = $controller;
    }

    public function call($uri, $requestType)
    {
        $requestType = strtolower($requestType);
        $callback = $this->getCallback($uri, $requestType);

        if( array_key_exists($uri, $this->routes[$requestType]) ) {
            if( $this->isClosure($callback) ) {
                return $this->callUserFunc($callback);
            }
            return $this->action(...explode('@', $callback));
        }

        throw new \Exception('No route defined for this URI');
    }

    public static function isClosure($callback) {
        return $callback instanceof \Closure;
    }

    public function getCallback($uri, $requestType)
    {
        return $this->routes[$requestType][$uri] ?? false;
    }

    protected function action($controller, $action)
    {
        try {
            $controller = "DesafioVk\\App\\Controllers\\{$controller}";
            $controller = new $controller;

            return $controller->$action();

        } catch ( \Exception $e ) {
            die("{$controller} does not respond to the {$action} action.");
        }
    }

    protected function callUserFunc($callback)
    {
        if ( is_callable($callback) ) {
            return call_user_func($callback);
        }

        return $callback();
    }
}