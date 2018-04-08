### 依赖安装

```
yum -y install perl gcc make kernel-headers kernel-devel 
```

### vm-tools 安装

##### 虚拟机>设置>CD/DVD

```
1. 使用ISO映像文件： C:\Program Files (x86)\VMware\VMware Workstation\linux.iso
2. 勾选已连接
```

> linux.iso文件在VMware安装目录下找。

##### 挂载CD, 复制VMwareTools, 执行vmware-install.pl

```
mount /dev/cdrom /mnt
cp /mnt/VMwareTools-10.1.6-5214329.tar.gz ~/
cd ~
tar zxvf VMwareTools-10.1.6-5214329.tar.gz
cd vmware-tools-distrib/
./vmware-install.pl
```

##### 成功提示

```
//...一直回车直至出现一下信息代表安装完毕
To enable advanced X features (e.g., guest resolution fit, drag and drop, and 
file and text copy/paste), you will need to do one (or more) of the following:
1. Manually start /usr/bin/vmware-user
2. Log out and log back into your desktop session
3. Restart your X session.

Enjoy,

--the VMware team
```

### 取消mnt挂载

```
umount /mnt
```

### 配置共享目录

##### 虚拟机>设置>选项>共享文件夹

```
1. 选择：总是启用
2. 添加目录即可
```

##### 查看

```
cd /mnt/hgfs
ls
```

> 设置成功的化，可以看到共享的文件夹