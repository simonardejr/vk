<?php

$router->get('', 'PageController@home');

$router->get('importar/xml', 'XmlController@index');
$router->post('importar/xml', 'XmlController@import');

$router->get('cartorio/adicionar', 'CartorioController@create');
$router->post('cartorio/adicionar', 'CartorioController@store');
$router->get('cartorio/editar', 'CartorioController@edit');
$router->post('cartorio/editar', 'CartorioController@update');
$router->get('cartorio/remover', 'CartorioController@destroy');

$router->get('teste', function() {
    echo 'teste';
});
