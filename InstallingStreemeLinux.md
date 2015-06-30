# Introduction #

This is the Linux install guide - if you're looking for other platform installation guides, please go back to the [start page of the installation](InstallingStreemeStartPage.md)

Streeme requires the initial installation of a LAMP (Linux Apache MySQL PHP) web server package before the script can operate. I would write how to do this, but there is much sager advice, better presented on Linux help sites - you'll need to find the right packages for your flavor of Linux - I'll be showing how it works on Ubuntu server, a popular and thin linux installation. I prefer Ubuntu over some of the other linuxes mostly because of Medibuntu, which offers some excellent multimedia and transcoding support.

## Installing the Web Server ##

please have a look at this wonderfully formatted and clear installation guide:

https://help.ubuntu.com/community/ApacheMySQLPHP
<br /><br />
**Debian Users**, please note there is an issue in installing PDO on Lenny, use the squeeze repo instead.

## Configuring the Server ##

Now you've got your bare bones server installed, you'll need to make some edits to the config files before you can proceed.

### Apache Configs ###
The above guide will add apache in a modular setup - to enable/disable modules, you just copy/link from /etc/apache2/mods-available to /etc/apache2/mods-enabled. If you use a linux that doesn't have modules like this, please compile it with the right functionality:

  * add mod-rewrite    **required**
  * add deflate\_module **optional**

create a virtual hosts:
It's highly recommended that you choose two **random unused ports** between 1025-9800 and replace the example 8095/8096 pairs. One port is for the media stream and another is for HTML and program communication. Also make sure your paths are correct!

_/etc/apache2/httpd.conf_
```
# This is the configuration for the streeme app communication path
Listen *:8095

NameVirtualHost *:8095

<VirtualHost *:8095>
  DocumentRoot "/home/notroot/sites/streeme/web"
  DirectoryIndex index.php
  <Directory "/home/notroot/sites/streeme/web">
    AllowOverride All
    Allow from All
  </Directory>

  Alias /sf "/home/notroot/sites/streeme/lib/vendor/symfony/data/web/sf"
  <Directory "/home/notroot/sites/streeme/lib/vendor/symfony/data/web/sf">
    AllowOverride All
    Allow from All
  </Directory>
</VirtualHost>

# This is the configuration for the music streamer
Listen *:8096

NameVirtualHost *:8096

<VirtualHost *:8096>
  DocumentRoot "/home/notroot/sites/streeme/web"
  DirectoryIndex index.php
  <Directory "/home/notroot/sites/streeme/web">
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

`apache2ctl configtest`

if all looks good, go ahead and restart apache, type:

`/etc/init.d/apache2 restart`

### PHP Configs ###

install php5 cli

`sudo apt-get install php5-cli`

_/etc/php5/apache2/php.ini_ = the apache version
AND
_/etc/php5/cli/php.ini_ = the command line version

  * set `magic_quotes_gpc = Off`
  * set `short_open_tag = Off`
  * set `memory_limit = 256M` or higher

install PEAR (PHP Extension and Application Repository)

```
sudo apt-get install php-pear
```

once installed use the pear package manager to install http\_download
```
sudo pear install HTTP_Download
```

install curl - required for cloudfusion:

```
sudo apt-get install curl php5-curl
```

install gd - used to process album art

```
sudo apt-get install php5-gd
```

PHP MUST BE PART OF YOUR PATH! You'll know it's working if you type php on the command line and something starts happening rather than nothing happening :)

### MySQL Configs ###

You will have already set up your MySQL installation previous steps, but there's a couple of easy performance and internationalization tweaks to perform.

_/etc/mysql/my.cnf_
```
[mysqld]
default-character-set = utf8
default-collation = utf8_unicode_ci
query_cache_type = 1
query_cache_size  = 32M
```

### Permissions ###
The permission system on Linux will usually require granting explicit permissions to your music files and folders. Apache will usually always run as its own user and you will need to give Apache permission to read your music.  There are a number of strategies for granting access, which I will leave up to you, but it seems best practice is to add your music to a group and allow apache membership to the group. If you get into Streeme and your music won't play, you can see what's going on in log/proxy.log. Chances are the problem will boil down to permissions.

### FFMPEG ###
In order to do almost anything in this app on linux, you're going to need something like medibuntu - most importantly FFMPEG. You'll want to add the non-free versions to support MP3 appropriately. Read more about getting medibuntu set up here:

[Setting Up Medibuntu](https://help.ubuntu.com/community/Medibuntu)

install the keys and repositories using that long commandline file then run this long commandline file:

```
sudo wget http://www.medibuntu.org/sources.list.d/`lsb_release -cs`.list --output-document=/etc/apt/sources.list.d/medibuntu.list; sudo apt-get -q update; sudo apt-get --yes -q --allow-unauthenticated install medibuntu-keyring; sudo apt-get -q update
```

after discovery, type

```
sudo apt-get install ffmpeg libavcodec-extra-52
sudo apt-get install ffmpeg liblame0
```

### Cleaning Up ###

Restart both apache and mysql before you continue:

```
sudo /etc/init.d/apache2 restart 
sudo /etc/init.d/mysql restart
```

Continue to [Installing Streeme >](InstallingStreeme.md)