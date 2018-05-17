## mysql


#### 连接mysql
```
mysql -u username -ppassword -h host -P port -A database_name
```

#### mysqldump
```
mysqldump -u username -p password --no-create-info --tab=/tmp database_name table_name
mysqldump -u root -p password database_name > database_dump.txt
mysqldump -u root -p password > database_dump.txt
mysqldump -u root -p password --all-databases > database_dump.txt
mysqldump -u root -p password database_name table_name > dump.txt
mysql -u root -p password database_name < dump.txt
mysqldump -u root -p database_name | mysql -h other-host.com database_name

```

#### mysqlimport
```
mysql> LOAD DATA LOCAL INFILE 'dump.txt' INTO TABLE mytbl;

mysql> LOAD DATA LOCAL INFILE 'dump.txt' INTO TABLE mytbl FIELDS TERMINATED BY ':' LINES TERMINATED BY '\r\n';

mysql> LOAD DATA LOCAL INFILE 'dump.txt' INTO TABLE mytbl (b, c, a);

mysqlimport -u root -p --local database_name  dump.txt
mysqlimport -u root -p --local --fields-terminated-by=":" --lines-terminated-by="\r\n"  database_name dump.txt
mysqlimport -u root -p --local --columns=b,c,a database_name dump.txt
```

##### CREATE
```
CREATE DATABASE database_name DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use database_name

CREATE UNIQUE INDEX index_name ON table_name ( column_name1, column_name2,...)
CREATE UNIQUE INDEX AUTHOR_INDEX ON table_name (column_name)
CREATE UNIQUE INDEX AUTHOR_INDEX ON table_name (column_name DESC)

CREATE TABLE `user` (
  `userId` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `userName` varchar(255)  NOT NULL DEFAULT '' COMMENT '用户名',
  `age` tinyint(3)  unsigned NOT NULL DEFAULT '18' COMMENT '年龄',
  `phone` int(11)  unsigned NOT NULL DEFAULT '0' COMMENT '手机号',
  `tel` varchar(11)  NOT NULL DEFAULT '' COMMENT '电话',
  `passwd` char(32)  NOT NULL DEFAULT '' COMMENT '密码',
  `birthday` datetime  NOT NULL DEFAULT '1990-01-01' COMMENT '出生年月',
  `addtime` int(11)  NOT NULL DEFAULT '0' COMMENT '添加时间',
  `changetime` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`userId`),
  UNIQUE KEY `phone` (`phone`),
  KEY `addtime` (`addtime`)
) ENGINE=InnoDB  DEFAULT CHARSET=UTF8


CREATE TABLE tableA SELECT * FROM tableB;   //复制表数据和表结构
```

##### SHOW
```
SHOW COLUMNS FROM table_name;
SHOW TABLE STATUS LIKE 'table_name' \G
SHOW INDEX FROM table_name \G
```

##### ALTER
```
ALTER TABLE table_name ADD column_name datatype AFTER before_column_name
ALTER TABLE table_name DROP column_name
ALTER TABLE table_name MODIFY column_name datatype
ALTER TABLE table_name CHANGE column_name1  column_name2 datatype
ALTER TABLE table_name1 RENAME TO table_name2;
ALTER TABLE table_name TYPE = InnoDB;

ALTER TABLE table_name ADD PRIMARY KEY (column_list)
ALTER TABLE table_name ADD UNIQUE index_name (column_list)
ALTER TABLE table_name ADD INDEX index_name (column_list)
ALTER TABLE table_name ADD FULLTEXT index_name (column_list)
ALTER TABLE table_name DROP PRIMARY KEY;
```

##### DATATYPE
```
INT
TINYINT
SMALLINT
MEDIUMINT
BIGINT
FLOAT(M,D)
DOUBLE(M,D)
DECIMAL(M,D)

DATE
DATETIME
TIMESTAMP
TIME
YEAR(M)

CHAR(M)
VARCHAR(M)
BLOB
TINYBLOB
MEDIUMBLOB
LONGBLOB
TEXT
TINYTEXT
MEDIUMTEXT
LONGTEXT
ENUM
```
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'zcp513' WITH GRANT OPTION;
