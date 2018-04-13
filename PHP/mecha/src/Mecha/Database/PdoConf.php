<?php
namespace Mecha\Database;

class PdoConf
{
    private static  $connection = [
        'mysql' => [
          
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