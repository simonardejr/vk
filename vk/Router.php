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
}