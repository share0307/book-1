update mysql.user set authentication_string=PASSWORD('k7$M_d&pvW%O') where user='root' and host='localhost';
flush privileges;

ALTER USER 'root'@'localhost' IDENTIFIED BY 'k7$M_d&pvW%O';

CREATE USER 'azk_project'@'localhost' IDENTIFIED BY 'k$7M_d&pvW%O';
GRANT ALL PRIVILEGES ON *.* TO 'azk_project'@'localhost' WITH GRANT OPTION;

CREATE DATABASE azk_exam DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

sed -i 's/;.*/''/g' /etc/php.ini
sed  -i '/^$/d' /etc/php.ini

sed -i 's/;.*/''/g' /usr/local/php/etc/php-fpm.conf
sed  -i '/^$/d' /usr/local/php/etc/php-fpm.conf

sed -i 's/;.*/''/g' /usr/local/php/etc/php-fpm.d/www.conf
sed  -i '/^$/d' /usr/local/php/etc/php-fpm.d/www.conf

cp sapi/fpm/init.d.php-fpm /etc/init.d/php-fpm-7.1.5
chmod u+x /etc/init.d/php-fpm-7.1.5

openssl dhparam -dsaparam -out /etc/ssl/certs/dhparam.pem 4096