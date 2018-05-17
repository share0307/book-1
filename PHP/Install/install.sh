#!/bin/bash
php_version=$1
php_port=$2
home_dir=$3


cd ${home_dir}
wget http://cn2.php.net/distributions/php-${php_version}.tar.gz
tar -xvf php-${php_version}.tar.gz
cd php-${php_version}

./configure \
--prefix=/opt/www/php${php_version} \
--with-config-file-path=/opt/www/php${php_version}/etc \
--with-fpm-user=nginx \
--with-fpm-group=nginx \
--enable-bcmath \
--enable-calendar \
--enable-exif \
--enable-ftp \
--enable-mbstring \
--enable-opcache \
--enable-pcntl \
--enable-shmop \
--enable-sockets \
--enable-sysvmsg \
--enable-sysvsem \
--enable-sysvshm \
--enable-wddx \
--enable-fpm \
--enable-mysqlnd \
--with-gd \
--with-freetype-dir \
--with-jpeg-dir \
--with-png-dir \
--with-openssl \
--with-zlib \
--with-curl \
--with-mysqli=mysqlnd \
--with-pdo-mysql=mysqlnd \
--with-gettext \
--with-libxml-dir \
--with-pcre-regex \
--with-readline \
--with-bz2 \
--with-xsl

make && make install

cp /opt/www/php${php_version}/etc/php-fpm.conf.default /opt/www/php${php_version}/etc/php-fpm.conf
cp /opt/www/php${php_version}/etc/php-fpm.d/www.conf.default /opt/www/php${php_version}/etc/php-fpm.d/www.conf
cp php.ini-production /opt/www/php${php_version}/etc/php.ini

sed -i 's/9000/'${php_port}'/g' /opt/www/php${php_version}/etc/php-fpm.d/www.conf
sed -i 's/;.*/''/g' /opt/www/php${php_version}/etc/php-fpm.conf
sed  -i '/^$/d' /opt/www/php${php_version}/etc/php-fpm.conf
sed -i 's/;.*/''/g' /opt/www/php${php_version}/etc/php-fpm.d/www.conf
sed  -i '/^$/d' /opt/www/php${php_version}/etc/php-fpm.d/www.conf
sed -i 's/;.*/''/g' /opt/www/php${php_version}/etc/php.ini
sed  -i '/^$/d' /opt/www/php${php_version}/etc/php.ini

cp sapi/fpm/init.d.php-fpm /etc/init.d/php-fpm-${php_version}
chmod u+x /etc/init.d/php-fpm-${php_version}