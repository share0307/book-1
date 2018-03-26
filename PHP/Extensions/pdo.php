<?php
//连接管理
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

//方法实体
class PdoEntity
{

}


class DB
{
    private $db;

    private $sth;

    private static $dbh;
    public function __construct()
    {
        $params = [
            'host' => '127.0.0.1',
            'port' => '3306',
            'dbname' => 'test',
            'username' => 'root',
            'password' => 'UNgVouoi5tE2N3FEmJyiLy0HyPd',
        ];
        $this->db = PdoFactory::get($params);
    }


    public static function __callStatic($name, $arguments)
    {

        $pdoEntity = new PdoEntity(self::$dbh);
        $pdoEntity->${name}($arguments[0], $arguments[1]);
    }

    public function connection()
    {
        return new PdoEntity(self::$dbh);
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










