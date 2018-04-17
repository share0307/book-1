## 安装
```
wget http://download.redis.io/releases/redis-4.0.9.tar.gz
tar -zxvf redis-4.0.9.tar.gz
cd redis-4.0.9
make && make install
cp src/redis-cli src/redis-server /usr/bin
cp redis.conf /etc
```

## 配置
```
sed -i 's/#.*/''/g' /etc/redis.conf
sed  -i '/^$/d' /etc/redis.conf

daemonize yes
```

## 运行
```
/usr/local/bin/redis-server /etc/redis.conf
```