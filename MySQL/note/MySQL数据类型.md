#### 分类
```
- Numeric
- Date and Time
- String
```

#### Numeric

###### Integer
```
- tinyint
- smallint
- mediumint
- int
- bigint
```

###### Integer范围表
Type | Storage | Min | Max | display
----|----|----|----|----
 | (Bytes) | (Signed/Unsigned) | (Signed/Unsigned) | 
tinyint | 1 | -128 | 127 | 1-3
 | | 0 | 255 | 1-3
smallint | 2 | -32768 | 32767 | 1-5
 | | 0 | 65535 | 1-5
mediumint | 3 | -8388608 | 8388607 | 1-7
 | | 0 | 16777215 | 1-8
int | 4 | -2147483648 | 2147483647 | 1-10
 | | 0 | 4294967295 | 1-10
bigint | 8 | -9223372036854775808 | 1-18 9223372036854775807
 | | 0 | 18446744073709551615 | 1-19

######  类型属性*
```
zerofill
unsigned
NOT NULL
AUTO_INCREMENT
DEFAULT
```

###### decimal
- ```decimal(5)``` 等同于 ```decimal(5, 0)``` 数值范围是```-99999``` 到 ```99999```
- ```decimal(5, 2)```  数值范围是 ```-999.99``` 到 ```999.99```
- 默认值是 ```decimal(10)```, 最大值是```decimal(65)```

###### 其他
```
- float
- double
- bit
```

#### Date and Time
Data Type | "Zero" Value
----|----
date | '0000-00-00'
time | '00:00:00'
datetime | '0000-00-00 00:00:00'
timestamp | '0000-00-00 00:00:00'
year | '0000'

#### String 
```
- char
- varchar
- blob
- text
- enum
- set
```

#### char 和 varchar
- ```char``` 的存储大小 ```255 byte```
- ```varchar``` 的存储大小 ```665535```
- ```varchar``` 根据实际存储情况分配空间，```char``` 根据设置分配空间。

#### 类型长度设置
```
类型长度设置在interger和string中表现不一致
```












