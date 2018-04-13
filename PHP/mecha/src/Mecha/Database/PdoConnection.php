<?php
namespace Mecha\Database;

use \PDO;
use \PDOException;
class PdoConnection
{
    private static $dbhList = [];

    public static function get($params)
    {
        $host = $params['host'] ?? '127.0.0.1';
        $port = $params['port'] ?? '3306';
        $dbname = $params['database'] ?? '';
        $username = $params['username'] ?? '';
        $password = $params['password'] ?? '';
        $persistent = $params['persistent'] ?? true;

        $dns = "mysql:host={$host};port={$port};dbname={$dbname}";
        $key = "{$dns}username:{$username}password:{$password}";
        if(isset(self::$dbhList[$key])) {
            return self::$dbhList[$key];
        }

        $dbh = null;
        try {
            $dbh = new PDO($dns, $username, $password,[PDO::ATTR_PERSISTENT=>$persistent]);
        } catch (PDOException $e) {
            echo $e->getMessage().PHP_EOL;
            exit;
        }

        return self::$dbhList[$key] = $dbh;
    }
}