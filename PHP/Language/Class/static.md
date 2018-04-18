## 静态延迟绑定

```
<?php
/**
 * 静态延迟绑定
 */

//使用static::
class Foo {
    public static function who() {
        echo __CLASS__ . PHP_EOL;
    }
    public static function test() {
        static::who(); // 后期静态绑定从这里开始
    }
}
class Bar extends Foo {
    public static function who() {
        echo __CLASS__ . PHP_EOL;
    }
}
Bar::test();


//区分转发调用和非转发调用
class A {
    public static function foo() {
        static::who();
    }

    public static function who() {
        echo __CLASS__ . PHP_EOL;
    }
}

class B extends A {
    public static function test() {
        //非转发调用，就是在A中调用who
        A::foo();

        //转发调用,相当在C调用who
        static::who();
        parent::foo();
        self::foo();
    }

    public static function who() {
        echo __CLASS__. PHP_EOL;
    }
}

class C extends B {
    public static function who() {
        echo __CLASS__ . PHP_EOL;
    }
}

C::test();

//使用示例
class Model
{
    public static function find()
    {
        echo static::$name;
    }
}

class Product extends Model
{
    protected static $name = 'Product';
}

Product::find();

```