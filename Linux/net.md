## centos7 网络配置

#### 查看网络接口设备
```
ip a
```
#### 编辑配置文件
```
 vi /etc/sysconfig/network-scripts/ifcfg-enp0s3
```

#### 动态ip配置
```
TYPE=Ethernet
BOOTPROTO=dhcp
DEFROUTE=yes
PEERDNS=yes
PEERROUTES=yes
IPV4_FAILURE_FATAL=no
IPV6INIT=yes
IPV6_AUTOCONF=yes
IPV6_DEFROUTE=yes
IPV6_PEERDNS=yes
IPV6_PEERROUTES=yes
IPV6_FAILURE_FATAL=no
IPV6_ADDR_GEN_MODE=stable-privacy
NAME=enp3s0
UUID=40bb33ad-9e4b-4f9b-a7d0-6a534666b054
DEVICE=enp3s0
ONBOOT=yes
```

#### 静态ip配置
```
TYPE=Ethernet
BOOTPROTO=static
DEFROUTE=yes
PEERDNS=yes
PEERROUTES=yes
IPV4_FAILURE_FATAL=no
IPV6INIT=yes
IPV6_AUTOCONF=yes
IPV6_DEFROUTE=yes
IPV6_PEERDNS=yes
IPV6_PEERROUTES=yes
IPV6_FAILURE_FATAL=no
IPV6_ADDR_GEN_MODE=stable-privacy
NAME=enp3s0
UUID=40bb33ad-9e4b-4f9b-a7d0-6a534666b054
DEVICE=enp3s0
ONBOOT=yes
IPADDR="10.10.10.13"
NETMAST="255.255.255.0"
GATEWAY="10.10.10.1"
DNS1="202.88.131.90"
DNS2="202.88.131.89"
```

#### 重启网络
```
service network start
```
