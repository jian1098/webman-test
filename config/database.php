<?php
/**
 * This file is part of webman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link      http://www.workerman.net/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

return [
    // 默认数据库
    'default' => 'mysql',
    // 各种数据库配置
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
    ]
];
