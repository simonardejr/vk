<?php

use DesafioVk\Vk\Router;

$router = Router::config('../config/routes.php');

var_dump($router->listRoutes());