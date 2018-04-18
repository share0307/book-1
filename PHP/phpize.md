```
a. 进入php源码包下的ext，进入扩展包文件
b. mv config0.m4 config.m4
c. /opt/www/php7/bin/phpize
d. ./configure --with-openssl --with-php-config=/opt/www/php7/bin/php-config
e. make && make install
f. php.ini 增加 extension=openssl.so
g. 重启php-fpm
```