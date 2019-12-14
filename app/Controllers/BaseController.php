<?php

namespace DesafioVk\App\Controllers;

use DesafioVk\Vk\App;

class BaseController
{
    public $request;

    public function __construct()
    {
        $this->request = App::get('request')->data;
        session_start();
    }

    public function view($view, $data=[]) {
        extract($data);

        return require App::get('view_path') . $view . '.php';
    }

    public function redirect($to) {
        header("Location: /{$to}");
    }
    
    public function flash($message, $type="success")
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }
}