## 
```
* * * * *
minute hour day month week command

point: ,
period: -
interval: /

//every minute
* * * * * command

//every hour three minute, five minute
3,15 * * * * command

//
3,15 8-10 * * * command

//
3,15 8-10 */2 ** command

//

0 * * * * nginx /opt/www/php7.1.5/bin/php  /srv/github/ping-voc/mecha/Cron.php >> /srv/github/cron.log 2>&1
```
