<?php

namespace DesafioVk\Vk;

class Request
{
    public $request;
    public $data;

    public function __construct()
    {
        $this->request = $_SERVER;
        $this->data    = (object) $_REQUEST;
    }

    public function uri()
    {
        return trim(parse_url($this->request['REQUEST_URI'], PHP_URL_PATH),'/');
    }

    public function method()
    {
        return $this->request['REQUEST_METHOD'];
    }
}