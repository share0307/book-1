- pwd
- netstat
- nohup
- screen
- ps
- top
- mkdir
- rm 
- wget
- scp
- tar


## hostnamectl
```
//域名-国名
hostnamectl set-hostname localhost-china
hostnamectl set-hostname localhost-japan
hostnamectl set-hostname localhost-korean
hostnamectl set-hostname localhost-veitnam
//重启
init 6
```

## fdisk
```
/查看设备分区
fdisk -l 
//进入分区模式
fdisk /dev/vdb
m: 查看命令介绍
d: 删除分区
n: 新增分区
    p: 主要分区
        +100G: 分配大小
wq: 写入离开
//磁盘格式化
mkfs -t ext3 /dev/vdb1
mkfs -t ext3 /dev/vdb2
//挂载
mkdir /exdata1
mount /dev/vdb1 /exdata1
mkdir /exdata2
mount /dev/vdb2 /exdata2
//查看
df -h
```

## useradd
```
groupadd -g 1942 www
groupadd -g 1943 php
groupadd -g 1944 nginx
groupadd -g 1945 git

useradd -u 1943 -g php php
useradd -u 1944 -g nginx nginx
useradd -u 1945 -g git git 

usermod -G php,www php
usermod -G nginx,www nginx
usermod -G git,www git

groupadd -g 2020 zcp
useradd -u 2021 -g zcp zcp

```

## visudo
```
//创建sudo组
groupadd -g 2020 sudo
visudo
%sudo   ALL=(ALL)       NOPASSWD:ALL

//创建用户,添加到sudo组
useradd -u 3030 -g www zcp
usermod -a -G sudo nginx

//加入ssh-auth
echo "ssh_key" > ~/.ssh/authorized_keys
```

## firewall-cmd
```
//查询
firewall-cmd --query-port=80/tcp
//开启
firewall-cmd --add-port=80/tcp
```

## mkdir
```
mkdir -vp /exdata1/resources/{images/,audios/,videos/,documents/}  /exdata1/logs/{nginx/,mysql/,php/} /exdata1/backups/mysql
chown -R nginx:www /exdata1
chown -R nginx:www /exdata2
chmod -R 770 /exdata1
chmod -R 770 /exdata2

mkdir -vp scf/{lib/,bin/,doc/{info,product},logs/{info,product},service/deploy/{info,product}}
```

## scp
```
scp -r root@47.89.19.192:/srv/www/laravel5.5.tar.gz /srv/www
scp -r nginx@47.89.19.192:/exdata1/wiki.xml.bz2 ./
```

## wget
```
//普通下载
wget url

//后台下载
wget -b url

//断点续下
wget -c url

//批量下载
wget -i url.txt

//url.txt
url1
url2
```

## tar
```
//.xz
tar xvf FileName.tar.xz
tar cvf FileName.tar DirName

//.tar
tar xvf FileName.tar
tar cvf FileName.tar DirName

//.gz
gunzip FileName.gz
gzip -d FileName.gz
gzip FileName

//tar.gz .tgz
tar zxvf FileName.tar.gz
tar zcvf FileName.tar.gz DirName

//.bz2
bzip2 -d FileName.bz2
bunzip2 FileName.bz2
bzip2 -z FileName

//.tar.bz2
tar jxvf FileName.tar.bz2      
tar --bzip xvf FileName.tar.bz2
tar jcvf FileName.tar.bz2 DirName

//.bz
bzip2 -d FileName.bz
bunzip2 FileName.bz

//.tar.bz
tar jxvf FileName.tar.bz

//.Z
uncompress FileName.Z
compress FileName

//.tar.Z
tar Zxvf FileName.tar.Z
tar Zcvf FileName.tar.Z DirName

//.zip
unzip FileName.zip
zip FileName.zip DirName
zip -r FileName.zip DirName

//.rar
rar x FileName.rar
rar a FileName.rar DirName
```

#### nohup
```
nohup /opt/www/nginx/sbin/nginx >/dev/null 2>&1 &
```