<?php

$router->get('', 'PageController@home');

$router->get('importar/xml', 'XmlController@index');
$router->post('importar/xml', 'XmlController@import');

$router->get('cartorio/adicionar', 'CartorioController@create');
$router->post('cartorio/adicionar', 'CartorioController@store');
$router->get('cartorio/editar', 'CartorioController@edit');
$router->post('cartorio/editar', 'CartorioController@update');
$router->get('cartorio/remover', 'CartorioController@destroy');

$router->get('importar/xls', 'XlsController@index');
$router->post('importar/xls', 'XlsController@import');

$router->get('comunicado', 'PageController@comunicado');
$router->post('comunicado/enviar', 'PageController@send');

$router->get('teste', function() {
    echo 'teste';
});
