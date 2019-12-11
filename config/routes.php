<?php

$router->get('', 'PageController@home');

$router->get('teste', function() {
    echo 'teste';
});
