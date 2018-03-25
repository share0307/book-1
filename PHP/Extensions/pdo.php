<?php
class DB
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


class Test
{
    private $db;
    public function __construct()
    {
        $params = [
            'host' => '127.0.0.1',
            'port' => '3306',
            'dbname' => 'test',
            'username' => 'root',
            'password' => 'UNgVouoi5tE2N3FEmJyiLy0HyPd',
        ];
        $this->db = DB::get($params);
    }
    
    public function t1()
    {
        $sql = "insert into t1 (id, name, age) values(1, 'test', 10)";
        $res = $this->db->exec($sql);
        var_dump($res);exit;
              
    }

    public function t2()
    {
        $sql = "select * from t1";
        $res = $this->db->query($sql);
        foreach($res as $val) {
             var_dump($val);exit;
        }
    }
}





$test = new Test();
$test->t2();








