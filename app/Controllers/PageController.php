<?php

namespace DesafioVk\App\Controllers;

use DesafioVk\App\Controllers\BaseController;
use DesafioVk\Vk\App;

class PageController extends BaseController
{
    public function home()
    {
        // echo 'Hello World!';
        $titulo = 'Lista de Cartórios';
        $cartorios = App::get('database')->selectAll('cartorios');

        return $this->view('home', compact('cartorios', 'titulo'));
    }

    public function about()
    {
        $content = 'Sobre';

        return $this->view('about', compact('content'));
    }
}