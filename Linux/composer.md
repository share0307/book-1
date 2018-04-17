## composer

#### 下载
```
wget https://getcomposer.org/composer.phar
```
#### 安装
```
cp composer.phar /usr/bin/composer
chmod u+x /usr/bin/composer
```
#### 国内镜像
```
composer config -g repo.packagist composer https://packagist.phpcomposer.com
```

#### 权限问题
```
chmod 777 /usr/bin/composer
```

#### 测试
```
comopser --help
```

#### issue
```
composer依赖php，系统/usr/bin需要有php
```