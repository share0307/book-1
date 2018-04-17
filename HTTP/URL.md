#### 标准URL组成

```
<scheme>://<user>:<password>@<host>:<port>/<path>;<params>?<query>#<frag>
```
- scheme: 协议
- user: 用户名
- password: 密码
- host: 域名 
- port: 端口号
- path: 资源路径
- params: 参数
- query: 查询
- frag: 定位

#### URL字符

```
//安全ASCII字符,直接使用
[0-9a-zA-Z] $-_.+!*’(),

//不安全ASCII字符,需要转码
+，空格，/，?，%，#，&，=， 

//非ASCII字符,都要转码
```

#### Base64

将所有字符转化为64个字符：小写字母a-z, 大写字母A-Z, 数字0-9, 符号"+", "/",  垫字符号"="

#### Base64 URL

用 "-","_" 替换标准Base64编码结果中的"+","/", 并删除结果最后的"=" 
```
function base64_URL_encode($data) {
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function base64_URL_decode($data) {
  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}
```


/usr/share/logstash/bin/system-install /etc/logstash/startup.options