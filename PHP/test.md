## php安装

#### 1. 环境准备
```
yum -y update
yum -y groupinstall "Development tools"
yum -y install php-gd
yum -y install freetype*
yum -y install gd
yum -y install gd-devel
yum -y install libmcrypt
yum -y install libmcrypt-devel
yum -y install freetype
yum -y install freetype-devel
yum -y install libtool-ltdl
yum -y install libtool-ltdl-devel
yum -y install libjpeg-devel
yum -y install libpng-devel
yum -y install libmcrypt
yum -y install libmcrypt-devel
yum -y install libxml2
yum -y install libxml2-devel
yum -y install curl-devel
yum -y install systemd-devel
yum -y install mysql-server mysql mysql-devel
yum -y install bzip2-devel
yum -y install db4-devel
yum -y install libdb-dev
yum -y install curl-devel
yum -y install db4-devel
yum -y install libXpm-devel
yum -y install gmp-devel
yum -y install libc-client-devel
yum -y install openldap-devel
yum -y install unixODBC-devel
yum -y install postgresql-devel
yum -y install sqlite-devel
yum -y install aspell-devel
yum -y install net-snmp-devel
yum -y install libxslt-devel
yum -y install pcre-devel
yum -y install pspell-devel
yum -y install net-snmp-devel
yum -y install libxslt-devel
yum -y install libedit-devel
yum -y install libtidy-devel
yum -y install readline-devel
```

#### 2. 下载安装包并解压
```
wget http://jp2.php.net/distributions/php-7.2.0.tar.gz
tar -xvf php-7.2.0.tar.gz
cd php-7.2.0
```

#### 3. 编译安装
```
./configure \
--prefix=/opt/www/php7.2.0 \
--with-config-file-path=/opt/www/php7.2.0/etc \
--with-fpm-user=nginx \
--with-fpm-group=nginx \
--enable-pcntl \
--enable-fpm \
--enable-bcmath \
--enable-sysvmsg \
--enable-sysvsem \
--enable-sysvshm \
--enable-soap \
--enable-opcache \
--enable-mysqlnd \
--enable-exif \
--enable-sockets \
--enable-mbstring \
--enable-zip \
--enable-bz2 \
--disable-ipv6 \
--disable-cgi \
--with-gd \
--with-freetype-dir \
--with-jpeg-dir \
--with-png-dir \
--with-openssl \
--with-zlib \
--with-mhash \
--with-curl \
--with-mysqli=mysqlnd \
--with-pdo-mysql=mysqlnd

make && make install
```

#### 4. 配置
```
cp /opt/www/php7.2.0/etc/php-fpm.conf.default /opt/www/php7.2.0/etc/php-fpm.conf
cp /opt/www/php7.2.0/etc/php-fpm.d/www.conf.default /opt/www/php7.2.0/etc/php-fpm.d/www.conf
cp php.ini-production /opt/www/php7.2.0/etc/php.ini

sed -i 's/9000/'9720'/g' /opt/www/php7.2.0/etc/php-fpm.d/www.conf
sed -i 's/;.*/''/g' /opt/www/php7.2.0/etc/php-fpm.conf
sed  -i '/^$/d' /opt/www/php7.2.0/etc/php-fpm.conf
sed -i 's/;.*/''/g' /opt/www/php7.2.0/etc/php-fpm.d/www.conf
sed  -i '/^$/d' /opt/www/php7.2.0/etc/php-fpm.d/www.conf
sed -i 's/;.*/''/g' /opt/www/php7.2.0/etc/php.ini
sed  -i '/^$/d' /opt/www/php7.2.0/etc/php.ini

cp sapi/fpm/init.d.php-fpm /etc/init.d/php-fpm-7.2.0
chmod u+x /etc/init.d/php-fpm-7.2.0
/etc/init.d/php-fpm-7.2.0 start

```

#### 5. 加入系统启动项
```
chkconfig php-fpm on
```


#### 6. 启动服务
```
chmod u+x /etc/init.d/php7.2.0-fpm
#centos6
service php7.2.0-fpm start
#centos7
service php7.2.0-fpm start
systemctl restart  php-fpm.service
```




## 备注

#### phpize 方式安装扩展
```
a. 进入php源码包下的ext，进入扩展包文件
b. mv config0.m4 config.m4
c. /opt/www/php7/bin/phpize
d. ./configure --with-openssl --with-php-config=/opt/www/php7/bin/php-config
e. make && make install
f. php.ini 增加 extension=openssl.so
g. 重启php-fpm
```

#### pecl
```
pecl install {package}
```

#### 查找端口的进程
```
lsof -i:9000
kill -9 xxxx
```

#### 查看程序对应进程号：
```
ps –ef|grep 进程名
netstat –nltp|grep 进程号
```

#### 参数说明
```
a. 用 -c 参数指定要加载的php.ini , -y参数指定php-fpm.conf,启用不同的监听端口
```


## 附录
#### php-fpm.conf
```
[www]
user = php-fpm
group = php
listen = 127.0.0.1:9000
pm = dynamic
pm.max_children = 5
pm.start_servers = 2
pm.min_spare_servers = 1
pm.max_spare_servers = 3
```

#### php-fpm
```
#! /bin/sh
prefix=/opt/www/php7
exec_prefix=${prefix}

php_fpm_BIN=${exec_prefix}/sbin/php-fpm
php_fpm_CONF=${prefix}/etc/php-fpm.conf
php_fpm_PID=${prefix}/var/run/php-fpm.pid

php_opts="--fpm-config $php_fpm_CONF --pid $php_fpm_PID"

wait_for_pid () {
	try=0
	while test $try -lt 35 ; do
		case "$1" in
			'created')
			if [ -f "$2" ] ; then
				try=''
				break
			fi
			;;

			'removed')
			if [ ! -f "$2" ] ; then
				try=''
				break
			fi
			;;
		esac

		echo -n .
		try=`expr $try + 1`
		sleep 1

	done
}

case "$1" in
	start)
		echo -n "Starting php-fpm "

		$php_fpm_BIN --daemonize $php_opts

		if [ "$?" != 0 ] ; then
			echo " failed"
			exit 1
		fi

		wait_for_pid created $php_fpm_PID

		if [ -n "$try" ] ; then
			echo " failed"
			exit 1
		else
			echo " done"
		fi
	;;

	stop)
		echo -n "Gracefully shutting down php-fpm "

		if [ ! -r $php_fpm_PID ] ; then
			echo "warning, no pid file found - php-fpm is not running ?"
			exit 1
		fi

		kill -QUIT `cat $php_fpm_PID`

		wait_for_pid removed $php_fpm_PID

		if [ -n "$try" ] ; then
			echo " failed. Use force-quit"
			exit 1
		else
			echo " done"
		fi
	;;

	status)
		if [ ! -r $php_fpm_PID ] ; then
			echo "php-fpm is stopped"
			exit 0
		fi

		PID=`cat $php_fpm_PID`
		if ps -p $PID | grep -q $PID; then
			echo "php-fpm (pid $PID) is running..."
		else
			echo "php-fpm dead but pid file exists"
		fi
	;;

	force-quit)
		echo -n "Terminating php-fpm "

		if [ ! -r $php_fpm_PID ] ; then
			echo "warning, no pid file found - php-fpm is not running ?"
			exit 1
		fi

		kill -TERM `cat $php_fpm_PID`

		wait_for_pid removed $php_fpm_PID

		if [ -n "$try" ] ; then
			echo " failed"
			exit 1
		else
			echo " done"
		fi
	;;

	restart)
		$0 stop
		$0 start
	;;

	reload)

		echo -n "Reload service php-fpm "

		if [ ! -r $php_fpm_PID ] ; then
			echo "warning, no pid file found - php-fpm is not running ?"
			exit 1
		fi

		kill -USR2 `cat $php_fpm_PID`

		echo " done"
	;;

	configtest)
		$php_fpm_BIN -t
	;;

	*)
		echo "Usage: $0 {start|stop|force-quit|restart|reload|status|configtest}"
		exit 1
	;;

esac

```

#### php.ini
```
[PHP]
engine = On
short_open_tag = Off
precision = 14
output_buffering = 4096
zlib.output_compression = Off
implicit_flush = Off
unserialize_callback_func =
serialize_precision = 17
disable_functions =
disable_classes =
zend.enable_gc = On
expose_php = On
max_execution_time = 30
max_input_time = 60
memory_limit = 128M
error_reporting = E_ALL & ~E_DEPRECATED & ~E_STRICT
display_errors = Off
display_startup_errors = Off
log_errors = On
log_errors_max_len = 1024
ignore_repeated_errors = Off
ignore_repeated_source = Off
report_memleaks = On
track_errors = Off
html_errors = On
variables_order = "GPCS"
request_order = "GP"
register_argc_argv = Off
auto_globals_jit = On
post_max_size = 8M
auto_prepend_file =
auto_append_file =
default_mimetype = "text/html"
default_charset = "UTF-8"
doc_root =
user_dir =
enable_dl = Off
file_uploads = On
upload_max_filesize = 2M
max_file_uploads = 20
allow_url_fopen = On
allow_url_include = Off
default_socket_timeout = 60

[CLI Server]
cli_server.color = On

[Date]

[filter]

[iconv]

[intl]

[sqlite3]

[Pcre]

[Pdo]

[Pdo_mysql]
pdo_mysql.cache_size = 2000
pdo_mysql.default_socket=

[Phar]

[mail function]
SMTP = localhost
smtp_port = 25
mail.add_x_header = On

[SQL]
sql.safe_mode = Off

[ODBC]
odbc.allow_persistent = On
odbc.check_persistent = On
odbc.max_persistent = -1
odbc.max_links = -1
odbc.defaultlrl = 4096
odbc.defaultbinmode = 1

[Interbase]
ibase.allow_persistent = 1
ibase.max_persistent = -1
ibase.max_links = -1
ibase.timestampformat = "%Y-%m-%d %H:%M:%S"
ibase.dateformat = "%Y-%m-%d"
ibase.timeformat = "%H:%M:%S"

[MySQLi]
mysqli.max_persistent = -1
mysqli.allow_persistent = On
mysqli.max_links = -1
mysqli.cache_size = 2000
mysqli.default_port = 3306
mysqli.default_socket =
mysqli.default_host =
mysqli.default_user =
mysqli.default_pw =
mysqli.reconnect = Off

[mysqlnd]
mysqlnd.collect_statistics = On
mysqlnd.collect_memory_statistics = Off

[OCI8]

[PostgreSQL]
pgsql.allow_persistent = On
pgsql.auto_reset_persistent = Off
pgsql.max_persistent = -1
pgsql.max_links = -1
pgsql.ignore_notice = 0
pgsql.log_notice = 0

[bcmath]
bcmath.scale = 0

[browscap]

[Session]
session.save_handler = files
session.use_strict_mode = 0
session.use_cookies = 1
session.use_only_cookies = 1
session.name = PHPSESSID
session.auto_start = 0
session.cookie_lifetime = 0
session.cookie_path = /
session.cookie_domain =
session.cookie_httponly =
session.serialize_handler = php
session.gc_probability = 1
session.gc_divisor = 1000
session.gc_maxlifetime = 1440
session.referer_check =
session.cache_limiter = nocache
session.cache_expire = 180
session.use_trans_sid = 0
session.hash_function = 0
session.hash_bits_per_character = 5
url_rewriter.tags = "a=href,area=href,frame=src,input=src,form=fakeentry"

[Assertion]
zend.assertions = -1

[COM]

[mbstring]

[gd]

[exif]

[Tidy]
tidy.clean_output = Off

[soap]
soap.wsdl_cache_enabled=1
soap.wsdl_cache_dir="/tmp"
soap.wsdl_cache_ttl=86400
soap.wsdl_cache_limit = 5

[sysvshm]

[ldap]
ldap.max_links = -1

[mcrypt]

[dba]

[opcache]

[curl]

[openssl]

```
