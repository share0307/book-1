<?php
// 声明
$a = 1234; // decimal number
$b = -123; // a negative number
$c = 0123; // octal number (equivalent to 83 decimal)
$d = 0x1A; // hexadecimal number (equivalent to 26 decimal)
$e = 0b11111111; // binary number (equivalent to 255 decimal)

var_dump($a);
var_dump($b);
var_dump($c);
var_dump($d);
var_dump($e);

//强制类型转换
$a = (int) 1.1;
$b = (integer) 2.2;
$c = intval('a');

var_dump($a);
var_dump($b);
var_dump($c);

//取值范围
$a = PHP_INT_SIZE;
$b = PHP_INT_MAX;
$c = PHP_INT_MIN;

var_dump($a);
var_dump($b);
var_dump($c);

//取整 [返回值是float类型，不是int类型]
$a = round(4.5); //4舍5入
$b = ceil(4.8);  //向上取整
$c = floor(4.3); //向下取整

var_dump($a);
var_dump($b);
var_dump($c);

