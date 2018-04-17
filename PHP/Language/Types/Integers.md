## 整型取值范围
```
$a = PHP_INT_SIZE;
$b = PHP_INT_MAX;
$c = PHP_INT_MIN;

var_dump($a);
var_dump($b);
var_dump($c);
```



## 取整 [返回值是float类型，不是int类型]
```
$a = round(4.5); //4舍5入
$b = ceil(4.8);  //向上取整
$c = floor(4.3); //向下取整

var_dump($a);
var_dump($b);
var_dump($c);
```
