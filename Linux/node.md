## nvm管理node和npm


#### 1. 复制nvm到本地
```
git clone https://github.com/creationix/nvm.git
```

#### 2. 执行脚本
```
source nvm/nvm.sh
```

#### 3. 测试nvm
```
nvm --help
```

#### 4.下载node[镜像服务]
```
NVM_NODEJS_ORG_MIRROR=https://npm.taobao.org/mirrors/node nvm install v6.9.1
```

#### 5. 查看nvm
```
nvm list
```