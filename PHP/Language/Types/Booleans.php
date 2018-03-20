<?php

//声明 [最佳实践：php的关键字，必须小写]
$a = true;
$b = false;

var_dump($a);
var_dump($b);

//强制类型转换
$a = (bool) 1;
$b = (boolean) 1;

var_dump($a);
var_dump($b);

//其他类型转换为boolean
var_dump((bool) "");        // bool(false)
var_dump((bool) 1);         // bool(true)
var_dump((bool) -2);        // bool(true)
var_dump((bool) "foo");     // bool(true)
var_dump((bool) 2.3e5);     // bool(true)
var_dump((bool) array(12)); // bool(true)
var_dump((bool) array());   // bool(false)
var_dump((bool) "false");   // bool(true)