## shadowsocks服务搭建

### centos 7

#### 1. 安装
```
yum -y update
yum -y install python-setuptools && easy_install pip
pip install shadowsocks
```

#### 2. 配置文件
```
vim /etc/shadowsocks.json
{
	"server":"xxx.xxx.xxx.xxx",
	"server_port":xxxx,
	"password":"xxxx",
	"timeout":300,
	"method":"aes-256-cfb",
	"fast_open":false,
	"workers": 1
}
```

#### 3. 开放端口
```
firewall-cmd --query-port=8888/tcp
firewall-cmd --add-port=8888/tcp
```

#### 4. 启用服务
```
nohup ssserver -c /etc/shadowsocks.json start &
```

#### 5.客户端配置
```
{
  "server":"xxxx.xxxx.xxxx.xxxx",
  "server_port":xxxx,
  "local_address": "127.0.0.1",
  "local_port":1080,
  "password":"xxxx",
  "timeout":300,
  "method":"aes-256-cfb",
  "fast_open": false,      
  "workers": 1  
}
```

#### 6.客户端启动
```
nohup sslocal -c /etc/shadowsocks.json start &
```
