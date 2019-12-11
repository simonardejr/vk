<?php

require '../vendor/autoload.php';
require '../vk/bootstrap.php';

use DesafioVk\Vk\Request;
use DesafioVk\Vk\Router;

$request = new Request;

$router = Router::config('../config/routes.php');

$router->call( $request->uri(), $request->method() );