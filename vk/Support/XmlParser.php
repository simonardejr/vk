<?php

namespace DesafioVk\Vk\Support;

class XmlParser
{
    public $file;

    public function load($file)
    {
        $xmlParser = new static;

        $xmlParser->file = simplexml_load_file($file);

        return $xmlParser;
    }

    public function convertToArray()
    {
        $json  = json_encode($this->file);

        return json_decode($json, true)['cartorio'];
    }

    public function getNumberOfNodes($key)
    {
        return $this->file->$key->count();
    }
}