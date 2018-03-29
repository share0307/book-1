<?php
//Pdo连接
class PdoConnection
{
    private static $dbhList = [];

    public static function get($params)
    {
        $host = $params['host'] ?? '127.0.0.1';
        $port = $params['port'] ?? '3306';
        $dbname = $params['dbname'] ?? '';
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
            $dbh = new \PDO($dns, $username, $password,[PDO::ATTR_PERSISTENT=>$persistent]);
        } catch (\PDOException $e) {
            echo $e->getMessage().PHP_EOL;
            exit;
        }
        
        return self::$dbhList[$key] = $dbh;
    }
}

//Pdo配置
class PdoConf
{
    private static  $connection = [
        'mysql' => [
            'host' => '127.0.0.1',
            'port' => '3306',
            'database' => '',
            'username' => '',
            'password' => '',
            'persistent' => '',
            'charset' => '',
            'collation' => '',
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

//Pdo实体方法
class PdoEntity
{
    private $dbh = null;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function select()
    {

    }

}


//对外方法
class DB
{
    private static $pdoList;
    private static $defaultName = 'mysql';


    public static function __callStatic($name, $arguments)
    {
        if(!self::$pdoList[self::$defaultName]) {
            $conf = PdoConf::get(self::$defaultName);
            $dbh = PdoConnection::get($conf);
            self::$pdoList[self::$defaultName] = new PdoEntity($dbh);
        }

        self::$pdoList[self::$defaultName]->{$name}($arguments[0], $arguments[1]);
    }

    public static function connection($name)
    {
        if(!self::$pdoList[$name]) {
            $conf = PdoConf::get($name);
            $dbh = PdoConnection::get($conf);
            self::$pdoList[$name] = new PdoEntity($dbh);
        }
        return self::$pdoList[$name];
    }
}





//$sql $params
DB::select();
DB::selectFetchOne();
DB::selectFetchRow();

DB::insert();
DB::insertGetId();

DB::update();
DB::updateGetRow();

DB::delete();
DB::deleteGetRow();

DB::beginTransaction();
DB::commit();
DB::rollBack();

DB::connection('test')->select();

//查询构造器










