<?php
namespace Mecha\Database;

use \PDO;
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

    public function query($sql)
    {
        $this->sql = $sql;
        $this->prepareSql();
        $itemList = [];
        foreach ($this->dbh->query($this->sql) as $item) {
            $itemList[] = $item;
        }
        return $itemList;
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
        $this->prepareSql();
        $this->prepareParams();

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
            throw new \PDOException($this->sth->errorInfo()[2]);
        }
    }



    public function debugSql()
    {
        $this->prepareSql();
        echo $this->sql . PHP_EOL;
    }

    /**
     * sql语句预处理
     */
    private function prepareSql()
    {
        if(is_callable($this->sql)) {
            $this->sql = $this->sql();
        }
    }

    /**
     * sql参数绑定预处理
     */
    private function prepareParams()
    {

    }

}