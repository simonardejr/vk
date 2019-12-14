<?php

use DesafioVk\Vk\App;
use DesafioVk\Vk\Request;
use DesafioVk\Vk\Database\Connection;
use DesafioVk\Vk\Database\QueryBuilder;

App::bind('request', new Request);

// configurando o path das views para "/resources/views"
App::bind('view_path', __DIR__ . '/../resources/views/');

App::bind('db_config', require '../config/database.php');

App::bind('database', new QueryBuilder(
    Connection::new( 
        App::get('db_config')['connections']['mysql'] 
    )
));
