# 安装lnmp环境
服务器部署(centos系统)

如何查看linux系统的发行版本信息?
```
1.可以使用lsb_release命令来查看,没有这个命令的话可以安装。在centos可以通过yum -y install来安装lsb_release命令
LSB = Linux Standard Base(linux标准库)
> lsb_release -a
2.可以通过获取文件/etc/issue查看
> cat /etc/issue
3.查看linux操作系统信息
> uname -a
4.获取linux内核信息
> cat /proc/version
```

在安装之前确认先yum search xx看看有没有需要的版本工具，没有的话还要添加扩展源
http://blog.csdn.net/haitun312366/article/details/8511412
可以先配置安装源
查看源库
ls -l /etc/yum.repos.d

以下操作可能需要sudo权限

1.登录到部署机
> ssh root@ip -p port

2.安装mysql
centos6.5安装mysql:https://segmentfault.com/a/1190000007667534
先看看有没有安装mysql
grep -i意思是不区分大小写
> rpm -qa | grep -i mysql
> yum list installed | grep -i mysql
如果有需要可以移除某个mysql
> yum -y remove xxx

查看是否生成了mysqld服务, 并设置随机启动
> chkconfig --list |grep mysql 

查看占用端口，默认占用3306端口
> netstat -nutlp | grep mysql

执行如下命令进行重启，两种方法都可以:
> /etc/init.d/mysqld restart
> service mysqld restart

执行如下命令进行停止，两种方法都可以:
> /etc/init.d/mysqld stop   
> service mysqld stop


进入数据库修改用户密码
以安全方式启动mysql:
> /usr/bin/mysqld_safe --skip-grant-tables >/dev/null 2>&1 &
稍等5秒钟，然后执行以下语句：
> /usr/bin/mysql -u root mysql
出现“mysql>”提示符后进入MySQL命令行环境，输入：
> use mysql;
mysql> update user set password = Password(’123456’) where User = 'root';
回车后执行(刷新MySQL系统权限相关的表)：
mysql> grant all privileges on *.* to admin@localhost identified by '123456’;
mysql> flush privileges;
mysql> select user();
mysql> select current_user;

mysql> flush privileges;
再执行exit退出：

通过yum -y install mysql mysql-server mysql-devel安装的版本太低了不合适需要通过上面链接中说的安装

> ps aux | grep mysql
/usr/sbin/mysqld --basedir=/usr --datadir=/opt/zbox/tmp/mysql --plugin-dir=/usr/lib64/mysql/plugin --user=mysql --log-error=/var/log/mysqld.log --pid-file=/var/run/mysqld/mysqld.pid --socket=/opt/zbox/tmp/mysql/mysql.sock

3.安装php(php-fpm)
http://blog.csdn.net/zhaozuosui/article/details/48394409
先看看有没有安装php:
> yum list installed | grep -i php
如果有安装包可以先删除它们(如果需要删除的话)
> yum -y remove php*

源配置好了后看看有没有需要的安装包
> yum search php56

安装php5.6
> yum install --enablerepo=remi --enablerepo=remi-php56 php php-fpm php-devel php-opcache php-mbstring php-mcrypt php-mysqlnd php-pecl-xdebug php-phpunit-PHPUnit php-pecl-redis php-pdo php-cli php-pecl-apcu php-common php-xml php-pear php-pecl-amqp php-bcmath php-process php-gd

检查配置
> php-fpm -t
> php --ini

确保安装了必要的php模块
> php -m | grep -i openssl
> php -m | grep -i redis

4.安装nginx
> yum install nginx
> nginx -t

centos6.5环境
修改nginx配置文件后，重启报错：
nginx: [emerg] socket() [::]:80 failed (97: Address family not supported by protocol) 
解决办法：
vim /etc/nginx/conf.d/default.conf
将
listen       80 default_server;
listen       [::]:80 default_server;
改为：
listen       80;
#listen       [::]:80 default_server;

解析php的conf文件配置
server {
    listen       8887;
    server_name cms.loc;

    root /Users/dujunwen/project/github/cms/;

location / {
        try_files   $uri $uri/ /index.php?$query_string;
        index  index.html index.htm index.php;
    }

 location ~ "^(.+\.php)($|/)" {
        fastcgi_split_path_info ^(.+\.php)(.*)$;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param SCRIPT_NAME $fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
        fastcgi_pass   127.0.0.1:9000;
        include        fastcgi_params;
    }
}

default.conf配置文件:
server {
    listen       80;
    #listen       [::]:80 default_server;
    server_name  _;
    root         /usr/share/nginx/html;

    # Load configuration files for the default server block.
    include /etc/nginx/default.d/*.conf;


location / {
        try_files   $uri $uri/ /index.php?$query_string;
        index  index.html index.htm index.php;
    }

 location ~ "^(.+\.php)($|/)" {
        fastcgi_split_path_info ^(.+\.php)(.*)$;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param SCRIPT_NAME $fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
        fastcgi_pass   127.0.0.1:9000;
        include        fastcgi_params;
    }

    error_page 404 /404.html;
        location = /40x.html {
    }

    error_page 500 502 503 504 /50x.html;
        location = /50x.html {
    }
}

在/usr/share/nginx/html下新建文件index.php
放入内容:<?php phpinfo(); ?>

启动或重启nginx和php-fpm来测试:
在 CentOS 7 系统上:
1. $ sudo systemctl restart nginx
2. $ sudo systemctl restart php-fpm 
在 CentOS 6 系统上:
1. $ sudo service nginx restart
2. $ sudo service php-fpm restart 
> curl http://localhost/index.php
看看是否正常执行

5.安装redis
http://www.cnblogs.com/xsi640/p/3756130.html
自己下载编译指定版本的redis

6.配置文件位置
nginx -t和php-fpm -t可以检测各自的配置文件是否正确和安装位置
Mysql配置文件my.cnf路径：/etc/my.cnf 
Nginx配置文件nginx.conf路径：/etc/nginx/nginx.conf 
PHP配置文件php.ini路径： /etc/php.ini 
PHP默认扫描配置文件目录为 /etc/php.d/*.ini
php-fpm配置文件php-fpm.conf路径：/etc/php-fpm.conf

7.在配置完成后设置所有软件开机自启动
