<?php

require '../vendor/autoload.php';
require '../vk/bootstrap.php';

use DesafioVk\Vk\Request;
use DesafioVk\Vk\Router;
use DesafioVk\Vk\App;

// $request = new Request;

$router = Router::config('../config/routes.php');

$router->call( App::get('request')->uri(), App::get('request')->method() );