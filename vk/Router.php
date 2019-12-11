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
}