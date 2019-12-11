<?php

use DesafioVk\Vk\Router;

$router = Router::config('../config/routes.php');

$router->call( trim($_SERVER['REQUEST_URI'], '/'), $_SERVER['REQUEST_METHOD'] );