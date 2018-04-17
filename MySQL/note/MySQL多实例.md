#### 配置文件[my.cnf]
```
[mysqld@port3306]
port=3306
datadir=/var/lib/mysql-port3306
socket=/var/lib/mysql-port3306/mysql.sock
log_error=/var/log/mysql-port3306.log

[mysqld@port3308]
port=3308
datadir=/var/lib/mysql-port3308
socket=/var/lib/mysql-port3308/mysql.sock
log_error=/var/log/mysql-port3308.log
```

#### 服务启动
```
systemctl start mysqld@port3306
systemctl start mysqld@port3308
```

#### 客户端连接
```
mysql -uroot -P3306 --socket=/var/lib/mysql-port3306/mysql.sock
mysql -uroot -P3308 --socket=/var/lib/mysql-port3308/mysql.sock
```