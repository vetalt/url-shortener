url-shortener
=============
trial project

requirements
------------
nginx, mysql, php

install
-------

1) run: php composer.phar install

2) create mysql database

3) edit ./protected/config/console.php and ./protected/config/main.php with mysql settings

4) run: ./protected/yiic migrate

5) edit ./protected/config/nginx.conf and use it as site config
