## 目录
- 起源
- 会话机制
- session
    - session管理
    - cookie设置
    - 扩展session管理
    
## 起源
```
todo
```

## 会话机制
```
todo
```

## session管理

### 配置
```
//
session.save_path  //session存储路径
session.name       //session名称，就是常在cookie中看到的"PHPSESSID"。作为key,value通常是sid
session.save_handler //session存储驱动，可以设置为files,mysql,memache,reis 
session.serialize_handler  //session序列化驱动
session.auto_start   //自动开始session
session.referer_check //客户端来源限制

//session数据垃圾回收相关
//执行垃圾回收的概率设置是probability/divisor。如果probability=0,等同于关闭垃圾回收
session.gc_probability 
session.gc_divisor 
session.gc_maxlifetime  //数据生存时间，执行垃圾回收的时候清除超过生存时间的数据

//cookie设置相关
session.use_strict_mode //
session.use_cookies  //是否使用cookie存储sid
session.use_only_cookies  //是否只允许使用cookie存储sid
session.cookie_lifetime //cookie生存时间
session.cookie_path    //cookie存储路径
session.cookie_domain  //cookie限制域名
session.cookie_secure //
session.cookie_httponly //

//

//session数据缓存相关
session.cache_limiter
session.cache_expire

session.use_trans_sid
session.trans_sid_tags
session.trans_sid_hosts
session.sid_length
session.sid_bits_per_character

session.upload_progress.enabled
session.upload_progress.cleanup
session.upload_progress.prefix
session.upload_progress.name
session.upload_progress.freq
session.upload_progress.min_freq

session.lazy_write
url_rewriter.tags

session.hash_function
session.hash_bits_per_character

session.entropy_file
session.entropy_length

session.bug_compat_42
session.bug_compat_warn
```

### 函数
```
session_abort
session_cache_expire
session_cache_limiter
session_commit
session_create_id
session_decode
session_destroy
session_encode
session_gc
session_get_cookie_params
session_id
session_is_registered
session_module_name
session_name
session_regenerate_id
session_register_shutdown
session_register
session_reset
session_save_path
session_set_cookie_params
session_set_save_handler
session_start
session_status
session_unregister
session_unset
session_write_close
```

### SessionHandler类
```
SessionHandler class
```

### SessionHandlerInterface接口
```
SessionHandlerInterface
```

### SessionIdInterface接口
```
SessionIdInterface
```

### SessionUpdateTimestampHandlerInterface 接口
```
SessionUpdateTimestampHandlerInterface
```


