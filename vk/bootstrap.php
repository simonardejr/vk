<?php

use DesafioVk\Vk\App;
use DesafioVk\Vk\Request;
use DesafioVk\Vk\Database\Connection;

App::bind('request', new Request);

// configurando o path das views para "/resources/views"
App::bind('view_path', __DIR__ . '/../resources/views/');


// $config = require '../config/database.php';
App::bind('db_config', require '../config/database.php');

// Connection::new($config['connections']['mysql']);
Connection::new(App::get('db_config')['connections']['mysql']);