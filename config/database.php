<?php

return [
    'connections' => [
        'mysql' => [
            'database'    => 'db_de_teste',
            'db_username' => 'root',
            'db_password' => '123456',
            'host'        => '127.0.0.1',
            'extras'      => [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ],
        ],
    ]
];