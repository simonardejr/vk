<?php

$router->get('', 'PageController@home');

$router->get('importar/xml', 'XmlController@index');
$router->post('importar/xml', 'XmlController@import');

$router->get('teste', function() {
    echo 'teste';
});
