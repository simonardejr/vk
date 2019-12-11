<?php

namespace DesafioVk\App\Controllers;

use DesafioVk\App\Controllers\BaseController;
class PageController extends BaseController
{
    public function home()
    {
        // echo 'Hello World!';
        $content = 'Hello World! ' . time();
        return $this->view('home', compact('content'));
    }
}