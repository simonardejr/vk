<?php

namespace DesafioVk\Vk\Support;

use DesafioVk\Vk\Support\XlsParser;
use DesafioVk\Vk\Support\XmlParser;

class FileHandler
{
    public static function getHandler($type)
    {
        $handler = new static;

        if ( $handler->fileIsXls($type) ) {
            return new XlsParser;
        }

        if ( $handler->fileIsXml($type) ) {
            return new XmlParser;
        }

        return $handler;
    }

    public function fileIsXls($type)
    {
        return (strpos($type, 'spreadsheet') !== false);
    }

    public function fileIsXml($type)
    {
        return (strpos($type, '/xml') !== false);
    }
}