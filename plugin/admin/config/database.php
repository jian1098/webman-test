<?php
return  [
    'default' => 'mysql',
    'connections' => [
        'mysql' => [
            'driver'      => env_get('DATABASE.DRIVER', 'mysql'),
            'host'        => env_get('DATABASE.HOST', '127.0.0.1'),
            'port'        => env_get('DATABASE.PORT', 3306),
            'database'    => env_get('DATABASE.DATABASE'),
            'username'    => env_get('DATABASE.USERNAME'),
            'password'    => env_get('DATABASE.PASSWORD'),
            'unix_socket' => '',
            'charset'     => 'utf8mb4',
            'collation'   => 'utf8mb4_unicode_ci',
            'prefix'      => env_get('DATABASE.PREFIX', ''),
            'strict'      => true,
            'engine'      => null,
        ],
    ],
];