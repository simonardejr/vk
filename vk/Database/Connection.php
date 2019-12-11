<?php

namespace DesafioVk\Vk\Database;

class Connection
{
    public static function new($config)
    {
        $pdoString = $config['host'] . ';dbname=' . $config['database'];

        try {
            return new \PDO(
                'mysql:host=' . $pdoString,
                $config['db_username'],
                $config['db_password'],
                $config['extras']
            );
        } catch ( \PDOException $e ) {
            die('Could not connect: ' . $e->getMessage() );
        }
    }
}