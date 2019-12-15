<?php

namespace DesafioVk\Vk\Support;

use DesafioVk\Vk\App;

class XmlImporter
{
    public $file;
    public static $exists = 0;
    public static $inserted = 0;

    public static function import($xml, $table)
    {
        // $xml = $xml->convertToArray();
        foreach($xml as $node) {
            if(static::checkIfExists(['documento'=>$node['documento'], 'nome'=>$node['nome']], $table)) {
                static::$exists++;
            }
            else {
                if(App::get('database')->insert($table, $node)) {
                    static::$inserted++;
                }
            }
        }
    }

    public function checkIfExists($record, $table)
    {
        return App::get('database')->find($record, $table);
    }
}