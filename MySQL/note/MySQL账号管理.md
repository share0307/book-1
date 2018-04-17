#### 简言



#### 创建账户






#### 账户规划
```
root: 超级管理员，所有权限
xxx_admin: 管理员，除了user table之外的权限
xxx_project:  项目运行，仅有项目库权限。
xxx_slave:  用于从库复制，仅有复制权限
xxx_public: 对外公开用户，仅有查询权限


```

#### 示例
```
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
```