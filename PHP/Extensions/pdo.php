<?php
//Pdo连接
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
            'host' => '123.207.116.147',
            'port' => '3306',
            'database' => 'azk_exam',
            'username' => 'azk_project',
            'password' => 'Puv3LKl3daloZ',
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

//Pdo实体方法
class PdoEntity
{
    private $dbh;

    private $sth;

    private $sql;

    private $params;



    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function select($sql, $params)
    {
        $this->sql = $sql;
        $this->params = $params;

        if($this->execute()) {
            return $this->sth->fetchAll();
        }

        return false;
    }

    public function selectFetch($sql, $params)
    {
        $this->sql = $sql;
        $this->params = $params;

        if($this->execute()) {
            return $this->sth->fetch();
        }

        return false;
    }

    public function selectFetchColumn($sql, $params)
    {
        $this->sql = $sql;
        $this->params = $params;

        if($this->execute()) {
            return $this->sth->fetchColumn();
        }

        return false;
    }



    public function insert($sql, $params)
    {
        $this->sql = $sql;
        $this->params = $params;
        return $this->execute();
    }

    public function update($sql, $params)
    {
        $this->sql = $sql;
        $this->params = $params;
        return $this->execute();
    }

    public function delete($sql, $params)
    {
        $this->sql = $sql;
        $this->params = $params;
        return $this->execute();
    }


    private function execute()
    {
        $this->validSql();
        $this->validParams();

        $this->sth = $this->dbh->prepare($this->sql);
        foreach ($this->params as $key => $val) {

            $param_type = PDO::PARAM_STR;
            if(is_int($val)) {
                $param_type = PDO::PARAM_INT;
            }
            else if(is_string($val)) {
                $param_type = PDO::PARAM_STR;
            }
            else if(is_null($val)) {
                $param_type = PDO::PARAM_NULL;
            }
            else if(is_bool($val)) {
                $param_type = PDO::PARAM_BOOL;
            }

            $this->sth->bindValue($key, $val, $param_type);
        }

        $this->sth->execute();
        if($this->sth->errorCode()  === '00000') {
            return true;
        }
        else {
            return false;
        }
    }


    public function debugSql()
    {

    }

    /**
     * sql语句检查处理
     */
    private function validSql()
    {

    }

    /**
     * sql参数绑定检查处理
     */
    private function validParams()
    {

    }


    /**
     * 错误码
     * @return string
     */
    public function errorCode()
    {
        if($this->sth) {
            return $this->sth->errorCode();
        }
        else {
            return '';
        }
    }

    /**
     * 错误信息
     * @return string
     */
    public function errorInfo()
    {
        if($this->sth) {
            return $this->sth->errorInfo();
        }
        else {
            return '';
        }
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

        return self::$pdoList[self::$defaultName]->{$name}($arguments[0], $arguments[1]);
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


$res = DB::selectFetchColumn('SELECT studentId FROM student WHERE studentId<:id LIMIT 1',[':id'=>10]);
var_dump($res);

//$sql $params
//DB::select();
//DB::selectFetchOne();
//DB::selectFetchColumn();
//
//DB::insert();
//DB::insertGetId();
//
//DB::update();
//DB::updateGetRow();
//
//DB::delete();
//DB::deleteGetRow();
//
//DB::beginTransaction();
//DB::commit();
//DB::rollBack();
//
//DB::connection('test')->select();

//查询构造器










