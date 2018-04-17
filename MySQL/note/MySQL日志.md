#### 日志分类
- Error log
- General query log
- Binary log
- Relay log
- Slow query log
- DDL log

#### 日志通用配置
``` 
log_output='TABLE,FILE'
log_timestamps=SYSTEM 
```
> ```log_output```日志记录方式，可选值为```TABLE',  'FILE', 'TABLE,FILE'```。  

> ```log_timestamps```日志日期格式，可选值为```UTC, SYSTEM```

#### Error log
```
log_error=/exdata1/logs/mysql/mysqld.log
log_error_verbosity=3
```
> ```log_error_verbosity```日志等级，可选值为```1, 2, 3```。```1="error"  2="error, warn"  3="error, warn, note"```


#### General query log
```
general_log=ON
general_log_file=/exdata1/logs/mysql/mysql-general.log
```
> ```general_log```可选值为```ON|1, OFF|0```。并且可以使用```mysql> SET GLOBAL general_log = 'ON'```的方式设置

#### Slow query log
```
slow_query_log=ON
slow_query_log_file=/exdata1/logs/mysql/mysql-slow.log
long_query_time=1
log_queries_not_using_indexes=ON
log_throttle_queries_not_using_indexes=1
log_slow_admin_statements=ON
#min_examined_row_limit=100000
```
> ```long_query_time```查询速度小于这个值则记录慢日志，单位是秒，取值范围```0~10```。    

> ```log_throttle_queries_not_using_indexes```     

> ```log_slow_admin_statements```是否记录如```ALTER TABLE```这样的语句慢日志      

> ```min_examined_row_limit```查询扫描记录数大于这个值则记录慢日志，单位是条，取值范围```0~4294967295```    

#### DDL log
```
todo
```

#### Binary log
```
见数据库主从配置
```

#### Relay log
```
见数据库主从配置
```


