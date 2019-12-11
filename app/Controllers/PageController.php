<?php

namespace DesafioVk\App\Controllers;

use DesafioVk\App\Controllers\BaseController;
class PageController extends BaseController
{
    public function home()
    {
        // echo 'Hello World!';
        $content = 'Hello World!';
        return $this->view('home', compact('content'));
    }

    public function about()
    {
        $content = 'Sobre';
        return $this->view('about', compact('content'));
    }
}