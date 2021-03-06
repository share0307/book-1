#### 服务器
```
主ip: 123.207.116.147
从ip：123.207.119.37
```

#### 主配置(123.207.116.147)
```
//创建日志目录
mkdir -p /logs/mysql/mysql-bin

//打开配置文件
vim /etc/my.cnf

//添加配置
[mysqld]
log-bin=mysql-bin
server-id=147             
log_bin_index=master-bin.index
binlog-do-db=azk_exam
binlog_ignore_db=mysql
innodb_flush_log_at_trx_commit=1
sync_binlog=1

//重启mysql
systemctl restart mysqld.service

//登录mysql，配置账号用于从库复制
mysql> CREATE USER 'azk_slave_37'@'123.207.119.37' IDENTIFIED BY 'azk&slave$37';
mysql> GRANT REPLICATION SLAVE ON *.* TO 'azk_slave_37'@'123.207.119.37';

//命令
mysql> show master status\G; //查看主服务器状态
mysql> show processlist\G; //查看mysql I/O线程
```

#### 从配置(123.207.119.37)
```
//打开配置文件
vim /etc/my.cnf

//添加配置
[mysqld]
server-id=37
replicate-do-db=azk_exam
replicate-ignore-db=mysql
relay-log=relay-bin
relay-log-index=relay-bin.index
relay-log-info-file=relay-relay-log.info
skip_slave_start
read_only

//mysql配置复制的主机
mysql> CHANGE MASTER TO  MASTER_HOST='123.207.116.147', MASTER_USER='azk_slave', MASTER_PASSWORD='fmM6kUjAgZ25', MASTER_LOG_FILE='mysql-bin.000006', MASTER_LOG_POS=199819;


//命令
mysql> show slave status\G; //查看从库状态
mysql> start slave; //启动从服务器复制
mysql> stop slave; //停止从服务器复制

```