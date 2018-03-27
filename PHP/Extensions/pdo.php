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
         
        $dns = "mysql:host={$host};port={$port};dbname={$dbname}";
        $key = "{$dns}username:{$username}password:{$password}";
        if(isset(self::$dbhList[$key])) {
            return self::$dbhList[$key];
        } 
        
        $dbh = null;
        try {
            $dbh = new \PDO($dns, $username, $password,array(PDO::ATTR_PERSISTENT=>true));
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
    private  $connection = [];

    public function get($name)
    {
        return $this->connection[$name];
    }

    public function set($conf)
    {
        $this->connection = array_merge($this->connection, $conf);
    }
}

//Pdo实体方法
class PdoEntity
{

}


//对外方法
class DB
{
    private static $pdoList;
    private static $defaultName = 'mysql';


    public static function __callStatic($name, $arguments)
    {
        if(!self::$pdoList[self::$defaultName]) {
            $conf = new PdoConf(self::$defaultName);
            $dbh = new PdoConnection($conf);
            self::$pdoList[self::$defaultName] = new PdoEntity($dbh);
        }

        self::$pdoList[self::$defaultName]->{$name}($arguments[0], $arguments[1]);
    }

    public static function connection($name)
    {
        if(!self::$pdoList[$name]) {
            $conf = new PdoConf($name);
            $dbh = new PdoConnection($conf);
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










