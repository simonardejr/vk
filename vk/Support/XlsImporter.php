<?php

namespace DesafioVk\Vk\Support;

use DesafioVk\Vk\App;

class XlsImporter
{
    public $file;
    public static $exists = 0;
    public static $inserted = 0;

    public static function import($xls, $table)
    {
        foreach($xls as $node) {
            $node['ativo'] = static::adjustValueFromAtivo($node['ativo']);

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

    public function adjustValueFromAtivo($value)
    {
        return ($value == 'SIM' ? '1' : '0');
    }
}