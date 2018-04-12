## firewall
```
//查询
firewall-cmd --query-port=80/tcp
//开启
firewall-cmd --add-port=80/tcp
```

## 开启常见端口
```
firewall-cmd --add-port=80/tcp
firewall-cmd --add-port=3306/tcp
firewall-cmd --add-port=443/tcp
firewall-cmd --add-port=6379/tcp
```