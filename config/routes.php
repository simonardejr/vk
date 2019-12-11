<?php

$router->get('', 'PageController@home');

$router->get('about', 'PageController@about');

$router->get('teste', function() {
    echo 'teste';
});
