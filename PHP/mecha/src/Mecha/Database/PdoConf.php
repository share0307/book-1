<?php
namespace Mecha\Database;

class PdoConf
{
    private static  $connection = [
        'mysql' => [
            'host' => '127.0.0.1',
            'port' => '3306',
            'database' => '',
            'username' => '',
            'password' => '',
            'persistent' => true
        ],
        'localTest' => [
            'host' => '192.168.52.162',
            'port' => '3306',
            'database' => 'test',
            'username' => 'admin',
            'password' => 'KoGHgj5hXJQpKo0b',
            'persistent' => true
        ],
    ];

    public static function get($name)
    {
        return self::$connection[$name];
    }

    public static function set($conf)
    {
        self::$connection = array_merge(self::$connection, $conf);
    }
}