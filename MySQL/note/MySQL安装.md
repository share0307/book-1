#### 安装

```
wget http://dev.mysql.com/get/mysql57-community-release-el7-7.noarch.rpm
yum -y localinstall mysql57-community-release-el7-7.noarch.rpm
yum -y install mysql-community-server
```

#### 字符集编码配置

```
[client]
default-character-set=utf8
[mysqld]
character-set-server=utf8
collation-server=utf8_general_ci
```

#### 查看字符集

```
SHOW VARIABLES LIKE 'character_set_%';
```

#### 启动mysql

```
systemctl start mysqld.service
```

#### 跳过密码配置

```
vim /etc/my.cnf
//跳过密码
skip-grant-tables 
skip-networking
//降低密码复杂度配置
#validate_password_policy=LOW
//重启
systemctl restart mysqld.service
```

#### 重设root密码

```
update mysql.user set authentication_string=PASSWORD('passwd') where user='root' and host='localhost';
flush privileges;
```

#### 注释跳过密码，降低密码复杂度

```
vim /etc/my.cnf
//跳过密码
#skip-grant-tables 
#skip-networking
//降低密码复杂度配置
validate_password_policy=LOW
//重启
systemctl restart mysqld.service
//多实例启动
systemctl start mysqld@p3306
systemctl start mysqld@p3308
```

#### 登录重设密码

```
mysql -uroot -p 
passwd
ALTER USER 'root'@'localhost' IDENTIFIED BY 'newPasswd';
```

#### 增加用户

```
CREATE USER 'username'@'localhost' IDENTIFIED BY 'newPasswd';
```

#### 用户管理

```
//账户规划
root: 超级管理员，所有权限
azk_admin: 管理员，管理数据库权限
azk_project:  项目运行，项目运行所需权限
azk_slave:  用于复制，仅有复制权限
azk_public: 对外公开用户，仅有查询权限
//创建用户
mysql> CREATE USER 'finley'@'%' IDENTIFIED BY 'some_pass';
//设置权限
mysql> GRANT ALL PRIVILEGES ON *.* TO 'finley'@'localhost' WITH GRANT OPTION;
mysql> GRANT ALL PRIVILEGES ON *.* TO 'finley'@'%' WITH GRANT OPTION;
mysql> GRANT RELOAD,PROCESS ON *.* TO 'admin'@'localhost';
mysql> GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP ON bankaccount.* TO 'custom'@'localhost';
mysql> GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP ON expenses.* TO 'custom'@'host47.example.com';
mysql> GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP ON customer.* TO 'custom'@'%.example.com';
//刷新权限
//查看权限
mysql> SHOW GRANTS FOR 'admin'@'localhost';
mysql> SHOW GRANTS
mysql> SHOW CREATE USER 'admin'@'localhost'\G
//修改用户名，密码
ALTER USER 'jeffrey'@'localhost' IDENTIFIED BY 'mypass';
ALTER USER USER() IDENTIFIED BY 'mypass';
//删除用户
DROP USER 'jeffrey'@'localhost';
//设置资源权限
```

#### tmp

```
grant all privileges on *.* to jack@'localhost' identified by "jack" with grant option;
flush privileges;
show grants;
show grants for 'jack'@'%';
show grants for 'azk_master'@'localhost';
show grants for 'azk_master'@'123.207.116.147';
grant all privileges on *.* to azk_master@'123.207.116.147' identified by "db@azk[master]&1919$"
grant all privileges on *.* to azk_master@'localhost' identified by "db@azk[master]&1919$"
```