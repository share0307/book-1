####  设置
```
//client
shell> mysql_config_editor set --login-path=client --host=localhost --user=root --password
shell> mysql

//admin@3308
shelll> mysql_config_editor set --login-path=admin@3308 --user=admin --host=localhost --port=3308 --socket=/var/lib/mysql-port3308/mysql.sock --password
shell> mysql --login-path=admin@3308
```

#### 重置
```
mysql_config_editor reset --login-path=admin@3308 --port=3306
```

#### 查看
```
mysql_config_editor print --all
```

#### 删除
```
//删除某个(用户)参数
mysql_config_editor remove --login-path=admin@3308 --user
//删除
mysql_config_editor remove --login-path=admin@3308
```

#### 帮助
```
mysql_config_editor --help
```