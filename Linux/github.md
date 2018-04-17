#### 创建git用户
```
参见linux用户管理篇
```

#### 初始化git仓库
```
git init --bare azk-exam.git
```

#### 设置文件权限
```
chmod 700 ~/.ssh
chmod 600 ~/.ssh/authorized_keys
```

 #### 公钥写入或追加到authorized_keys
```
echo 'ssh_key' > ~/.ssh/authorized_keys
echo 'ssh_key' >> ~/.ssh/authorized_keys
```
#### 拉取项目
```
git clone git@123.207.116.147:/srv/github/azk-exam.git
```


echo 'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQDfBhaniv5mQY/6LMRhkljzAxGFSxkmWi6WJkXm+9Hq+GDU50VWlSvCZFVSz/wkZNBXgVjJXDnuJBh/XlGRtcL4FVbpl9DN8pn6AR7QjyIBL1v0i6CWAk9m3o1gUjwlf0lYa/zBh6egB4DRXexLVW5uinNAL/j7Oiu8MlPIoscHAiFcKXFya+CuKS/BSfoGXSuaUt9Zi0vvQKdMB5pgtROTpn8zyVCZlsaMfQCUy+wY+Uz8SSDPA5k0O1D/Hqw//sfV/VQPRA5wpFR4nYggPdLKYjADhE7FjbxHXKp/BVIqG88A2x7crYwraQbNEBWfm+r3/UR7pxZ8VC8YC4ZY3Dgr nginx@aliyun
' > ~/.ssh/authorized_keys