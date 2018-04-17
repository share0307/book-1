## MySQL账号规划

```
root	超级管理员
ping_admin	管理员
ping_project	项目运行
ping_slave	从库连接
ping_public	公开
```

#### 创建数据库

```
CREATE DATABASE db_main DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
```

#### ping_admin

```
CREATE USER 'ping_admin'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON db_main.* TO 'ping_admin'@'localhost' WITH GRANT OPTION;
```

#### ping_project
```
CREATE USER 'ping_project'@'localhost' IDENTIFIED BY 'password';
GRANT SELECT, INSERT, UPDATE, DELETE, ALTER, CREATE ON db_main.* TO 'ping_project'@'localhost';
```

#### ping_slave
```
CREATE USER 'ping_slave'@'slave_ip' IDENTIFIED BY 'password';
GRANT REPLICATION SLAVE ON *.* TO 'ping_slave'@'slave_ip';
```

#### ping_public
```
CREATE USER 'ping_public'@'%' IDENTIFIED BY 'password';
GRANT SELECT ON db_main.* TO 'ping_public'@'%';
```

#### 刷新权限
```
flush privileges;
```
mysqli.default_socket = /var/lib/mysql/mysql.sock

