<?php

namespace DesafioVk\Vk;

class App
{
    protected static $registry = [];

    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    public static function get($key)
    {
        if( ! array_key_exists($key, static::$registry)) {
            throw new \Exception("No key " . $key . " in the registry");
        }

        return static::$registry[$key];
    }
}