<?php

namespace DesafioVk\Vk\Support;

use DesafioVk\Vk\Support\XlsImporter;
use DesafioVk\Vk\Support\XmlImporter;

class ImportHandler
{
    public static function getHandler($type)
    {
        $handler = new static;

        if ( $handler->fileIsXls($type) ) {
            return new XlsImporter;
        }

        if ( $handler->fileIsXml($type) ) {
            return new XmlImporter;
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