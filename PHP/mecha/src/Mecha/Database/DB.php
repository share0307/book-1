<?php
namespace Mecha\Database;

use Mecha\Database\PdoConf;
use Mecha\Database\PdoConnection;
use Mecha\Database\PdoEntity;


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

    public static function connection($name='mysql')
    {
        if(!self::$pdoList[$name]) {
            $conf = PdoConf::get($name);
            $dbh = PdoConnection::get($conf);
            self::$pdoList[$name] = new PdoEntity($dbh);
        }
        return self::$pdoList[$name];
    }
}





// 原生查询
//$sql $params
//查询
//DB::select();二维数组
//DB::selectFetch();一维数组
//DB::selectFetchColumn();//单个值
//插入
//DB::insert();// true || false
//DB::insertGetId();// id || false
//更新
//DB::update();// true || false
//DB::updateGetRow();// row || false
//删除
//DB::delete();//true || false
//DB::deleteGetRow();// row || false
//事务
//DB::beginTransaction();
//DB::commit();
//DB::rollBack();
//元数据
//DB::query();
//选择连接库
//DB::connection('test')->select();
//$db = DB::connection('test')
//$db->select();

//查询构造器










