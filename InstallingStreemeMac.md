# Introduction #

This is the Mac/OSX install guide - if you're looking for other platform installation guides, please go back to the [start page of the installation](InstallingStreemeStartPage.md)

Streeme requires the initial installation of a MAMP (Mac Apache MySQL PHP) web server package before the script can operate. Snow Leopard (OSX 6) has a built in Apache and PHP install, which is probably the easiest to get running - Mac Users, please contribute better ways to the project's team members, I'm still a bit fresh to OSX, but I was able to get a working environment using the plan below. One of my little worries about this is that it is controlled by apple, so future OSX major upgrades may mess with it

## Enabling PHP/Apache ##

Go to System Preferences > Sharing and enable "Web Sharing"

on a commandline type:

`sudo cp /etc/php.ini.default /etc/php.ini`

you may want to chmod 666 your apache /etc/apache2/users/your\_username.conf files and newly created  /etc/php.ini files so you can use them in a non UNIX editor.

## Installing MySQL ##

Go to http://www.mysql.com/downloads/mysql/ and install the latest

Copy the startup item to your startup as usual and install the app

```
sudo vi /Users/your_user_name/.bash_profile

add the following lines:
#inserting a path for mysql
export PATH=/usr/local/mysql/bin:$PATH 
```
(escape :wq enter ) will write the file and quit VI

type:
`mysqladmin -u your_database_username password your_database_password`

copy:
`cp /usr/local/mysql/support-files/my-huge.cnf /etc/my.cnf`

link:
`ln -s /tmp/mysql.sock /var/mysql/mysql.sock`

chmod 666 on my.cnf while you're editing it unless you like VI or nano.


## Configuring the Server ##

Now you've got your bare bones server installed, you'll need to make some edits to the config files before you can proceed.

### Apache Configs ###
The above guide will add apache in compiled setup - no new functionality can be added to it, if you use macports or fink to build your copy of apache, you should include the following components:

  * add mod-rewrite    **required**
  * add mod-XSendFile  **optional**
  * add deflate\_module **optional**

create the virtual hosts:
It's highly recommended that you choose two **random unused ports** between 1025-9800 and replace the example 8095/8096 pairs. One port is for the media stream and another is for HTML and program communication. Also make sure your paths are correct! Add the following to your user's httpd file:

_/etc/apache2/users/your\_user\_name.conf_
```
# This is the configuration for the streeme app communication path
Listen *:8095

NameVirtualHost *:8095

<VirtualHost *:8095>
  DocumentRoot "/Users/username/Sites/streeme/web"
  DirectoryIndex index.php
  <Directory "/Users/username/Sites/streeme/web">
    AllowOverride All
    Allow from All
  </Directory>

  Alias /sf "/Users/username/Sites/streeme/lib/vendor/symfony/data/web/sf"
  <Directory "/Users/username/Sites/streeme/lib/vendor/symfony/data/web/sf">
    AllowOverride All
    Allow from All
  </Directory>
</VirtualHost>

# This is the configuration for the music streamer
Listen *:8096

NameVirtualHost *:8096

<VirtualHost *:8096>
  DocumentRoot "/Users/username/Sites/streeme/web"
  DirectoryIndex index.php
  <Directory "/Users/username/Sites/streeme/web">
    AllowOverride All
    Allow from All
  </Directory>
</VirtualHost>

#Disable SVN directory sniffing through apache
<Directory ~ ".*\.svn"> 
Order allow,deny 
Deny from all 
Satisfy All 
</Directory> 
```

now validate you've made the correct changes by typing:

`/usr/sbin/apachectl configtest`

if all looks good, go ahead and restart apache, type:

`/usr/sbin/apachectl restart`

### PHP Configs ###

_/etc/php.ini_

  * set `magic_quotes_gpc = Off`
  * set `short_open_tag = Off`
  * set `memory_limit = 256M` or higher
  * set `pdo_mysql.default_socket=/tmp/mysql.sock`

Use the pear package manager to install apc and http\_download
  * `sudo pear install APC`
  * `sudo pear install HTTP_Download`

PHP MUST BE PART OF YOUR PATH! You'll know it's working if you type php on the command line and something starts happening rather than nothing happening :)

### MySQL Configs ###

You will have already set up your MySQL installation previous steps, but there's a couple of easy performance and internationalization tweaks to perform.

_/etc/my.cnf_
```
[mysqld]
default-character-set = utf8
default-collation = utf8_unicode_ci
query_cache_type = 1
query_cache_size  = 32M
```

### FFMPEG ###
[Install Macports](http://www.macports.org/install.php)

restart your shell

type
```
sudo port -v selfupdate
sudo port install ffmpeg +gpl +lame +faac +libogg
```


### Cleaning Up ###

Restart both apache and mysql before you continue:
chmod all of your config files back to 644

  * `sudo /Library/StartupItems/MySQLCOM restart`
  * `sudo /usr/sbin/apachectl restart`

Continue to [Installing Streeme >](InstallingStreeme.md)